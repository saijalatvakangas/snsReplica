<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    /**
     * Show profiles.
     */
    public function index($user)
    {
        // \App\User::find($user);
        $user = User::findOrFail($user);

        return view('home', [
            'user' => $user
        ]);
    }
}
