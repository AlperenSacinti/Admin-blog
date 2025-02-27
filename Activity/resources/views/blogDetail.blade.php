<!DOCTYPE html>
<html>
<head>
    <title>{{$blogpost->title }}</title>
</head>
<body>
<header>
    @include('layouts.navbar')
</header>

<div class="container mt-5">
    <div class="card">
        <img src="{{asset('images/'.$blogpost->image)}}" class="blog-image" alt="Blog Post Image">
        <div class="card-body">
            <h1 class="card-title">{{ $blogpost->title }}</h1>
            <h6 class="card-subtitle mb-2 text-muted">By {{ $blogpost->name }} on {{ $blogpost->created_at->format('d/m/Y H:i') }}</h6>
            <p class="card-text">{{$blogpost->blog }}</p>
        </div>
    </div>
</div>
</body>
</html>
