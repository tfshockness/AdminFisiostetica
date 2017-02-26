<?php 
$title = "Detalhes do";
$subtitle = "Profissional";
?>

@extends ('layouts.layout')
@section('css')
<link rel="stylesheet" href="{{URL::asset('plugins/fullcalendar/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
@endsection
@section('content')

<!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{$customer->first_name}}&nbsp;{{$customer->last_name}}</h3>

              <p class="text-muted text-center">{{$customer->position}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Telefone</b> <a class="pull-right">{{$customer->telphone ?: "-"}}</a>
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
                    <<section class="content">
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
                <form class="form-horizontal">

                  <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="first_name" placeholder="Nome" value="{{$customer->first_name}}">
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Sobrenome</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="last_name" placeholder="Sobrenome" value="{{$customer->last_name}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Sexo</label>
                      <div class="radio">
                        <label>
                         <input type="radio" name="optionsRadios" id="optionsRadios1" value="0" >
                          Masculino
                        </label>

                      <label>
                          <input style="margin-left= 5px;" type="radio" name="optionsRadios" id="optionsRadios2" value="1">
                          Feminino
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="cpf" class="col-sm-2 control-label">CPF</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="cpf" placeholder="CPF Somente numeros" value="{{$customer->CPF}}">
                    </div>
                  </div>

                <div class="form-group">
                    <label for="datepicker" class="col-sm-2 control-label">Nascimento</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="datepicker" placeholder="date" value="{{$customer->birth}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="telephone" class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="telephone" placeholder="Telefone" value="{{$customer->telephone}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="cellphone" class="col-sm-2 control-label">Celular</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="cellphone" placeholder="Celular" value="{{$customer->cellphone}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" placeholder="Email" value="{{$customer->email}}">
                    </div>
                  </div>

                  <div class="form-group picture-input col-sm-10">
                  <label for="picture">Adicionar foto</label>
                  <input type="file" id="picture">
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

    @endsection

    @section('script')
    <!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


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
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'hoje',
        month: 'mês',
        week: 'semana',
        day: 'dia'
      },
      //Random default events - Pegar Evento do banco de Dados e jogar aki!!!!
      events: [
         @foreach ($customer->appointments as $app)
          {
            title: '{{$app->status}}',
            start: new Date(
              {{$app->start_at->year}}, //Ano
              {{$app->start_at->month}} - 1, //Mes
              {{$app->start_at->day}}, //Dia
              {{$app->start_at->hour}}, //hora
              {{$app->start_at->minute}} //min
              ),
              end: new Date(
              {{$app->end_at->year}}, //Ano
              {{$app->end_at->month}} - 1, //Mes
              {{$app->end_at->day}}, //Dia
              {{$app->start_at->hour}}, //hora
              {{$app->start_at->minute}} //min
              ),
              allDay:false,
              url: '/clientes/{{$app->customer_id}}', //Mudar para Detalhe do agendamento
              backgroundColor: "{{$app->getColor($app->status)}}", //Primary (light-blue)
              borderColor: "{{$app->getColor($app->status)}}" 
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
      ],
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      }
    });

    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
  });
</script>
@endsection