<?php

namespace Source\Controllers;


class ErrorController
{
    public function error($data)
    {
        echo "<h1><p>Error: ", $data['errcode'], "</h1></p>";
        var_dump($data);
    }
}