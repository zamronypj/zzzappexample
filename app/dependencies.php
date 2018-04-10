<?php

use Juhara\ZzzCache\Contracts\CacheInterface;
use Juhara\ZzzCache\Cache;
use Juhara\ZzzCache\Storages\File;
use Juhara\ZzzCache\Helpers\TimeUtility;
use Juhara\ZzzCache\Helpers\Md5Hash;

$container[CacheInterface::class] = function ($c) {
    // create a file-based cache where all cache
    // files is stored in directory name
    // app/storages/cache with
    // filename prefixed with string 'cache'
    return new Cache(
        new File(
            new Md5Hash(),
            'storages/cache/',
            'cache'
        ),
        new TimeUtility()
    );
};

use Juhara\CacheMiddleware\CacheMiddleware;
use Juhara\CacheMiddleware\ResponseCacheFactory;

$container[CacheMidleware::class] = function ($c) {
    $cache = $c->get(CacheInterface::class);
    $factory = new ResponseCacheFactory();
    return new CacheMiddleware($cache, $factory);
};
