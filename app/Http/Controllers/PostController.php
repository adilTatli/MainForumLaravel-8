<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'user'])
            ->orderBy('id', 'desc')
            ->paginate(3);
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with('user')->where('slug',$slug)->firstOrFail();
        $post->views += 1;
        $post->update();
        return view('posts.show', compact('post'));
    }

    public function postsAuthor($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts()->with('category', 'user')->paginate(10);
        return view('author.show', compact('user', 'posts'));
    }
}
