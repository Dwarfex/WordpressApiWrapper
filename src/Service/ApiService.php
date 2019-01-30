<?php

namespace Somecoding\WordpressApiWrapper\Service;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\SimpleCache\CacheInterface;
use Somecoding\WordpressApiWrapper\Exception\ApiNotAvailable;
use Somecoding\WordpressApiWrapper\Model\Api;
use Somecoding\WordpressApiWrapper\Model\HydratableModel;
use Somecoding\WordpressApiWrapper\Model\Route;
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
	 * ApiService constructor.
	 * @param Client $client
	 * @param string $siteUrl
	 * @param HydratorInterface $hydrator
	 * @param CacheInterface|null $simpleCacheAdapter
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \Psr\SimpleCache\InvalidArgumentException
	 */
	public function __construct(
		Client $client,
		string $siteUrl,
		HydratorInterface $hydrator,
		CacheInterface $simpleCacheAdapter = null
	) {
		$this->httpClient = $client;
		$this->hydrator = $hydrator;
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
	 * @return array|Route[]
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \Psr\SimpleCache\InvalidArgumentException
	 */
	public function getAllRoutes()
	{
		$page = $this->siteUrl;
		$pageObject = new Api($this->hydrator);
		/** @var Api $hydrated */
		$hydrated = $this->getHydratedApiPage($page, $pageObject);

		return $hydrated->getRoutes();

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
	 * @param string $url
	 * @return bool|mixed|string|null
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \Psr\SimpleCache\InvalidArgumentException
	 */
	protected function getUrl(string $url)
	{
		$cachedValue = false;
		if (!empty($this->cache)) {
			$cachedValue = $this->cache->get(md5($url), false);
		}

		if ($cachedValue !== false) {
			return $cachedValue;
		}
		try {
			$response = $this->httpClient->request('GET', $url);
			$content = $response->getBody()->getContents();
		} catch (\Exception $throwable) {
			return null;
		}
		if ($this->isValidJsonResponse(json_encode($content))) {
			$this->cache->set(md5($url), $content, self::API_CACHING_TIME);
			return $content;
		}

		return null;
	}

	/**
	 * @param string $page
	 * @param HydratableModel $pageObject
	 * @return object
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \Psr\SimpleCache\InvalidArgumentException
	 */
	public function getHydratedApiPage(string $page, HydratableModel $pageObject): object
	{
		$content = json_decode($this->getUrl($page), true);
		$hydrated = $this->hydrator->hydrate($content, $pageObject);
		return $hydrated;
	}

}