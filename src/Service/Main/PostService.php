<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Service\Main;

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
        string $search = null,
        string $context = null,
        string $after = null,
        string $before = null,
        array $author = null,
        array $authorExclude = null,
        array $exclude = null,
        array $include = null,
        int $offset = 0,
        string $order = 'asc',
        string $orderBy = 'date',
        string $slug = null,
        array $status = null,
        array $categories = null,
        array $categoriesExclude = null,
        array $tags = null,
        array $tagsExclude = null,
        bool $sticky = null
    ) {

        $arguments = [
            'context' => $context,
            'page' => $page,
            'per_page' => $perPage,
            'search' => $search,
            'after' => $after,
            'author' => $author,
            'author_exclude' => $authorExclude,
            'before' => $before,
            'exclude' => $exclude,
            'include' => $include,
            'offset' => $offset,
            'order' => $order,
            'orderby' => $orderBy,
            'slug' => $slug,
            'status' => $status,
            'categories' => $categories,
            'categories_exclude' => $categoriesExclude,
            'tags' => $tags,
            'tags_exclude' => $tagsExclude,
            'sticky' => $sticky,
        ];

        $queryParameters = [];
        foreach ($arguments as $argumentName => $value) {
            if (is_null($value)) {
                continue;
            }
            $queryParameters[$argumentName] = $value;
        }

        return $this->apiService->getHydratedApiPage(self::POST_URL_STRING, $queryParameters);
    }


}
