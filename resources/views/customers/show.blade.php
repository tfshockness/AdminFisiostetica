<?php
$title = "Detalhes do";
$subtitle = "Cliente";
?>

@extends ('layouts.layout')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/fullcalendar/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
@endsection
@section('content')

    <div class="form-group" style="width: 95%; margin: 0 auto;">
        @include('layouts.error')
    </div>
<!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

            @if($customer->gender === 1)

              <img class="profile-user-img img-responsive img-circle" src="{{URL::asset('img/avatar5.png')}}" alt="User profile picture">

            @else

            <img class="profile-user-img img-responsive img-circle" src="{{URL::asset('img/avatar2.png')}}" alt="User profile picture">

            @endif

              <h3 class="profile-username text-center">{{$customer->first_name}}&nbsp;{{$customer->last_name}}</h3>

              <p class="text-muted text-center">{{$customer->position}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>CPF</b> <a class="pull-right">{{$customer->CPF}}</a>
                </li>
                <li class="list-group-item">
                  <b>Telefone</b> <a class="pull-right">{{$customer->telephone ?: "-"}}</a>
                </li>
                <li class="list-group-item">
                  <b>Celular</b> <a class="pull-right">{{$customer->cellphone ?: "-"}}</a>
                </li>
                <li class="list-group-item">
                  <b>E-mail</b> <a class="pull-right">{{$customer->email}}</a>
                </li>
              <a href='#editar' class="btn btn-primary btn-block" data-toggle="tab"><b>Editar</b></a>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#agenda" data-toggle="tab">Agenda</a></li>
              <li><a href="#editar" data-toggle="tab">Editar</a></li>
            </ul>
            <div class="tab-content">
<!-- ----------------------Agenda Starts From HERE ----------------------- -->
              <div class="active tab-pane" id="agenda">
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-md-3">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                <h4 class="box-title">Novo Agendamento</h4>
                                </div>
                                <div class="box-body">
                                <!-- the events -->
                                <div>
                                  <a href="#">
                                    <button class="btn bg-olive" style="width:100%;"><i class="fa fa-plus"></i></button>
                                  </a>
                                </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /. box -->
                            </div>
                            <!-- /.col -->
                          <div class="col-md-9">
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
                        <!-- /.row -->
                    </section>
                    <!-- /.content -->


              </div>
              <!-- /.tab-pane -->



<!-- -------------------- EDITAR STARTS HERE --------------------- -->

              <div class="tab-pane" id="editar">
                <form class="form-horizontal" action="{{action('CustomersController@update', ['id' => $customer->id])}}" method="POST">
                {{ method_field('PUT') }}
                  {{ csrf_field() }}


                  <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nome" value="{{$customer->first_name}}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Sobrenome</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Sobrenome" value="{{$customer->last_name}}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Sexo</label>
                      <div class="radio">
                        <label>
                        @if($customer->gender === 1)

                        <input type="radio" name="gender" id="optionsRadios1" value="1" checked  required>
                        @else
                         <input type="radio" name="gender" id="optionsRadios1" value="1" required>

                        @endif

                          Masculino
                        </label>

                      <label>
                      @if($customer->gender === 0)

                          <input style="margin-left= 5px;" type="radio" name="gender" id="optionsRadios2" value="0" checked required>

                      @else
                          <input style="margin-left= 5px;" type="radio" name="gender" id="optionsRadios2" value="0" required>

                      @endif
                          Feminino
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="cpf" class="col-sm-2 control-label">CPF</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="cpf" placeholder="CPF Somente numeros" name="CPF" value="{{$customer->CPF}}" required>
                    </div>
                  </div>

                <div class="form-group">
                    <label for="datepicker" class="col-sm-2 control-label">Nascimento</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="datepicker" placeholder="dd-mm-yyyy" name="birth" value="{{$customer->birth->format('d-m-Y')}}" data-date-format="dd-mm-yyyy" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="telephone" class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="telephone" placeholder="Telefone" name="telephone" value="{{$customer->telephone}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="cellphone" class="col-sm-2 control-label">Celular</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="cellphone" placeholder="Celular" name="cellphone" value="{{$customer->cellphone}}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{$customer->email}}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Salvar</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
        @section('script')
        <!-- fullCalendar 2.2.5 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script src="{{ URL::asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>
        <script>
        $(function () {

          /* initialize the external events
          -----------------------------------------------------------------*/
          function ini_events(ele) {
            ele.each(function () {

              // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
              // it doesn't need to have a start or end
              var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
              };

              // store the Event Object in the DOM element so we can get to it later
              $(this).data('eventObject', eventObject);

              // make the event draggable using jQuery UI
              $(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
              });

            });
          }

          ini_events($('#external-events div.external-event'));

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
              @foreach ($customer->appointments as $app)
                {
                  title: '{{$app->professional->first_name}} {{$app->professional->last_name}}',
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


    @endsection
