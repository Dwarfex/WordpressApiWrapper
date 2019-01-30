<?php

namespace Somecoding\WordpressApiWrapper\Service\Main;

use Somecoding\WordpressApiWrapper\Exception\NotYetImplemented;
use Somecoding\WordpressApiWrapper\Service\ApiService;

/**
 * Class PostService
 * @package Somecoding\WordpressApiWrapper\Service\Wordpress
 */
class PostService
{
	/**
	 * @var string
	 */
	const POST_URL_STRING = 'wp/v2/posts/';

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

	public function getPosts(
		int $page = 1,
		int $perPage = 10,
		string $searchString = '',
		\DateTime $releasedAfterDate = null,
		\DateTime $releasedBeforeDate = null,
		array $authorIds = null,
		array $excludedAuthors = null,
		array $excludePostIds = null,
		array $onlyPostIds = null,
		int $offset = 0,
		string $order = 'asc',
		string $orderBy = 'date',
		array $categories = null,
		array $excludeCategories = null,
		array $tags = null,
		array $excludedTags = null,
		bool $isSticky = false


	) {
		return $this->apiService->getHydratedApiPage(self::POST_URL_STRING);
	}


}