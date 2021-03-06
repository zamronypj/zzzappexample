# zzzappexample
Example Slim Framework 3.0 application using CacheMiddleware with file-based cache

## Requirement
- [PHP >= 5.4](https://php.net)
- [Composer](https://getcomposer.org)
- [Slim Framework 3.0](https://slimframework.com)
- [ZzzCache](https://github.com/zamronypj/zzzcache)
- [CacheMiddleware](https://github.com/zamronypj/zzzmiddleware)
- [ZzzFile](https://github.com/zamronypj/zzzfile)
- [ZzzRedis](https://github.com/zamronypj/zzzredis)

## Installation

- Clone this repository.
- Install all software dependencies.

       $ composer install

- Copy and rename `app/config.php.example` to `app/config.php` and edit configuration
to match your settings.

## Run application
- Run, for example, with PHP built-in server

      $ php -S localhost:9090 -t public public/index.php

- Open browser and open http://localhost:9090
- If you use file-based cache with default configuration, you should see new files generated inside `storages/cache` directory. If somehow, these files are not generated,
make sure that directory permission is correct.

## Contributing

Just submit PR if you have any improvement or bugfix.

Thank you
