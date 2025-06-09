@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>All Comments</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Post Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($comments as $comment)
            <tr>
                <td>{{ $comment->post->title ?? 'Deleted Post' }}</td>
                <td>{{ $comment->name }}</td>
                <td>{{ $comment->email }}</td>
                <td>{{ Str::limit($comment->comment, 60) }}</td>
                <td>
                    <a href="{{ route('admin.comments.edit', $comment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.comments.delete', $comment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this comment?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">No comments yet.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $comments->links() }}
</div>
@endsection
