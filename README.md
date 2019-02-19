[![Maintainability](https://api.codeclimate.com/v1/badges/f55fc2b42845f004d247/maintainability)](https://codeclimate.com/github/Dwarfex/WordpressApiWrapper/maintainability)
# Wordpress API Wrapper

This is a Wrapper for the API provided by most Wordpress Blogs. Intended for easy crawling of a Wordpress page.

## How to install

For installing you currently need to specify a version of this project as this project is currently not stable.

Simply do: "composer require somecoding/wp-api-wrapper:0.0.x" in your project where x ist the latest version number.

## Default Available Services
Some default Services are available to wrap common occurrences of Wordpress API data:

- Users (UserService)
- Categories (CategoriesService)
- Media (MediaService)
- Posts (PostService)
- Search (SearchService)

These services require an API Service for creation. This API Service needs to be initiated with 
a GuzzleHTTP Client, a Base URL of the Wordpress Site, a Hydrator Interface and optional a PSR simple cache interface.

```php
<?php
namespace Somecoding\WordpressApiWrapper;


use GuzzleHttp\Client;
use Somecoding\WordpressApiWrapper\Model\Post;
use Somecoding\WordpressApiWrapper\Service\ApiService;
use Somecoding\WordpressApiWrapper\Service\Main\PostService;
use Symfony\Component\Cache\Simple\RedisCache;
use Zend\Config\Config;
use Zend\Hydrator\ClassMethodsHydrator;


require_once __DIR__. '/../vendor/autoload.php';

$redis = new \Redis();
$config = new Config(require_once __DIR__ . '/../config/wordpressApiWrapper.global.php');

$wpApiWrapperConfig = $config->wordpressApiWrapper;
$cacheInterface = new RedisCache($redis);
$guzzleClient = new Client();
$hydrator = new ClassMethodsHydrator();

$api = new ApiService($guzzleClient, $hydrator, $wpApiWrapperConfig, 'https://example.com', $cacheInterface);
$categoriesService = new CategoriesService($api);
$mediaService = new MediaService($api);
$pageService = new PageService($api);
$postService = new PostService($api);
$searchService = new SearchService($api);
$userService = new UserService($api);

$availableRoutes  = $api->getAllRoutes();
```