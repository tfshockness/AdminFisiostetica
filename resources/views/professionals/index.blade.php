<?php 
$title = "Profissionais";
$subtitle = "Index";
?>

@extends ('layouts.layout')

@section('content')

<div class="col-md-12">
    <div class="box">
    
        <div class="row search-box center">
            <div class="col-md-1">
                <a class="btn btn-app bg-olive" href="{{url('profissionais/create')}}"><i class="fa fa-plus "></i>Novo</a>
            </div>
            <form class="inline-form col-md-10" action="/profissionais" method="GET">
                <fildset class="form-group">
                    <div class="box-header">
                    <div class="col-md-1">
                    <label for="search">Buscar: </label>
                    </div>
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Digite o nome do profissional" >
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
                        <th>Nome</th>
                        <th>Celular</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Opções</th>
                    </tr>
                @foreach ($professionals as $professional)
                    <tr>
                        <td>{{$professional->first_name}}&nbsp;{{$professional->last_name}}</td>
                        <td>{{$professional->cellphone ?: "Sem info"}}</td>
                        <td>{{$professional->telephone ?: "Sem info"}}</td>
                        <td>{{$professional->email}}</td>
                        <td>
                        <a class="btn bg-blue" href="{{url('profissionais/')}}/{{$professional->id}}">
                                <i class="fa fa-list"></i> Detalhes
                            </a>
                        </td>
                    </tr>
                @endforeach
                    
                </tbody>
            </table>
        </div> {{-- end box-body --}}
        <div class="box-footer pagination" align="center" style="width:100%">
            {{ $professionals->links() }}
        </div>
    </div>
</div>
@endsection