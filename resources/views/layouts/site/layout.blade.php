<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
@include('layouts.site.partials._head')
</head>
<body>

@yield('content')

<footer class="footer">
@include('layouts.site.partials._footer')
</footer>
<!-- END - FOOTER -->
@include('layouts.site.partials._scripts')
</body>
</html>