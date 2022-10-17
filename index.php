<?php

require_once('vendor/autoload.php');

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->namespace('Source\Controllers');

$router->group(null);
$router->get("/", "HomeController:index");
$router->get("/person", "Person\PersonController:index");
$router->get("/income", "Income\IncomeController:index");
$router->get("/movement", "Movement\MovementController:index");

$router->group("ooops");
$router->get("/{errcode}", "ErrorController:error");


$router->dispatch();

if($router->error()){
    $router->redirect("/ooops/{$router->error()}");
}