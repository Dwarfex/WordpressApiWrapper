<?php

namespace Somecoding\WordpressApiWrapper\Service\Wordpress;

use Somecoding\WordpressApiWrapper\Service\ApiService;

/**
 * Class PostService
 * @package Somecoding\WordpressApiWrapper\Service\Wordpress
 */
class PostService
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