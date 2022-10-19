<?php

namespace App\Modules\Movement;

use App\Http\Controllers\Controller;

class MovementController extends Controller
{
    public function read(){
        echo 'MovementController read';
    }
    public function new(){
        echo 'MovementController new';
    }
    public function save(){
        echo 'MovementController save';
    }
    public function edit(){
        echo 'MovementController edit';
    }
    public function update(){
        echo 'MovementController update';
    }
    public function delete(){
        echo 'MovementController delete';
    }
}
