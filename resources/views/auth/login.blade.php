<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="{{ URL::asset('css/AdminFisio.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('/plugins/datepicker/datepicker3.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/plugins/iCheck/square/blue.css')}}">

        @yield('css')

        <!-- Scripts -->
        <script>
                window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                ]) !!};
        </script>
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>FisioStetica</b>Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sistema administrativo Fisiostetica</p>
      <p>Login: admin@admin.com</p>
      <p>Password: admin123</p>

    <form role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">

        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Entre com Email">
        <span class="ion ion-email form-control-feedback" style="padding-top: 3%; font-size:20px; "></span>

      </div>
      
      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" name="password" required placeholder="Sua senha">
        <span class="ion ion-locked form-control-feedback" style="padding-top:3%;"></span>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif


      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Continuar Logado
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    {{-- <a href="{{ route('password.request') }}">Esqueci Minha Senha</a><br> --}}

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="{{ URL::asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ URL::asset('js/admin_app.min.js') }}"></script>
<script src="{{ URL::asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ URL::asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('plugins/chartjs/Chart.min.js') }}"></script>
<script src="{{ URL::asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{ URL::asset('/plugins/iCheck/icheck.min.js')}}"></script>


<script src="https://unpkg.com/vue@2.2.1/dist/vue.js"></script>

@yield('script')

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
