<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Blog Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
@extends('layouts.app')
@section('content')

<div class="container py-5">
    <h1 class="mb-4">Blog Posts</h1>

    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                   
                    <a href="#" class="btn btn-primary mt-auto">Read More</a>
                </div>
                <div class="card-footer text-muted small">
                    Posted on {{ $post->created_at->format('M d, Y') }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
