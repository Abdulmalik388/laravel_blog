<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Post;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Store admin ID in session
            Session::put('admin_id', $admin->id);
            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Session::forget('admin_id');
        return redirect('/pages/login');
    }

    public function dashboard()
    {
        if (!Session::has('admin_id')) {
            return redirect('/admin/login');
        }

        $admin = Admin::find(Session::get('admin_id'));

        return view('admin.dashboard', compact('admin'));
    }
    public function storePost(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
       
    ]);

    $imagePath = null;
    

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts/images', 'public');
    }

   
    Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $imagePath,
       
    ]);

    return redirect('/admin/posts/create')->with('success', 'Post created successfully!');
}
public function createPost()
{
    return view('admin.posts.create');
}


public function allPosts()
{
    $posts = Post::latest()->paginate(10);
    return view('admin.posts.index', compact('posts'));
}

public function editPost($id)
{
    $post = Post::findOrFail($id);
    return view('admin.posts.edit', compact('post'));
}

public function updatePost(Request $request, $id)
{
    $post = Post::findOrFail($id);
    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    $post->title = $request->title;
    $post->content = $request->content;
    
    if ($request->hasFile('image')) {
        $post->image = $request->file('image')->store('posts', 'public');
    }

    $post->save();

    return redirect()->route('admin.posts')->with('success', 'Post updated successfully');
}

public function deletePost($id)
{
    $post = Post::findOrFail($id);
    $post->delete();

    return redirect()->route('admin.posts')->with('success', 'Post deleted successfully');
}


}

