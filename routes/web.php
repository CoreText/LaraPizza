<?php

use Illuminate\Support\Facades\ {
    Auth,
    Route
};

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

// Pages
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profiles
Route::get('/profiles/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');

// Pizzas
Route::post('/pizza', [App\Http\Controllers\PizzasController::class, 'store']);
Route::get('/pizzas/create', [App\Http\Controllers\PizzasController::class, 'create']);
Route::get('/pizzas/{pizza}/edit', [App\Http\Controllers\PizzasController::class, 'edit'])->name('pizza.edit');
Route::patch('/pizzas/{pizza}', [App\Http\Controllers\PizzasController::class, 'update'])->name('pizza.update');
Route::get('/pizzas/{pizza}', [App\Http\Controllers\PizzasController::class, 'show']);
Route::get('/pizzas/{pizza}/delete', [App\Http\Controllers\PizzasController::class, 'delete']);

// Ingredients
Route::post('/ingredient', [App\Http\Controllers\IngredientsController::class, 'store']);
Route::get('/ingredients/create', [App\Http\Controllers\IngredientsController::class, 'create']);
Route::get('/ingredients/{ingredient}/edit', [App\Http\Controllers\IngredientsController::class, 'edit'])->name('ingredient.edit');
Route::patch('/ingredients/{ingredient}', [App\Http\Controllers\IngredientsController::class, 'update'])->name('ingredient.update');
Route::get('/ingredients/{ingredient}', [App\Http\Controllers\IngredientsController::class, 'show']);
Route::get('/ingredients/{ingredient}/delete', [App\Http\Controllers\IngredientsController::class, 'delete']);
