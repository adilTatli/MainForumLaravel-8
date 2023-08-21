<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $search = $request->search;
        $posts = Post::like($search)->with('category', 'user')->paginate(2);

        return view('search.index', compact('posts', 'search'));
    }
}
