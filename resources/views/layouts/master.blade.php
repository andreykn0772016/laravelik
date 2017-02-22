<!DOCTYPE html>
<html>
<head>

    <title>@yield('title')</title>


    <link href="{{URL::to('assets/sass/app.css')}}" rel="stylesheet" type="text/css">
    @yield('styles')
</head>
<body>
@include('common.header')
<div class="main">
    @yield('content')
</div>
@include('common.footer')
</body>
</html>