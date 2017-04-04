<?php 
$title = "Editar";
$subtitle = "Procedimento";
?>

@extends ('layouts.layout')
@section ('content')

    <div class="form-group" style="width: 95%; margin: 0 auto;">
        @include('layouts.error')
    </div>
    
<div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title center">Editar Procedimento</h3>
                <form role="form" class="form-horizontal" action="{{action('ProceduresController@update', ['id' => $procedure->id])}}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                        <div class="form-group" style="padding-top:20px;">
                            <label for="first_name" class="col-sm-2 control-label">Nome</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="editar_name" placeholder="Procedimento" value="{{ $procedure->name }}" name="name" required>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                </form>
            </div>
         </div>

@endsection