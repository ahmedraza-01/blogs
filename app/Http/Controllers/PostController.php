<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

   
    public function index()
    {
        $user = Auth::user();
    
        if ($user->hasRole('admin')) {
            $posts = Post::with('category')->get();
        } else {
            $posts = Post::where('user_id', $user->id)->with('category')->get();
        }
    
        return view('posts.index', compact('posts'));
    }
    
    
  
    public function home()
    {
        $posts = Post::all();
        return view('posts.home', compact('posts'));
    }

    public function create()
    {   
        $categories = Category::all();
        return view('posts.create',  compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jfif,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post([
            'user_id' => auth()->id(),
            'title' => $request->get('title'),
            'excerpt' => $request->get('excerpt'),
            'category_id' => $request->get('category_id'),
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
        if (Auth::id() == $post->user_id || Auth::user()->hasRole('admin')) {
            $categories = Category::all();
    
            return view('posts.edit', compact('post', 'categories'));
        } else {
            abort(403);
        }
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
            'image' => 'image|nullable|max:1999',
            'category_id' => 'required|integer|exists:categories,id',
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
        $post->category_id = $request->get('category_id'); 
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        if (Auth::id() == $post->user_id || Auth::user()->hasRole('admin')) {
            if ($post->picture) {
                Storage::delete('public/pictures/' . $post->picture);
            } 
            
        }
        else{
            abort(403);
        }
        $post->delete();
      

       

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}