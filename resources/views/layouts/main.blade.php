<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    @include('partial.head')
</head>
<body>
<div id="main">
    @include('partial.nav')
    @yield('content')
    @include('partial.footer')
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
