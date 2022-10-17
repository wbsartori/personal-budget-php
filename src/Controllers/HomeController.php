<?php

namespace Source\Controllers;

class HomeController
{
    public function index($data){
        echo '<h1>HomeController</h1>';
        var_dump($data);
    }
}