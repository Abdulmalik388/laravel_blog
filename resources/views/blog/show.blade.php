@extends('layouts.app')

@section('content')
    <style>
        .main-post {
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
        }

        .post-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
        }

        .post-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .post-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #444;
        }

        .sidebar {
            padding-left: 30px;
        }

        .sidebar-post {
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .sidebar-post img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .sidebar-post-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .back-btn {
            margin-top: 20px;
        }
    </style>

    <div class="container mt-5">
        <div class="card-footer text-muted small " style="width: 50%;">
                    Posted on {{ $post->created_at->format('M d, Y') }}
                    By Abdul Blog
                </div>
        <div class="row">
            <!-- Main Post -->
            <div class="col-md-8 main-post col-sm-8">


                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="post-image" alt="Post Image">
                @endif
                <h1 class="post-title">{{ $post->title }}</h1>
                <div class="post-content">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <a href="{{ route('blog.index') }}" class="btn btn-secondary back-btn">← Back to Blog</a>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4 sidebar col-sm-4">
                <h4 class="mb-4">Other Posts</h4>
                @foreach($otherPosts as $other)
                    <div class="sidebar-post">
                        @if($other->image)
                            <img src="{{ asset('storage/' . $other->image) }}" alt="Other Post Image">
                        @endif
                        <div class="sidebar-post-title">{{ \Illuminate\Support\Str::limit($other->title, 40) }}</div>
                        <a href="{{ route('blog.show', $other->id) }}" class="btn btn-sm btn-primary">Read More</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <hr>


<div class="mt-5 container">
    <!-- Button to show the comment form -->
    <button class="btn btn-outline-primary" onclick="document.getElementById('commentForm').style.display='block'">
        Comment
    </button>

    <!-- Comment form (hidden by default) -->
    <div id="commentForm" style="display: none;" class="mt-4">
        <h5>Leave a Comment</h5>
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Comment</label>
                <textarea name="comment" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </form>
    </div>
</div>



<hr>
<div class="container mt-5">
<h5>Comments</h5>
@forelse($post->comments as $comment)
    <div class="mb-3">
        <strong>{{ $comment->name }}</strong> <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
        <p>{{ $comment->comment }}</p>
    </div>
@empty
    <p>No comments yet.</p>
@endforelse
</div>
@endsection