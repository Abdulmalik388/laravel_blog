<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .alert{
            width: 50%;
            text-align: center;
            ;
        }
    </style>
</head>
<body class="bg-light">
{{-- Include sidenav --}}

@extends('layouts.admin')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Blog Admin</a>
        <div class="ms-auto">
            <a href="{{ route('pages.welcome') }}" class="btn btn-outline-danger">Logout</a>
        </div>
    </div>
</nav>

<div class="container  mt-5">
    <center>
        <h1 class="mb-4">Admin Dashboard</h1>
    <div class="alert alert-success">
        <h4>Welcome, <strong>{{ $admin->username }}</strong>!</h4>
        <p>You are now in the admin dashboard.</p>
    </div>
    </center>
</div>
@endsection
</body>
</html>
