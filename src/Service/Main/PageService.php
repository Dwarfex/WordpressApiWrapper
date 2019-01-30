<?php

namespace Somecoding\WordpressApiWrapper\Service\Wordpress;

use Somecoding\WordpressApiWrapper\Service\ApiService;

/**
 * Class PageService
 * @package Somecoding\WordpressApiWrapper\Service\Wordpress
 */
class PageService
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