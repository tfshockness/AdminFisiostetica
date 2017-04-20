<?php 
$title = "Agenda";
$subtitle = "Detalhes do agendamento";
?>

@extends ('layouts.layout')

@section('content')

<div class="col-md-8 col-md-offset-2 create-box" >
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title">Informações do Agendamento</h2>
        </div>
            <!-- /.box-header -->
        <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header" style="background-color: {{$appointment->getColor()}}">
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username" style="color: white; font-weight: bold;">{{$appointment->customer->first_name}} {{$appointment->customer->last_name}}</h3>
                <h4 class="widget-user-desc" style="color: white; font-weight: bold;">{{$appointment->status}}</h4>
            </div>
            <div class="box-footer">
                <ul class="list-group" style="font-size: 15px; font-weight: 500;">
                    <li class="list-group-item">Data do agendamento: <span class="pull-right">{{$appointment->start_at->format('d\\/m\\/Y')}} - {{$appointment->start_at->format('h:i')}} as {{$appointment->end_at->format('h:i')}}</span></li>
                    <li class="list-group-item">Procedimento: <span class="pull-right">{{$appointment->procedures->first()->name}}</span></li>
                    <li class="list-group-item">Nome do Profissional:<span class="pull-right">{{$appointment->professional->first_name}} {{$appointment->professional->last_name}}</span></li>
                    <li class="list-group-item"><a href="{{URL::previous()}}" class="btn btn-primary"><i class="fa fa-undo"></i> Voltar</a><span class="pull-right "><a href="/agenda/{{$appointment->id}}/edit" class="btn bg-olive"><i class="fa fa-edit"></i> Editar</a></span></li>
                </ul>
            </div>
        </div>
    </div><!-- /.box -->
</div> <!-- first Div -->


@endsection