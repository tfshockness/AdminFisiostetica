<header class="main-header">
  <a href="//fisiostetica.com.br" class="logo">
    <!-- LOGO -->
    FisioStetica
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top skin-blue" role="navigation">
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
      @if(Auth::guest())
        <li><a href="{{ route('login') }}">Acessar</a></li>
      @else
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            {{--<img src="{{ URL::asset('img/user2-160x160.jpg') }}" class="user-image" alt="User Image">--}}
            <span class="hidden-xs">{{Auth::user()->email}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header" style="height: auto">
              {{--<img src="{{ URL::asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">--}}
              <p>
                {{Auth::user()->name}}
                <small>{{Auth::user()->email}}</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sair</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </div>
            </li>

            @endif
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
