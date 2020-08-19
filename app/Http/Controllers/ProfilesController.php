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
        // Finds the right profile or show 404
        $user = User::findOrFail($user);

        return view('profiles.index', [
            'user' => $user
        ]);
    }
}
