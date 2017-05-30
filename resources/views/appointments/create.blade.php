<?php 
$title = "Agenda";
$subtitle = "Novo Agendamento";

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
            <form role="form" class="form-horizontal" action="/agenda" method="POST">
              {{ csrf_field() }}
              <div class="box-body">
                
                <div class="form-group" style="width: 95%; margin: 0 auto;">
                  @include('layouts.error')
                </div>
                
                <div class="col-sm-2 form-group">
                    <label for="first_name" class="control-label col-sm-2">Cliente</label>
                </div>
                <div class="input-group col-sm-10 form-group">
                    {{-- APENAS TESTE  --}}
                    {{-- <select class="form-control" name="customer">
                    @foreach ($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
                    @endforeach
                    </select> --}}

                    {{-- ORIGINAL AKI --}}
                    <input type="text" class="form-control" id="first_name" placeholder="Digite nome ou sobrenome" name="search" required v-model="search" @keydown="searchCust">
                    <input type="hidden" name="customer_id" :value="customer_id">
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                    
                </div>
                <div class="col-sm-10 form-group" style="margin-left:14%; margin-top: -1.2%; z-index:2; position:absolute;">
                    <app-search :results="results" v-if="showsearch" @setid="setCustomerId"></app-search>
                </div>

                <div class="col-sm-4">
                    <label for="first_name" class="control-label">Data</label>
                    <input type="text" class="form-control col-sm-2" id="datepicker" placeholder="dd-mm-yyyy" name="date" data-date-format="dd-mm-yyyy" required>
                </div>


                <div class="col-sm-4">
                    <label for="first_name" class="control-label">Inicio</label>
                    <select class="form-control" name="start_at">
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
                    <label for="first_name" class="control-label">Fim</label>
                    <select class="form-control" name="end_at">
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
                    <label for="first_name" class="control-label">Procedimento</label>
                    <select class="form-control" name="procedure">
                    @foreach ($procedures as $procedure)
                        <option value="{{$procedure->id}}">{{$procedure->name}}</option>
                    @endforeach
                    </select>
                </div>

               <div class="col-sm-4">
                    <label for="first_name" class="control-label" >Status</label>
                    <select class="form-control" name="status">
                        <option>Agendado</option>
                        <option>Confirmado</option>
                        <option>Atendendo</option>
                        <option>Cancelado</option>
                    </select>
                </div>

               <div class="col-sm-12">
                    <label for="first_name" class="control-label">Profissional</label>
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