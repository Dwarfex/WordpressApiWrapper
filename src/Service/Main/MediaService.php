<?php

namespace Somecoding\WordpressApiWrapper\Service\Wordpress;

use Somecoding\WordpressApiWrapper\Service\ApiService;

/**
 * Class MediaService
 * @package Somecoding\WordpressApiWrapper\Service\Wordpress
 */
class MediaService
{

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