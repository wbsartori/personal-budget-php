<?php

require_once('vendor/autoload.php');

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->group(null);
$router->get('/', function ($data){
    echo '<h1>Olá Mundo!</h1>';
});

/**
 * This method executes the routes
 */
$router->dispatch();
