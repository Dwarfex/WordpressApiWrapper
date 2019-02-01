<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Service\Main;

use Somecoding\WordpressApiWrapper\Exception\NotYetImplemented;
use Somecoding\WordpressApiWrapper\Service\ApiService;

/**
 * Class SearchService
 * @package Somecoding\WordpressApiWrapper\Service\Wordpress
 */
class SearchService
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
}
