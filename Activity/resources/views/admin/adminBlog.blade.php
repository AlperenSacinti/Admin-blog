<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin6">
        @include('adminLayouts.navbar')
    </header>

    <aside class="left-sidebar" data-sidebarbg="skin6">
        @include('adminLayouts.sideBar')
    </aside>

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-md-6 col-8 align-self-center">
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/blogControl">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">addBlog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 col-4 align-self-center">
                    <div class="text-end upgrade-btn">
                        <form action="{{route('adminLogout.post')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="container">
                <h1>Create Blog Post</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('adminBlog.post') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">City:</label>
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

            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            © 2021 Monster Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>


</div>
</body>
</html>
