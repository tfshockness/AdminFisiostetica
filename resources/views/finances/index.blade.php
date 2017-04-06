<?php 
$title = "Financeiro";
$subtitle = "Resumo";

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
                        <div class="col-md-5">
                            <h1>Saldo: <span style="color:{{ (App\Finance::getBalance() > 0 ? 'green' : 'red') }}">{{ App\Finance::getBalance() }}</span></h1>
                        </div>
                    </div> {{-- end box-header --}}
                    <div class="box-header">
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
                    </div> {{-- end box-header --}}
                </fildset>
            </form>
        </div>

        <div class="box-body table-bordered no-padding">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Opções</th>
                    </tr>
                    @foreach ($lancamentos as $lancamento)
                    <tr>
                        <td>{{$lancamento->add_at->format('d/m/Y')}}</td>
                        <td>{{$lancamento->name}}</td>
                        @if($lancamento->type === 1)
                        <td>Entrada</td>
                        @else
                        <td>Saida</td>
                        @endif
                        @if($lancamento->type === 1)
                        <td style="color:green">{{$lancamento->value}}</td>
                        @else
                        <td style="color:red">{{$lancamento->value}}</td>
                        @endif
                        <td>
                            <a class="btn bg-olive" href="/financeiro/{{$lancamento->id}}/edit">
                                    <i class="fa fa-edit"></i> Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection