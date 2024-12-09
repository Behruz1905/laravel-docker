<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderByDesc('created_at')->get();
        return view('dashboard' , compact('posts'));
    }
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'text' => 'required',
        ]);

        Post::create($validated);

        return redirect()->back()->with('Post created');

    }


}




