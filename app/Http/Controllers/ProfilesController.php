<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfilesController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        $users = DB::table('users')->get();
        return view('profiles.index', compact('user', 'users'));
    }

}
