<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Service;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\SimpleCache\CacheInterface;
use Somecoding\WordpressApiWrapper\Exception\ApiNotAvailable;
use Somecoding\WordpressApiWrapper\Exception\NonHydratableModel;
use Somecoding\WordpressApiWrapper\Model\Api;
use Somecoding\WordpressApiWrapper\Model\HydratableModel;
use Somecoding\WordpressApiWrapper\Model\Route;
use Zend\Config\Config;
use Zend\Hydrator\HydratorInterface;

/**
 * Class ApiService
 * @package Somecoding\WordpressApiWrapper\Service
 */
class ApiService
{
    /**
     * @var string
     */
    const WORDPRESS_API_ROUTE = 'wp-json';

    /**
     * @var int
     */
    const API_CACHING_TIME = 3600;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $siteUrl;

    /**
     * @var |null
     */
    protected $cache;

    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * @var Config
     */
    protected $config;

    /**
     * ApiService constructor.
     * @param Client $client
     * @param string $siteUrl
     * @param HydratorInterface $hydrator
     * @param Config $wordpressWrapperConfig
     * @param CacheInterface|null $simpleCacheAdapter
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function __construct(
        Client $client,
        HydratorInterface $hydrator,
        Config $wordpressWrapperConfig,
        string $siteUrl = null,
        CacheInterface $simpleCacheAdapter = null
    ) {
        $this->httpClient = $client;
        $this->config = $wordpressWrapperConfig;
        $this->hydrator = $hydrator;
        if (empty($siteUrl)) {
            $siteUrl = $this->config->get('defaultHost');
        }

        if (!empty($simpleCacheAdapter)) {
            $this->cache = $simpleCacheAdapter;
        }
        if (substr($siteUrl, strlen($siteUrl) - 1) === '/') {
            $this->siteUrl = $siteUrl . self::WORDPRESS_API_ROUTE;
        } else {
            $this->siteUrl = $siteUrl . '/' . self::WORDPRESS_API_ROUTE;
        }

        $apiAvailable = $this->getUrl($this->siteUrl);
        if ($apiAvailable === null) {
            throw new ApiNotAvailable(sprintf('The API of %s is not available.', $this->siteUrl));
        }
    }

    /**
     * @param string $url
     * @param array $parameters
     * @return bool|mixed|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    protected function getUrl(string $url, array $parameters = [])
    {
        $cachedValue = false;
        if ($this->cache instanceof CacheInterface) {
            $cachedValue = $this->cache->get(md5($url . serialize($parameters)), false);
        }

        if ($cachedValue !== false) {
            return $cachedValue;
        }

        $response = $this->httpClient->request('GET', $url, ['query' => $parameters]);
        $content = $response->getBody()->getContents();

        if ($this->isValidJsonResponse(json_encode($content))) {
            $this->cache->set(md5($url . serialize($parameters)), $content, self::API_CACHING_TIME);
            return $content;
        }

        return null;
    }

    /**
     * @param string $responseData
     * @return bool
     */
    protected function isValidJsonResponse(string $responseData): bool
    {
        if (!empty($responseData)) {
            try {
                json_decode($responseData);
            } catch (\Throwable $throwable) {
                return false;
            }
            return (json_last_error() === JSON_ERROR_NONE);
        }

        return false;

    }

    /**
     * @return array|Route[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getAllRoutes()
    {
        /** @var Api $hydrated */
        $hydrated = $this->getHydratedApiPage($this->siteUrl);

        return $hydrated->getRoutes();

    }

    /**
     * @param string $page
     * @param array $parameters
     * @return array|object
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getHydratedApiPage(string $page, array $parameters = [])
    {
        $offset = 0;


        if (strpos($page, $this->siteUrl) === false) {
            $page = sprintf('%s/%s', $this->siteUrl, $page);
            $offset = 1;
        }
        $content = json_decode($this->getUrl($page, $parameters), true);

        $basePathClearedUrl = substr($page, strlen($this->siteUrl) + $offset);
        $modelClass = $this->config->models->get($basePathClearedUrl);

        if ($this->arrayIsNumericallyIndexed($content)) {
            $hydratedValues = [];
            foreach ($content as $extractableArray) {
                $hydratableModel = new $modelClass($this->hydrator);
                if (!$hydratableModel instanceof HydratableModel) {
                    throw new NonHydratableModel(sprintf('Model: "%s" is not a HydratableModel - Tried using this model for config route: %s',
                        $modelClass, $basePathClearedUrl));
                }
                $hydratedValues[] = $this->hydrator->hydrate($extractableArray, $hydratableModel);
            }


            return $hydratedValues;
        }

        $hydratableModel = new $modelClass($this->hydrator);
        if (!$hydratableModel instanceof HydratableModel) {
            throw new NonHydratableModel(sprintf('Model: "%s" is not a HydratableModel - Tried using this model for config route: %s',
                $modelClass, $basePathClearedUrl));
        }

        return $this->hydrator->hydrate($content, $hydratableModel);
    }

    /**
     * @param array $array
     * @return bool
     */
    protected function arrayIsNumericallyIndexed(array $array): bool
    {
        foreach ($array as $key => $value) {
            if (!is_int($key)) {
                return false;
            }
        }
        return true;
    }


}
