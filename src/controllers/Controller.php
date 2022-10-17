<?php

namespace Source\Controllers;

use League\Plates\Engine;

class Controller
{
    private Engine $view;

    public function __construct()
    {
        $this->view = new Engine(BASE_WINDOWS . "src/views", "php");

    }

    /**
     * @param string $template
     * @param array $data
     */
    public function load(string $template, array $data = [])
    {
        echo $this->view->render($template, $data);
    }
}