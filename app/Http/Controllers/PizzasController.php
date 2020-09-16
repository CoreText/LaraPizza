<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    public function show(Pizza $pizza)
    {
        $user = \auth()->user();
        return view('pizzas.show', compact('pizza', 'user'));
    }

    public function create()
    {
        $user = \auth()->user();

        // @TODO change to `many-to-many`
        //$ingredients = Ingredient::with('user')->get();
        $ingredients = DB::table('ingredients')->get();
        return view('pizzas.create', compact('user', 'ingredients'));
    }

    public function store()
    {
        $currentUser = \auth()->user();
        $request = \request();

        $data = $request->validate([
            'name' => 'required',
            'price' => '',
            'ingredients' => 'required',
        ]);

        $data['total_price'] = '0.00';

        $inputIngredients = $request->get('ingredients');

        if (is_array($inputIngredients)) {
            $ingredients = array_map(static function ($ingredientId) {
                $item_id = (int) filter_var($ingredientId, FILTER_SANITIZE_NUMBER_INT);

                $item = Ingredient::find($item_id);
                return $item->getAttributes();
            }, $inputIngredients);

            $data['total_price'] = array_reduce($ingredients, static function ($total, $current) {
                $total += $current['price'];
                return $total;
            },  $data['price']);
            $data['ingredients'] = json_encode($ingredients);
        }

        $currentUser->pizzas()->create($data);
        return \redirect('/profile/' . $currentUser->id);
    }

    public function edit(Pizza $pizza)
    {
        // @TODO change to `many-to-many`
        //$ingredients = Ingredient::with('user')->get();
        $ingredients = DB::table('ingredients')->get();

        return view('pizzas.edit', compact('pizza', 'ingredients'));
    }

    public function update(Pizza $pizza)
    {
        $currentUser = \auth()->user();
        if (is_null($currentUser)) {
            return \redirect('/login');
        }

        $request = \request();

        $data = $request->validate([
            'name' => 'required',
            'price' => '',
            'ingredients' => 'required',
        ]);

        $data['total_price'] = '0.00';

        $inputIngredients = $request->get('ingredients');

        if (is_array($inputIngredients)) {
            $ingredients = array_map(function ($ingredientId) {
                $item_id = (int) filter_var($ingredientId, FILTER_SANITIZE_NUMBER_INT);

                $item = Ingredient::find($item_id);
                return $item->getAttributes();
            }, $inputIngredients);

            $data['total_price'] = array_reduce($ingredients, static function ($total, $current) {
                $total += $current['price'];
                return $total;
            }, $data['price']);
            $data['ingredients'] = json_encode($ingredients);
        }

        $pizza->update($data);

        return \redirect('/profile/' . $currentUser->id);
    }

    public function delete(Pizza $pizza)
    {
        $currentUser = \auth()->user();
        Pizza::find($pizza->id)->delete();
        return \redirect('/profile/' . $currentUser->id);
    }


}
