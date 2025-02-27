<!DOCTYPE html>
<html>
<head>
</head>
<body>
<header>
    @include('layouts.navbar')
</header>
@section('content')
    <div class="container">
        <p>Sizin için özel öneriler:</p>
        <div class="recommendations">
            {!! nl2br(e($recommendations)) !!}
        </div>
    </div>
@endsection
</body>
</html>
