<?php

use App\Modules\Home\HomeController;
use App\Modules\Income\IncomeController;
use App\Modules\Movement\MovementController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/person', [PersonController::class, 'read'])->name("person");
Route::get('/person/new', [PersonController::class, 'new'])->name("person.new");
Route::post('/person/save', [PersonController::class, 'save'])->name("person.save");
Route::get('/person/edit/{id}', [PersonController::class, 'edit'])->name("person.edit");
Route::put('/person/update/{id}', [PersonController::class, 'update'])->name("person.update");
Route::get('/person/delete/{id}', [PersonController::class, 'delete'])->name("person.delete");

Route::get('/income', [IncomeController::class, 'read'])->name("income");
Route::get('/income/new', [IncomeController::class, 'new'])->name("income.new");
Route::post('/income/save', [IncomeController::class, 'save'])->name("income.save");
Route::get('/income/edit/{id}', [IncomeController::class, 'edit'])->name("income.edit");
Route::put('/income/update/{id}', [IncomeController::class, 'update'])->name("income.update");
Route::get('/income/delete/{id}', [IncomeController::class, 'delete'])->name("income.delete");

Route::get('/movement', [MovementController::class, 'read'])->name("income");
Route::get('/movement/new', [MovementController::class, 'new'])->name("income.new");
Route::post('/movement/save', [MovementController::class, 'save'])->name("income.save");
Route::get('/movement/edit/{id}', [MovementController::class, 'edit'])->name("income.edit");
Route::put('/movement/update/{id}', [MovementController::class, 'update'])->name("income.update");
Route::get('/movement/delete/{id}', [MovementController::class, 'delete'])->name("income.delete");
