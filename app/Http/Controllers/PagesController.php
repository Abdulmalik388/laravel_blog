<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function home()
    {
        return view('welcome');
    }

    // In PagesController.php
    public function index()
    {
        $posts = Post::latest()->take(3)->get(); // or ->get() if you want all
        return view('welcome', compact('posts'));
    }

}
