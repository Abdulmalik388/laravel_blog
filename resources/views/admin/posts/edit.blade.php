@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Edit Post</h2>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" rows="5" class="form-control">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Image (optional)</label><br>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" width="100" class="mb-2"><br>
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Update Post</button>
    </form>
</div>
@endsection