<?php

namespace Source\Controllers\Person;


class PersonController
{
    public function index($data){
        echo '<h1>PersonController</h1>';
        var_dump($data);
    }
}

