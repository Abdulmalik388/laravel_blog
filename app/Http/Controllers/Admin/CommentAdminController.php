<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentAdminController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        $comment->update($request->all());
        return redirect()->route('admin.comments')->with('success', 'Comment updated!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment deleted.');
    }
}
