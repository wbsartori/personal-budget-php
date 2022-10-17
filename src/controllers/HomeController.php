<?php

namespace Source\Controllers;

class HomeController extends Controller
{
    public function index($data){
        return $this->load('Home/home', $data);
    }
}