<?php

namespace Somecoding\WordpressApiWrapper\Service\Main;

use Somecoding\WordpressApiWrapper\Service\ApiService;

/**
 * Class MediaService
 * @package Somecoding\WordpressApiWrapper\Service\Wordpress
 */
class MediaService
{
	/**
	 * @var string
	 */
	const MEDIA_URL_STRING = 'wp/v2/media/';

	/**
	 * @var ApiService
	 */
	protected $apiService;

	/**
	 * PostService constructor.
	 * @param ApiService $apiService
	 */
	public function __construct(ApiService $apiService)
	{
		$this->apiService = $apiService;
	}
}