<?php
$title = "Home";
$subtitle = "Page";
?>

@extends ('layouts.layout')
@section('css')
<link rel="stylesheet" href="{{URL::asset('plugins/fullcalendar/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
@endsection
@section ('content')

<!-- Small boxes (Stat box) -->
      <div class="row home-btn">

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <a href="{{url('clientes/create')}}" class="link-home"><span class="info-box-icon"><i class="ion ion-person-add"></i></span></a>

            <div class="info-box-content">
              <span class="info-box-text">Novo Cliente</span>
              <span class="info-box-number">41,410</span>

                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <a href="{{url('agenda/create')}}" class="link-home"><span class="info-box-icon"><i class="ion ion-clock"></i></span></a>

            <div class="info-box-content">
              <span class="info-box-text">Novo Agendamento</span>
              <span class="info-box-number">41,410</span>

                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <a href="{{url('financeiro/create')}}" class="link-home"><span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span></a>

            <div class="info-box-content">
              <span class="info-box-text">Efetuar Pagamento</span>
              <span class="info-box-number">41,410</span>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- ./col -->



      </div>
      <!-- /.row -->
<!-- Small boxes (END box) -->

<!-- Calendar (start calendar) -->
    <div class="row home-btn">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>

<!-- Calendar (END calendar) -->






@endsection


@section('script')
    <!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ URL::asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script>
  $(function () {
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },

        buttonText: {
            today: 'hoje',
            month: 'mês',
            week: 'semana',
            day: 'dia',
            list: 'lista'
        },

        navLinks: true, // can click day/week names to navigate views

        selectable: true,

        selectHelper: true,

        editable: false,

        eventLimit: false, // allow "more" link when too many events

        //Random default events - Pegar Evento do banco de Dados e jogar aki!!!!
        events: [
          @foreach ($appointments as $app)
            {
              title: '{{$app->customer->first_name}} {{$app->customer->last_name}}',
              start: '{{$app->start_at->toDateTimeString()}}',
                end: '{{$app->end_at->toDateTimeString()}}',
                allDay:false,
                url: '/agenda/{{$app->id}}', //Mudar para Detalhe do agendamento
                backgroundColor: "{{$app->getColor()}}", //Primary (light-blue)
                borderColor: "{{$app->getColor()}}"
            },
          @endforeach
          {
            title: 'Pra nao bugar o Calendario',
            start: new Date(y - 20, m, 28), //
            end: new Date(y - 20, m, 29),
            url: 'http://google.com/',
            backgroundColor: "#3c8dbc", //Primary (light-blue)
            borderColor: "#3c8dbc" //Primary (light-blue)
          }
        ]
    });
  });
</script>
@endsection







