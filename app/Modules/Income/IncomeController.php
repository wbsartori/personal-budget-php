<?php

namespace App\Modules\Income;

use App\Http\Controllers\Controller;

class IncomeController extends Controller
{
    public function read(){
        echo 'IncomeController read';
    }
    public function new(){
        echo 'IncomeController new';
    }
    public function save(){
        echo 'IncomeController save';
    }
    public function edit(){
        echo 'IncomeController edit';
    }
    public function update(){
        echo 'IncomeController update';
    }
    public function delete(){
        echo 'IncomeController delete';
    }
}
