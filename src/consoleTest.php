<?php

namespace Somecoding\WordpressApiWrapper;


use GuzzleHttp\Client;
use Somecoding\WordpressApiWrapper\Service\ApiService;
use Somecoding\WordpressApiWrapper\Service\Main\CategoriesService;
use Somecoding\WordpressApiWrapper\Service\Main\MediaService;
use Somecoding\WordpressApiWrapper\Service\Main\PageService;
use Somecoding\WordpressApiWrapper\Service\Main\PostService;
use Somecoding\WordpressApiWrapper\Service\Main\SearchService;
use Somecoding\WordpressApiWrapper\Service\Main\UserService;
use Symfony\Component\Cache\Simple\RedisCache;
use Zend\Config\Config;
use Zend\Hydrator\ClassMethodsHydrator;


require_once __DIR__ . '/../vendor/autoload.php';

$redis = new \Redis();

$config = new Config(require_once __DIR__ . '/../config/wordpressApiWrapper.global.php');
$wpApiWrapperConfig = $config->wordpressApiWrapper;
$cacheInterface = new RedisCache($redis);
$guzzleClient = new Client();
$hydrator = new ClassMethodsHydrator();

$api = new ApiService($guzzleClient, $hydrator, $wpApiWrapperConfig,'https://prosystem-ag.com' , $cacheInterface);
$categoriesService = new CategoriesService($api);
$mediaService = new MediaService($api);
$pageService = new PageService($api);
$postService = new PostService($api);
$searchSerivce = new SearchService($api);
$userService = new UserService($api);

$availableRoutes  = $api->getAllRoutes();
foreach ($availableRoutes as $route){
	//echo $route->getLinks()['self'].PHP_EOL;
}

$posts = $postService->getPosts();
var_dump($posts);