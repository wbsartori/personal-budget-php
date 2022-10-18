<?php

namespace App\Modules\Home;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function home(){
        return view('home.home');
    }
}
