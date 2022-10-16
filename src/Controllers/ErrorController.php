<?php

namespace Server\PersonalBudget\Controllers;

use CoffeeCode\Router\Router;


class ErrorController
{
    /**
     * @var Router
     */
    private Router $router;

    public function __construct($router)
    {
        $this->router = $router;
    }

    public function index(): void
    {
        echo "<h1>Home</h1>";
        echo "<p>", $this->router->route("name.home"), "</p>";
        echo "<p>", $this->router->route("name.hello"), "</p>";
        echo "<p>", $this->router->route("name.redirect"), "</p>";
    }

    public function redirect(): void
    {
        $this->router->redirect("name.hello");
    }
}