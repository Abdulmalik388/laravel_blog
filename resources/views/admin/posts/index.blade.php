@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">All Blog Posts</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Created</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" width="80" class="img-thumbnail">
                    @else
                        <small>No Image</small>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                    <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center">No posts found</td></tr>
        @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
