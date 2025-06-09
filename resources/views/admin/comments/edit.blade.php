@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Comment</h3>

    <form action="{{ route('admin.comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $comment->name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $comment->email }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Comment</label>
            <textarea name="comment" class="form-control" rows="4">{{ $comment->comment }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Comment</button>
        <a href="{{ route('admin.comments') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
