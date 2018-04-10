<?php

// Define app routes
$app->get('/', function ($request, $response, $args) {
    return $response->write("Home");
});
