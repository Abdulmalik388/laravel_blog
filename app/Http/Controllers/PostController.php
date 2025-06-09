<?php
namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Get all posts, newest first
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('blog', compact('posts'));
    }

}