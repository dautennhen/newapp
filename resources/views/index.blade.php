<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('header')
    </header>

    <div id="main" class="row">
        @yield('content')
    </div>

    <footer class="row">
        @include('footer')
    </footer>

</div>
<div class="fullscreen_loading" style="display:none">
    <div class="spinner-border text-success" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
</body>
</html>
