<?php

define("BASEDIR", dirname(__DIR__));

require BASEDIR . '/vendor/autoload.php';

// Create and configure Slim app
$config = require(BASEDIR . '/app/config.php');

$app = new \Slim\App($config);

require BASEDIR . '/app/dependencies.php';
require BASEDIR . '/app/routes.php';
require BASEDIR . '/app/middlewares.php';

// Run app
$app->run();
