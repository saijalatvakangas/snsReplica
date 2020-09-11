<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    /**
     * Checks if user is authenticated to make a post.
     * If user is authenticated then store function is executed.
     * Otherwise store funtion is not executed and user is redirected to a login page.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
        // return view('posts/create'); same as previous one
    }

    /**
     * Validating user's posted data -> taking the image path
     */
    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image|max:2000'
            // 'image' => ['required', 'image'], //same as above
            // 'fieldName => '', // in case a validation is not needed but information is needed to pass forward
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption'=> $data['caption'],
            'image' => $imagePath,

        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
