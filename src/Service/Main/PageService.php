<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Service\Main;

use Somecoding\WordpressApiWrapper\Exception\NotYetImplemented;
use Somecoding\WordpressApiWrapper\Service\ApiService;

/**
 * Class PageService
 * @package Somecoding\WordpressApiWrapper\Service\Wordpress
 */
class PageService
{
    /**
     * @var string
     */
    const PAGES_URL_STRING = 'wp/v2/pages/';

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
}
