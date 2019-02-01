<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Service\Main;

use Somecoding\WordpressApiWrapper\Exception\NotYetImplemented;
use Somecoding\WordpressApiWrapper\Model\Category;
use Somecoding\WordpressApiWrapper\Model\Post;
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
        throw new NotYetImplemented();
    }

    public function getCategoryWithId(int $id): ?Category
    {
        throw new NotYetImplemented();
    }

    public function getCategoryForPost(Post $post): ?Category
    {
        throw new NotYetImplemented();
    }
}
