<!DOCTYPE html>
<html lang="en">
<head>

    <title></title>

</head>
<body>

<!-- MENU -->
<header>
    @include('layouts.navbar')
</header>

<section class="section-background">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 pull-right col-xs-12">
                <div class="form">
                    <form action="#">
                        <div class="form-group">
                            <label class="control-label">Blog Search</label>

                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                                  <button class="btn btn-default" type="button">Go!</button>
                                             </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-9 col-xs-12">
                <div class="row">
                    @foreach($blogpost as $post)
                    <div class="col-sm-6">
                        <div class="courses-thumb courses-thumb-secondary">
                            <div class="courses-top">
                                <div class="courses-image">
                                    @if($post->image)
                                        <img src="{{asset('images/'.$post->image)}}" class="blog-image-main" alt="">
                                    @endif
                                </div>
                                <div class="courses-date">
                                    <span title="Author">{{$post->name}}</span>
                                </div>
                                <div class="card-footer text-muted">
                                    {{$post->created_at->format('d/m/Y H:i')}}
                                </div>
                            </div>

                            <div class="courses-detail">
                                <h3>{{$post->title}}</h3>
                                <span>{{$post->city}}</span>
                            </div>

                            <div class="courses-info">
                                <a href="{{route('blogDetail', $post->id)}}" class="section-btn btn btn-primary btn-block">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="pagination">
        {{$blogpost->links('pagination::bootstrap-4')}}
    </div>

</section>

<!-- FOOTER -->
<footer id="footer">
    @include('layouts.footer')
</footer>


</body>
</html>
