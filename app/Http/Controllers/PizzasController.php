<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PizzasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $currentUser = \auth()->user();
        return \redirect('/profile/' . $currentUser->id);
    }

    public function create()
    {
        return view('pizzas.create');
    }

    public function store()
    {
        $data = \request()->validate([
            'description' => '',
            'name' => 'required',
            'price' => 'required',
        ]);

        $currentUser = \auth()->user();

        $currentUser->pizzas()->create($data);
        return \redirect('/profile/' . $currentUser->id);
    }

    public function show(Pizza $pizza)
    {
        $user = \auth()->user();
        return view('pizzas.show', compact('pizza', 'user'));
    }

    public function edit(Pizza $pizza)
    {
        $currentUser = \auth()->user();
        if (is_null($currentUser)) {
            return \redirect('/login');
        }

        return view('pizzas.edit', compact('pizza'));
    }

    public function update(Pizza $pizza)
    {
        $currentUser = \auth()->user();
        if (is_null($currentUser)) {
            return \redirect('/login');
        }

        $data = \request()->validate([
            'name' => '',
            'price' => '',
        ]);

        $pizza->update($data);

        return \redirect("/pizza/{$pizza->id}");
    }

    public function delete(Pizza $pizza)
    {
        $currentUser = \auth()->user();
        Pizza::find($pizza->id)->delete();
        return \redirect('/profile/' . $currentUser->id);
    }
}
