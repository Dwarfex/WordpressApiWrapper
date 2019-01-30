<?php

namespace Somecoding\WordpressApiWrapper\Service\Main;

use Somecoding\WordpressApiWrapper\Service\ApiService;

/**
 * Class CategoriesService
 * @package Somecoding\WordpressApiWrapper\Service\Wordpress
 */
class CategoriesService
{
	/**
	 * @var string
	 */
	const CATEGORIES_URL_STRING = 'wp/v2/categories/';

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