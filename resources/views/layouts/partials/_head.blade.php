<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fisiostetica - Admin</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="{{ URL::asset('css/AdminFisio.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('/plugins/daterangepicker/daterangepicker.css')}}">
        

        @yield('css')

        <!-- Scripts -->
        <script>
                window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                ]) !!};
        </script>
</head>