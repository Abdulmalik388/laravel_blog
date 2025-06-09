
  

<body class="bg-light">
@extends('layouts.admin')

@section('content')

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New Post</h4>
                </div>

                <div class="card-body">
                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    {{-- Validation Errors --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ url('/admin/posts') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="content" class="form-control" rows="6" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image (optional)</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>

                       

                        <button type="submit" class="btn btn-success">Publish Post</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

