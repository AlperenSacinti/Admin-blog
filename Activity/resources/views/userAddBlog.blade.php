<!DOCTYPE html>
<html>
<head>
    <title>Create Blog Post</title>
</head>
<body>
<header>
    @include('layouts.navbar')
</header>

<div class="container">
    <h1>Create Blog Post</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('userBlog.post') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <textarea class="form-control" name="city" required></textarea>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" name="blog" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">İmage:</label>
            <input type="file" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Create Blog Post</button>
    </form>
</div>
</body>
</html>
