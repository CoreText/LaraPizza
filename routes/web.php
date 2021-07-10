<?php

use Illuminate\Support\Facades\ {
    Auth,
    Route
};

use App\Http\Controllers\ {
    IngredientsController,
    HomeController,
    PizzasController,
    ProfilesController
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

Route::get('/', [PizzasController::class, 'index']);

Auth::routes();

// Pages
Route::get('home', [HomeController::class, 'index'])->name('home');

// Profiles
Route::get('profiles/{user}', [ProfilesController::class, 'index'])->name('profile.show');

// Pizzas
Route::post('pizzas', [PizzasController::class, 'store']);
Route::get('pizzas/create', [PizzasController::class, 'create']);
Route::get('pizzas/{pizza}/edit', [PizzasController::class, 'edit'])->name('pizza.edit');
Route::patch('pizzas/{pizza}', [PizzasController::class, 'update'])->name('pizza.update');
Route::get('pizzas/{pizza}', [PizzasController::class, 'show']);
Route::get('pizzas/{pizza}/delete', [PizzasController::class, 'delete']);

// Ingredients
Route::post('ingredients', [IngredientsController::class, 'store']);
Route::get('ingredients/create', [IngredientsController::class, 'create']);
Route::get('ingredients/{ingredient}/edit', [IngredientsController::class, 'edit'])->name('ingredient.edit');
Route::put('ingredients/{ingredient}', [IngredientsController::class, 'update'])->name('ingredient.update');
Route::get('ingredients/{ingredient}', [IngredientsController::class, 'show']);
Route::get('ingredients/{ingredient}/delete', [IngredientsController::class, 'delete']);
