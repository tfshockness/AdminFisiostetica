<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    @include ('layouts.partials._head')

    <body class="skin-purple-light sidebar-mini">
        <div class="wrapper" id="app">
        @include ('layouts.partials._header')
        @include ('layouts.partials._side_menu')
            <div class="content-wrapper" style="overflow: auto;">
            @include ('layouts.partials._views_header')
                @yield('content')
            </div> <!-- End content -->
        </div><!-- End Wrapper -->
        @include ('layouts.partials._scripts')
    </body><!-- End Body -->
</html>