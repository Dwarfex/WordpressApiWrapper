<?php /** @noinspection ALL */

namespace Somecoding\WordpressApiWrapper;


use GuzzleHttp\Client;
use Somecoding\WordpressApiWrapper\Model\Post;
use Somecoding\WordpressApiWrapper\Service\ApiService;
use Somecoding\WordpressApiWrapper\Service\Main\PostService;
use Symfony\Component\Cache\Simple\RedisCache;
use Zend\Config\Config;
use Zend\Hydrator\ClassMethodsHydrator;

require_once __DIR__ . '/../vendor/autoload.php';

$redis = new \Redis();
$redis->connect('127.0.0.1');

$config = new Config(require_once __DIR__ . '/../config/wordpressApiWrapper.global.php');

$wpApiWrapperConfig = $config->wordpressApiWrapper;

$cacheInterface = new RedisCache($redis);
$guzzleClient = new Client();
$hydrator = new ClassMethodsHydrator();

$api = new ApiService($guzzleClient, $hydrator, $wpApiWrapperConfig, 'https://example.com.com', $cacheInterface);
//$categoriesService = new CategoriesService($api);
//$mediaService = new MediaService($api);
//$pageService = new PageService($api);
$postService = new PostService($api);
//$searchSerivce = new SearchService($api);
//$userService = new UserService($api);

$availableRoutes = $api->getAllRoutes();
foreach ($availableRoutes as $route) {
    //echo $route->getLinks()['self'].PHP_EOL;
}

$posts = $postService->getPosts(1, 100);
foreach ($posts as $post) {
    /** @var $post Post */
    $title = $post->getTitle();
    echo $title . PHP_EOL;
    echo "--------------------------------" . PHP_EOL;
    echo $post->getContent() . PHP_EOL;;
    echo "--------------------------------" . PHP_EOL;
}
