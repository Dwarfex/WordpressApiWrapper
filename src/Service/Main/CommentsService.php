<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Service\Main;

use Somecoding\WordpressApiWrapper\Exception\NotYetImplemented;
use Somecoding\WordpressApiWrapper\Model\Comment;
use Somecoding\WordpressApiWrapper\Model\Post;
use Somecoding\WordpressApiWrapper\Service\ApiService;

/**
 * Class CommentsService
 * @package Somecoding\WordpressApiWrapper\Service\Main
 */
class CommentsService
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
        throw new NotYetImplemented();
    }

    /**
     * @param Post $post
     * @return Comment[]
     */
    public function getCommentsForPost(Post $post): array
    {
        throw new NotYetImplemented();
    }

    /**
     * @return Comment[]
     */
    public function getComments(): array
    {
        throw new NotYetImplemented();
    }

    /**
     * @param int $id
     * @return Comment
     */
    public function getCommentById(int $id): ?Comment
    {
        throw new NotYetImplemented();
    }
}
