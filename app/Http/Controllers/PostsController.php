<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
        // return view('posts/create'); same as previous one
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image'
            // 'image' => ['required', 'image'], //same as above
            // 'fieldName => '', // in case a validation is not needed but information is needed to pass forward
        ]);

        auth()->user()->posts()->create($data);

        dd(request()->all());
    }
}
