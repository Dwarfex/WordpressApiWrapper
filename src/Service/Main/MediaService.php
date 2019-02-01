<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Service\Main;

use Somecoding\WordpressApiWrapper\Exception\NotYetImplemented;
use Somecoding\WordpressApiWrapper\Model\Media;
use Somecoding\WordpressApiWrapper\Model\Post;
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
        throw new NotYetImplemented();
    }

    /**
     * @param int $id
     * @return Media
     */
    public function getMediaById(int $id):? Media
    {
        throw new NotYetImplemented();
    }

    /**
     * @param Post $post
     * @return array
     */
    public function getMediaFromPost(Post $post): array
    {
        throw new NotYetImplemented();
    }

    /**
     * @param Media $media
     * @param string $size
     */
    public function getMediaFile(Media $media, string $size = 'default')
    {
        throw new NotYetImplemented();
    }
}
