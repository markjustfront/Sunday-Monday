<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class PostCrudController extends Controller
{

    public function index()
    {
        $posts = Post::with('category')->get();
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'descriptions' => 'required',
            'email' => 'required|email',
            'category_id' => 'required|exists:categories,id',

        ]);
        Post::create($request->only(['title', 'description', 'email', 'category_id']));
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $posts = Post::with('category')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'descriptions' => 'required',
            'email' => 'required|email',
            'category_id' => 'required|exists:categories,id',

        ]);

        $post = Post::findOrFail($id);
        $post->update($request->only(['title', 'description', 'email', 'category_id']));
        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::finbdOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);
        $post = Post::findOrFail($id);
        $post->update(['category_id' => $request->category_id]);

        return response()->json([
            'success' => true,
            'category' => $post->category->name,
        ]);
    }
}
