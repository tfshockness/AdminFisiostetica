<?php 
$title = "Agenda";
$subtitle = "Editar Agendamento";

?>

@extends ('layouts.layout')

@section('content')

<div class="col-md-10 create-box" >
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informações do Agendamento</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" class="form-horizontal" action="{{action('AppointmentsController@update', ['id' => $appointment->id])}}" method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

              <div class="box-body">
                <div class="form-group" style="width: 95%; margin: 0 auto;">
                  @include('layouts.error')
                </div>
                
                <div class="col-sm-2 form-group">
                    <label for="first_name" class="control-label col-sm-2">Cliente</label>

                    <input type="hidden" name="customer_id" value="{{$appointment->customer->id}}">

                </div>
                <div>
                    <h3>{{$appointment->customer->first_name}} {{$appointment->customer->last_name}}</h3>
                </div>
                

                <div class="col-sm-4">
                    <label for="datepicker" class="control-label">Data</label>
                    <input type="text" class="form-control col-sm-2" id="datepicker" placeholder="dd-mm-yyyy" name="date" data-date-format="dd-mm-yyyy" required value={{$appointment->start_at->format('d-m-Y')}}>
                </div>


                <div class="col-sm-4">
                    <label class="control-label">Inicio</label>
                    <select class="form-control" name="start_at">
                        <option selected>{{$appointment->start_at->format('h:i')}}</option>
                        <option>08:00</option>
                        <option>08:30</option>
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                        <option>13:00</option>
                        <option>13:30</option>
                        <option>14:00</option>
                        <option>14:30</option>
                        <option>15:00</option>
                        <option>15:30</option>
                        <option>16:00</option>
                        <option>16:30</option>
                        <option>17:00</option>
                        <option>17:30</option>
                        <option>18:00</option>
                        <option>19:30</option>
                        <option>20:00</option>
                        <option>21:30</option>
                        <option>22:00</option>
                    </select>
                </div>


                <div class="col-sm-4">
                    <label class="control-label">Fim</label>
                    <select class="form-control" name="end_at">
                    <option selected>{{$appointment->end_at->format('h:i')}}</option>
                        <option>08:30</option>
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                        <option>13:00</option>
                        <option>13:30</option>
                        <option>14:00</option>
                        <option>14:30</option>
                        <option>15:00</option>
                        <option>15:30</option>
                        <option>16:00</option>
                        <option>16:30</option>
                        <option>17:00</option>
                        <option>17:30</option>
                        <option>18:00</option>
                        <option>19:30</option>
                        <option>20:00</option>
                        <option>21:30</option>
                        <option>22:00</option>
                        <option>22:30</option>
                    </select>
                </div>

                <div class="col-sm-8">
                    <label for="procedure" class="control-label">Procedimento</label>
                    <select class="form-control" name="procedure">
                    @foreach ($procedures as $procedure)
                        <option value="{{$procedure->id}}">{{$procedure->name}}</option>
                    @endforeach
                    </select>
                </div>

               <div class="col-sm-4">
                    <label for="status" class="control-label" >Status</label>
                    <select class="form-control" name="status">
                        <option>Agendado</option>
                        <option>Confirmado</option>
                        <option>Atendendo</option>
                        <option>Cancelado</option>
                    </select>
                </div>

               <div class="col-sm-12">
                    <label for="professional" class="control-label">Profissional</label>
                    <select class="form-control" name="professional">
                    @foreach ($professionals as $professional)
                        <option value="{{$professional->id}}">{{$professional->first_name}} {{$professional->last_name}}</option>
                    @endforeach
                    </select>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Agendar</button>
              </div>
            </form>
      </div><!-- /.box -->
</div> <!-- first Div -->


@endsection