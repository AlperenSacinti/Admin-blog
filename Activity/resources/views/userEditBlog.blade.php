<!DOCTYPE html>
<html>
<head>
</head>
<body>
<headear>
    @include('layouts.navbar')
</headear>

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Table</h4>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap">
                            <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Username</th>
                                <th class="border-top-0">Title</th>
                                <th class="border-top-0">City</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->city}}</td>
                                    <td>
                                        <a href="{{route('updatePage',$post->id)}}" class="btn btn-primary">Update</a>
                                    </td>
                                    <td>
                                        <form action="{{route('userDeleteBlog',$post->id)}}" method="post" onsubmit="return confirm('Are you sure you want to delete this blog?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
