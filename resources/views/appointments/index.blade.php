<?php 
$title = "Agenda";
$subtitle = "Lista de agendamento";

?>

@extends ('layouts.layout')

@section('content')

<div class="col-md-12">
    <div class="box">
    
        <div class="row search-box center">
            <form class="inline-form">
                <fildset class="form-group">
                    <div class="box-header">
                        <div class="col-md-2">
                            <a class="btn btn-app bg-olive" href="#"><i class="fa fa-plus "></i>Novo</a>
                        </div>
                     <!-- Date range -->
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="daterangepicker">
                            </div>
                            <!-- /.input group -->
                        </div>
                    <!-- /.form group -->
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="search" name="professional_name" placeholder="Buscar por Nome" required>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="btn bg-blue form-control" name="" value="buscar" >
                        </div>
                    </div>
                </fildset>
            </form>
        </div>

        <div class="box-body table-bordered no-padding">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>Cliente</th>
                        <th>Dia</th>
                        <th>Início</th>
                        <th>Termino</th>
                        <th>Procedimento</th>
                        <th>Status</th>
                        <th>Profissional</th>
                        <th>Opções</th>
                    </tr>
                    @foreach ($appointments as $appointment)
                    <?php 
                    if($appointment->status === "Agendado"){
                        $status = "btn-warning";
                    }
                    if($appointment->status === "Confirmado"){
                        $status = "btn-success";
                    }
                    if ($appointment->status === "Atendendo"){
                        $status = "btn-info";
                    }
                    if($appointment->status === "Cancelado"){
                        $status = "btn-danger";
                    }
                    ?>
                    <tr>
                        <td>{{$appointment->customer->first_name}}&nbsp;{{$appointment->customer->last_name}}</td>
                        <td>{{$appointment->start_at->format('d M Y')}}</td>
                        <td>{{$appointment->start_at->format('h:i A')}}</td>
                        <td>{{$appointment->end_at->format('h:i A')}}</td>
                        <td>@foreach ($appointment->procedures as $procedure)
                            {{$procedure->name}}&nbsp;
                            @endforeach
                        </td>
                        <td class="btn {{$status}}" style="margin-left:15%;">{{$appointment->status}}</td>
                        <td>{{$appointment->professional->first_name}}</td>
                        <td>
                        <a class="btn bg-blue" href="{{url('profissionais/')}}/{{$appointment->id}}">
                                <i class="fa fa-list"></i> Detalhes
                            </a>
                            <a class="btn bg-olive" href="">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </td>
                @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
new Vue({
    
})
</script>


@endsection