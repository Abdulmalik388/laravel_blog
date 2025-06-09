@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Blog Posts</h2>
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
                   
                    <a href="{{ route('blog.show', $post->id) }}" class="btn btn-primary mt-auto">Read More</a>
                </div>
                <div class="card-footer text-muted small">
                    Posted on {{ $post->created_at->format('M d, Y') }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination links --}}
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
