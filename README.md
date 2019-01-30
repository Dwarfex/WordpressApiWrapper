# Wordpress API Wrapper

This is a Wrapper for the API provided by most Wordpress Blogs. Intended for easy crawling of a Wordpress page.

## Default Available Services
Some default Services are available to wrapp common occurances of Wordpress API data:

- Users (UserService)
- Categories (CategoriesService)
- Media (MediaService)
- Posts (PostService)
- Serach (SearchService)

These services require an API Service for creation. This API Service needs to be initiated with 
a GuzzleHTTP Client, a Base URL of the Wordpress Site, a Hydrator Interface and optional a PSR simple cache interface.

```php
<?php
namespace Somecoding\WordpressApiWrapper;


use GuzzleHttp\Client;
use Somecoding\WordpressApiWrapper\Service\ApiService;
use Somecoding\WordpressApiWrapper\Service\Wordpress\CategoriesService;
use Somecoding\WordpressApiWrapper\Service\Wordpress\MediaService;
use Somecoding\WordpressApiWrapper\Service\Wordpress\PageService;
use Somecoding\WordpressApiWrapper\Service\Wordpress\PostService;
use Somecoding\WordpressApiWrapper\Service\Wordpress\SearchService;
use Somecoding\WordpressApiWrapper\Service\Wordpress\UserService;
use Symfony\Component\Cache\Simple\RedisCache;
use Zend\Hydrator\ClassMethodsHydrator;


require_once __DIR__. '/../vendor/autoload.php';

$redis = new \Redis();

$cacheInterface = new RedisCache($redis);
$guzzleClient = new Client();
$hydrator = new ClassMethodsHydrator();

$api = new ApiService( $guzzleClient, 'https://prosystem-ag.com',$hydrator, $cacheInterface);
$categoriesService = new CategoriesService($api);
$mediaService = new MediaService($api);
$pageService = new PageService($api);
$postService = new PostService($api);
$searchSerivce = new SearchService($api);
$userService = new UserService($api);

$availableRoutes  = $api->getAllRoutes();
```