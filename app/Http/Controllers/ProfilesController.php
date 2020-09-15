<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return view('profiles.index', compact('user'));
    }

//    public function edit(User $user)
//    {
//        dd($user);
//        $this->authorize('update', $user->profile);
//        return view('profiles.edit', compact('user'));
//    }
}
