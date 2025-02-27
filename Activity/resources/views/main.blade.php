
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

<!-- MENU -->
<header>
    @include('layouts.navbar')
</header>

<!-- HOME -->
<section id="home">
    <div class="row">
        <div class="owl-carousel owl-theme home-slider">
            <div class="item item-first">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-12">
                            <h1>New places, new faces, new memories...</h1>
                            <a href="/blogPage" class="section-btn btn btn-default">Read Blog</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-second">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-12">
                            <h1>Sports fans, we are here to learn about the latest events!</h1>
                            <a href="/blogpage" class="section-btn btn btn-default">Read Blog</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-third">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-12">
                            <h1>Check out our event information to watch the moments where creativity and aesthetics meet.</h1>
                            <a href="/blogPage" class="section-btn btn btn-default">Read Blog</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center">
                        <h2>Latest Blog posts</h2>
                    </div>
                </div>
                @foreach($recentBlogs as $blogs)
                    <div class="col-md-4 col-sm-4">
                        <div class="courses-thumb courses-thumb-secondary">
                            <div class="courses-top">
                                <div class="courses-image">
                                    <img src="{{asset('images/'.$blogs->image)}}" class="blog-image-home" alt="">
                                </div>
                                <div class="courses-date">
                                    <span title="Author"><i class="fa fa-user"></i> {{$blogs->name}}</span>
                                    <span title="Title"><i class="fa fa-calendar"></i> {{$blogs->title}}</span>
                                </div>
                            </div>

                            <div class="courses-detail">
                                <h3><a href="{{route('blogDetail',$blogs->id)}}">{{ Str::limit($blogs->blog, 100) }}</a></h3>
                            </div>

                            <div class="courses-info">
                                <a href="{{route('blogDetail',$blogs->id)}}" class="section-btn btn btn-primary btn-block">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</main>
<!-- FOOTER -->
<footer id="footer">
    @include('layouts.footer')
</footer>

</body>
</html>
