@extends('layouts.app')
@section('content')


    <div class="ftco-blocks-cover-1">
        <div class="site-section-cover overlay" style="background-image: url('images/hero_1.jpg')">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5" data-aos="fade-right">
                        <h1 class="mb-3 text-white">Let's Enjoy The Wonders of Nature</h1>

                        <p class="d-flex align-items-center">
                            <a href="https://vimeo.com/191947042" data-fancybox class="play-btn-39282 mr-3"><span
                                    class="icon-play"></span></a>
                            <span class="small">Watch the video</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <div class="site-section">

        <div class="container">

            <div class="row justify-content-center text-center">
                <div class="col-md-10">
                    <div class="heading-39101 mb-5">
                        <span class="backdrop text-center">Testimonials</span>
                        <span class="subtitle-39191">Testimony</span>
                        <h3>Happy Customers</h3>
                    </div>
                </div>
            </div>





            <div class="row">
                <div class="col-md-6">

                    <div class="testimonial-39191 d-flex">
                        <div class="mr-4">
                            <img src="images/person_1.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div>
                            <blockquote>&ldquo; I’m extremely impressed with the Flow of the website and they give real and
                                quality news.&rdquo;</blockquote>
                            <p>&mdash; John Doe</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="testimonial-39191 d-flex">
                        <div class="mr-4">
                            <img src="images/person_2.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div>
                            <blockquote>&ldquo;Great Blog, Nice news and they give update fast and quick. i'm surely going
                                to comeback.&rdquo;</blockquote>
                            <p>&mdash; Anna Trevor</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    </div>


    <!-- BLOG SECTION -->
    <div class="site-section bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">From Our Blog</h2>
                <p class="lead">Get the latest insights, stories and updates.</p>
            </div>

            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img" alt="{{ $post->title }}">

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


            <div class="text-center mt-4">
                <a href="{{ route('blog.index') }}" class="btn btn-primary px-4">View All Posts</a>
            </div>
        </div>
    </div>



@endsection