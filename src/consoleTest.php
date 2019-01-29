<?php
namespace WordpressApiWrapper;



use GuzzleHttp\Client;
use Somecoding\WordpressApiWrapper\Model\Api;
use Symfony\Component\Cache\Simple\MemcachedCache;

require_once __DIR__. '/../vendor/autoload.php';
$cache = new MemcachedCache(new \Memcached('test'));
$guzzle = new Client();
$api = new Api( $guzzle, 'https://prosystem-ag.com', $cache);