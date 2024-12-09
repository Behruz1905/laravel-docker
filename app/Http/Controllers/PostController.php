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

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit',['post' => $post]);
    }

    public function update($id,Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'text' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validated);

        return redirect()->back()->with('Post created');
    }

    public function delete($id)
    {

        Post::findOrFail($id)->delete();

        return redirect()->route('dashboard')->with('Post deleted');
    }


}




