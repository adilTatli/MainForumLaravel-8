<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $validationRules = [
        'user_id' => 'required',
        'post_id' => 'required',
        'content' => 'required',
    ];

    public function show(Post $post)
    {
        $comments = $post->with(['comments', 'user', 'parentComment'])->get();

        return view('posts.show', compact('comments'));
    }

    public function storeOrReply(Request $request)
    {
        $isReply = $request->has('parent_id');

        $validationRules = $this->validationRules;

        if ($isReply) {
            $validationRules['parent_id'] = 'required';
        }

        $validatedData = $request->validate($validationRules);

        Comment::create($validatedData);

        return redirect()->back()->with('success', $isReply ? 'Reply added successfully!' : 'Comment added successfully!');
    }
}
