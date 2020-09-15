<?php

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

Route::get('/', [App\Http\Controllers\PizzasController::class, 'index']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');

Route::post('/pizza', [App\Http\Controllers\PizzasController::class, 'store']);
Route::get('/pizza/create', [App\Http\Controllers\PizzasController::class, 'create']);
Route::get('/pizza/{pizza}/edit', [App\Http\Controllers\PizzasController::class, 'edit'])->name('profile.edit');
Route::patch('/pizza/{pizza}', [App\Http\Controllers\PizzasController::class, 'update'])->name('profile.update');
Route::get('/pizza/{pizza}/delete', [App\Http\Controllers\PizzasController::class, 'delete']);
Route::get('/pizza/{pizza}', [App\Http\Controllers\PizzasController::class, 'show']);
