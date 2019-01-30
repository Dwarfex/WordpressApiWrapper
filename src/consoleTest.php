<?php
namespace Somecoding\WordpressApiWrapper;



use GuzzleHttp\Client;
use Somecoding\WordpressApiWrapper\Service\ApiService;
use Symfony\Component\Cache\Simple\RedisCache;
use Zend\Hydrator\ClassMethodsHydrator;


require_once __DIR__. '/../vendor/autoload.php';
$redis = new \Redis();
$time = microtime(true);
$cache = new RedisCache($redis);
$guzzle = new Client();
$hydrator = new ClassMethodsHydrator();



$api = new ApiService( $guzzle, 'https://prosystem-ag.com',$hydrator, $cache);
$t  = $api->getAllRoutes();
$duratrion = microtime(true) - $time;
echo $duratrion;