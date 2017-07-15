<?php 
$title = "Agenda";
$subtitle = "Lista de agendamento";

?>

@extends ('layouts.layout')

@section('content')

<div class="col-md-12">
    <div class="box">
        <div class="row search-box center">
            <form class="inline-form" action="/agenda" method="GET">
                <fieldset class="form-group" id="form">
                    <div class="box-header">
                        <div class="col-md-2">
                            <a class="btn btn-app bg-olive" href="{{ url('agenda/create') }}"><i class="fa fa-plus "></i>Novo</a>
                        </div>
                        <app-index-search></app-index-search>
                    </div>
                </fieldset>
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
                        <td class="btn {{$status}}">{{$appointment->status}}</td>
                        <td>{{$appointment->professional->first_name}}</td>
                        <td>
                        <a class="btn bg-blue" href="{{url('agenda/')}}/{{$appointment->id}}">
                                <i class="fa fa-list"></i> Detalhes
                            </a>
                            <a class="btn bg-olive" href="/agenda/{{$appointment->id}}/edit">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
                    
                </tbody>
            </table>
        </div>
        <div class="box-footer pagination" align="center" style="width:100%">
            {{ $appointments->links() }}
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        function getDate() {
            $('#datepick').datepicker({
                format: 'yyyy-mm-dd'
            });

        };
    </script>

@endsection