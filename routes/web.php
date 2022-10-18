<?php

use App\Modules\Home\HomeController;
use App\Modules\Person\PersonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home']);


Route::get('/person', [PersonController::class, 'read'])->name("person");
Route::get('/person/new', [PersonController::class, 'new'])->name("person.new");
Route::post('/person/save', [PersonController::class, 'save'])->name("person.save");
Route::get('/person/edit/{id}', [PersonController::class, 'edit'])->name("person.edit");
Route::put('/person/update/{id}', [PersonController::class, 'update'])->name("person.update");
Route::get('/person/delete/{id}', [PersonController::class, 'delete'])->name("person.delete");
