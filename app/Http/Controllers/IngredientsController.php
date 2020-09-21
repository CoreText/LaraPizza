<?php

namespace App\Http\Controllers;

use App\Models\ {
    Ingredient,
    User
};

class IngredientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $currentUser = \auth()->user();
        return \redirect('/profiles/' . $currentUser->id);
    }

    public function create()
    {
        return view('ingredients.create');
    }

    public function store()
    {
        $currentUser = \auth()->user();

        $data = \request()->validate([
            'name' => 'required|unique:ingredients',
            'price' => 'required',
        ]);

        $currentUser->ingredients()->create($data);
        return \redirect('/profiles/' . $currentUser->id);
    }

    public function show(Ingredient $ingredient)
    {
        $user = \auth()->user();
        return view('ingredients.show', compact('ingredient', 'user'));
    }

    public function edit(Ingredient $ingredient)
    {
        $currentUser = \auth()->user();
        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(Ingredient $ingredient)
    {
        $currentUser = \auth()->user();

        $data = \request()->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $ingredient->update($data);

        return \redirect('/profiles/' . $currentUser->id);
    }

    public function delete(Ingredient $ingredient)
    {
        $currentUser = \auth()->user();
        Ingredient::find($ingredient->id)->delete();
        return \redirect('/profiles/' . $currentUser->id);
    }
}
