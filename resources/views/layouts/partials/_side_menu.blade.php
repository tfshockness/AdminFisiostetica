
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{URL::asset('img/avatar3.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Buscar por..." v-model="search" @keyup="searchCust">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat" @click.prevent="searchCust"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
        <div style="position:absolute; background-color: white; overflow: auto; width:90%; height: auto; z-index: 1; margin-top:1%;">
            <app-search :results="results" v-if="search"></app-search>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      
      <ul class="sidebar-menu">

        <li class="header">Opções Principais</li>
        <li><a href="{{url('/admin')}}"><i class="fa fa-home"></i> <span>Pagina Inicial</span></a></li>
        <li>
          <a href="{{url('agenda/')}}">
            <i class="fa fa-calendar-check-o"></i>
            <span>Agendamento</span>
          </a>
        </li>

        <li>
          <a href="{{url('clientes/')}}">
            <i class="fa fa-users"></i>
            <span>Clientes</span>
          </a>
        </li>

        <li>
          <a href="{{url('procedimentos/')}}">
            <i class="fa fa-edit"></i> <span>Procedimentos</span>
          </a>
        </li>

        <li>
          <a href="{{url('profissionais/')}}">
            <i class="fa fa-user-md"></i> <span>Profissionais</span>
          </a>
        </li>
        
        <li>
          <a href="{{url('financeiro/')}}">
            <i class="fa fa-money"></i> <span>Financeiro</span>
          </a>
        </li>
        
        @if(Auth::user()->type == 777)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-line-chart"></i> <span>Relatorios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> lista</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>

        </li>
        @endif

        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Site</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> 404 Error</a></li>
          </ul>

        </li>

        <li class="header">LEGENDAS</li>
        <li><a href="#"><i class="fa fa-circle-o text-black"></i> <span>Faltou</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Cancelado</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Agendado</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>Confirmado</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Em Atendimento</span></a></li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
