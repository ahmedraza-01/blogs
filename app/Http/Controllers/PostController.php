<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    
        $posts = Post::where('user_id', $user->id)->get();
    
        return view('posts.index', compact('posts'));
    }
    public function home()
    {
        $posts = Post::all();
        return view('posts.home', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => 'image|mimes:jfif,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post([
            'user_id' => auth()->id(),
            'title' => $request->get('title'),
            'excerpt' => $request->get('excerpt'),
            'body' => $request->get('body'),
        ]);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
        }

            $post->image = $fileNameToStore;

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }
   
    public function show(Post $post)
    {
        
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if (Auth::id() != $post->user_id) {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (Auth::id() != $post->user_id) {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);

            if ($post->image) {
                Storage::delete('public/image/' . $post->image);
            }

            $post->image = $fileNameToStore;
        }

        $post->title = $request->get('title');
        $post->excerpt = $request->get('excerpt');
        $post->body = $request->get('body');
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        if (Auth::id() != $post->user_id) {
            abort(403);
        }

        if ($post->picture) {
            Storage::delete('public/pictures/' . $post->picture);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}