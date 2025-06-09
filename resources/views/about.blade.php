@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<section class="container ">
<div class="text-center mb-5">
    <h1 class="display-4 fw-bold text-primary">About Our Blog</h1>
    <p class="lead text-muted">Welcome to our digital space of ideas, stories, and inspiration.</p>
</div>

<div class="row mb-5">
    <div class="col-md-6">
        <img src="images/hero_1.jpg" class="img-fluid rounded shadow" alt="Blog image">
    </div>
    <div class="col-md-6">
        <h3 class="text-dark fw-semibold">Who We Are</h3>
        <p>
            We’re a creative team of developers, writers, and thinkers passionate about storytelling. Our mission is to share fresh insights on design, development, lifestyle, and productivity.
        </p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">✔️ 100% original content</li>
            <li class="list-group-item">✍️ Updated weekly</li>
            <li class="list-group-item">🌍 Global contributors</li>
        </ul>
    </div>
</div>

<hr>

<div class="mb-5">
    <h3 class="text-primary text-center">Our Mission</h3>
    <p>
        To inspire curiosity and empower creators through clear, concise, and valuable content. We believe words can spark action and ideas can reshape the world.
    </p>

    <div class="alert alert-info">
        <strong>Note:</strong> We welcome feedback and suggestions from our readers!
    </div>
</div>

<div class="mb-5">
    <h3 class="text-success text-center">Why We Blog</h3>
    <p>
        Writing is a powerful tool. Our blog is a space where passion meets purpose. We share what we learn, experience, and build.
    </p>

    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">We write to:</h5>
            <ul class="mb-0">
                <li>Educate the next generation of developers</li>
                <li>Keep up with trends in tech & design</li>
                <li>Express creativity and build community</li>
            </ul>
        </div>
    </div>
</div>

<div class="bg-light p-4 rounded shadow-sm text-center">
    <h4 class="text-secondary">Fun Facts</h4>
    <ul>
        <li>👨‍💻 Written over 200+ blog posts</li>
        <li>📈 Reached 10K monthly readers</li>
        <li>💬 Comments from over 50 countries</li>
        <li>🔥 Favorite blog topic: Web Development!</li>
    </ul>
</div><br><br>
    <div class="bg-light p-4 rounded shadow-sm">
        <h4 class="fw-bold text-danger text-center">✍️ What We Write About</h4>
        <ul class="list-group list-group-flush mt-3">
            <li class="list-group-item">✅ Web Development</li>
            <li class="list-group-item">✅ Life Lessons & Motivation</li>
            <li class="list-group-item">✅ Tech News & Trends</li>
            <li class="list-group-item">✅ Design & Creativity</li>
            <li class="list-group-item">✅ Personal Stories & Experiences</li>
            <li class="list-group-item">✅ Trending Stories </li>
            <li class="list-group-item">✅ Football News</li>
        </ul>
    </div>
</div>
</section>
@endsection
