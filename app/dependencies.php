<?php

use Juhara\ZzzCache\Contracts\CacheInterface;
use Juhara\ZzzCache\Cache;
use Juhara\ZzzCache\Helpers\ExpiryCalculator;

use Juhara\ZzzCache\Storages\File;
use Juhara\ZzzCache\Helpers\Md5Hash;

use Predis\Client;
use Juhara\ZzzCache\Storages\Redis;

$container[CacheInterface::class] = function ($c) {
    $storage = null;
    $storageType = $c->get('settings')['app']['cache']['storage'];
    switch ($storageType) {
        case 'file' :
            // create a file-based cache where all cache
            // files is stored in directory name
            // app/storages/cache with
            // filename prefixed with string 'cache'
            $cacheCfg = $c->get('settings')['app']['cache']['file'];
            $storage = new File(
                new Md5Hash(),
                $cacheCfg['dir'],
                $cacheCfg['prefix']
            );
            break;
        case 'redis' :
            // create a Redis-based cache
            $cacheCfg = $c->get('settings')['app']['cache']['redis'];
            $storage = new Redis(new Client($cacheCfg));
            break;
        default :
            throw new \Exception('Unsupported storage driver');
    }

    return new Cache($storage, new ExpiryCalculator());
};

use Juhara\CacheMiddleware\CacheMiddleware;
use Juhara\CacheMiddleware\ResponseCacheFactory;

$container[CacheMiddleware::class] = function ($c) {
    $cache = $c->get(CacheInterface::class);
    $factory = new ResponseCacheFactory();
    return new CacheMiddleware($cache, $factory);
};
