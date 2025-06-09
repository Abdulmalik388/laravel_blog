<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Get all posts, ordered latest first
        $posts = Post::latest()->paginate(5);  // paginate 5 per page

        return view('blog.index', compact('posts'));
    }

 public function show(Post $post)
{
    // Get other posts except the one being viewed
    $otherPosts = Post::where('id', '!=', $post->id)->latest()->take(4)->get();

    // Pass both the post and the otherPosts to the view
    return view('blog.show', compact('post', 'otherPosts'));
}

}
