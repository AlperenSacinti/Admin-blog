<!DOCTYPE html>
<html>
<head>
</head>
<body>
<header>
    @include('layouts.navbar')

    <div class="container">
        <h1>Update Blog Post</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('updateBlog.post',$post->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}" required>
            </div>
            <div class="form-group">
                <label for="content">City:</label>
                <textarea class="form-control" name="city" required>{{$post->city}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" name="blog" rows="5" required>{{$post->blog}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">İmage:</label>
                <input type="file" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Update Blog Post</button>
        </form>
    </div>
</header>
</body>
</html>
