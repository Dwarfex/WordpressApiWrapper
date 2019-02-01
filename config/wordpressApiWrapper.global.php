<?php
return [
    'wordpressApiWrapper' => [
        'defaultHost' => 'example.com',
        'cacheTTL' => 3600,
        'models' => [
            '' => \Somecoding\WordpressApiWrapper\Model\Api::class,
            \Somecoding\WordpressApiWrapper\Service\Main\PostService::POST_URL_STRING => \Somecoding\WordpressApiWrapper\Model\Post::class,
            \Somecoding\WordpressApiWrapper\Service\Main\UserService::USERS_URL_STRING => \Somecoding\WordpressApiWrapper\Model\User::class,
            'wp/v2/comments/' => \Somecoding\WordpressApiWrapper\Model\Comment::class,
            \Somecoding\WordpressApiWrapper\Service\Main\CategoriesService::CATEGORIES_URL_STRING => \Somecoding\WordpressApiWrapper\Model\Category::class,
            \Somecoding\WordpressApiWrapper\Service\Main\MediaService::MEDIA_URL_STRING => \Somecoding\WordpressApiWrapper\Model\Media::class,
            \Somecoding\WordpressApiWrapper\Service\Main\PageService::PAGES_URL_STRING => \Somecoding\WordpressApiWrapper\Model\Page::class,
        ],
    ],
];
