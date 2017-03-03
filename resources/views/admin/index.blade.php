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
            <span class="info-box-icon"><i class="ion ion-person-add"></i></span>

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
            <span class="info-box-icon"><i class="ion ion-clock"></i></span>

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
            <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

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
         @foreach ($appointments as $app)
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