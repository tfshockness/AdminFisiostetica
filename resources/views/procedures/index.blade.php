<?php 
$title = "Procedimentos";
$subtitle = "Lista de Procedimentos";
?>

@extends ('layouts.layout')

@section('content')

<div class="col-md-12">
    <div class="box">
    
        <div class="row search-box center">
            <div class="col-md-1">
                <a class="btn btn-app bg-olive" href="#"><i class="fa fa-plus "></i>Novo</a>
            </div>
            <form class="inline-form col-md-10">
                <fildset class="form-group">
                    <div class="box-header">
                        <div class="col-md-1">
                            <label for="search">Buscar: </label>
                        </div>
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" id="search" name="professional_name" placeholder="Digite o nome do procedimento" required>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="btn bg-blue form-control" name="" value="buscar" >
                        </div>
                    </div>
                </fildset>
            </form>
        </div>

{{-- ADICIONAR PROCEDIMENTO --}}
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title center">Adicionar Procedimento</h3>
            <form role="form" class="form-horizontal">
                    <div class="form-group" style="padding-top:20px;">
                        <label for="first_name" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="first_name" placeholder="Nome" value="">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
            </form>
        </div>
</div>

{{-- EDITAR PROCEDIMENTO --}}

    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title center">Editar Procedimento</h3>
            <form role="form" class="form-horizontal">
                    <div class="form-group" style="padding-top:20px;">
                        <label for="first_name" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="first_name" placeholder="Nome" value="">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
            </form>
        </div>
</div>


        <div class="box-body table-bordered no-padding">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>Nome</th>
                        <th>Opções</th>
                    </tr>
                @foreach ($procedimentos as $procedimento)
                    <tr>
                        <td>{{$procedimento->name}}</td>
                        <td>
                            <a class="btn bg-olive" href="">
                                <i class="fa fa-edit"></i> Editar
                            </a>
                        </td>
                @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection