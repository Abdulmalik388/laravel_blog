<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
public function store(Request $request, $postId)
{
    $request->validate([
        'name' => 'required',
        'comment' => 'required'
    ]);

    Comment::create([
        'post_id' => $postId,
        'name' => $request->name,
        'email' => $request->email,
        'comment' => $request->comment,
    ]);

    return back()->with('success', 'Comment added successfully.');
}
}
