<?php

namespace Somecoding\WordpressApiWrapper\Model;


use GuzzleHttp\Client;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\SimpleCache\CacheInterface;
use Somecoding\WordpressApiWrapper\Exception\ApiNotAvailable;
use Symfony\Component\Cache\Adapter\SimpleCacheAdapter;

/**
 * Class Api
 * @package WordpressApiWrapper\Model
 */
class Api
{
	/**
	 * @var string
	 */
	const WORDPRESS_API_ROUTE = 'wp-json';

	const API_CACHING_TIME=3600;
	/**
	 * @var ClientInterface
	 */
	protected $httpClient;

	/**
	 * @var string
	 */
	protected $siteUrl;

	/**
	 * @var SimpleCacheAdapter|null
	 */
	protected $cache;

	/**
	 * Api constructor.
	 * @param Client $client
	 * @param string $siteUrl
	 * @param SimpleCacheAdapter|null $simpleCacheAdapter
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function __construct(Client $client, string $siteUrl, CacheInterface $simpleCacheAdapter = null )
	{
		$this->httpClient = $client;
		if(!empty($simpleCacheAdapter)){
			$this->cache = $simpleCacheAdapter;
		}
		if (substr($siteUrl, strlen($siteUrl) - 1) === '/') {
			$this->siteUrl = $siteUrl . self::WORDPRESS_API_ROUTE;
		} else {
			$this->siteUrl = $siteUrl . '/' . self::WORDPRESS_API_ROUTE;
		}

		$apiAvailable = $this->getApiPage();
		if($apiAvailable === null){
			throw new ApiNotAvailable(sprintf('The API of %s is not available.', $this->siteUrl));
		}
	}

	public function getAllRoutes()
	{

	}

	/**
	 * @return string|null
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	protected function getApiPage(): ?string
	{
		return $this->getUrl($this->siteUrl);


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
	 * @return string|null
	 */
	protected function getUrl(string $url){
		$cachedValue = false;
		if(!empty($this->cache)){
			$cachedValue = $this->cache->get(md5($url), false);
		}

		if($cachedValue !== false){
			return $cachedValue;
		}
		try {
			$response = $this->httpClient->request('GET', $url);
			$content = $response->getBody()->getContents();
		}catch (\Exception $throwable){
			return null;
		}
		if ($this->isValidJsonResponse(json_encode($content))) {
			$this->cache->set(md5($url), $content, self::API_CACHING_TIME);
			return $content;
		}

		return null;
	}

}