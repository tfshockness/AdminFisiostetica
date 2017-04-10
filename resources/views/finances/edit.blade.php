<?php
$title = "Financeiro";
$subtitle = "Novo";

?>
@extends ('layouts.layout')
@section ('content')

    <div class="form-group" style="width: 95%; margin: 0 auto;">
        @include('layouts.error')
    </div>

<div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title center">Novo Lançamento</h3>
                <form role="form" class="form-horizontal" action="{{action('FinancesController@update', ['id' => $finance->id])}}" method="POST">
                  {{ method_field('PUT') }}
                  {{ csrf_field() }}

                    <div class="form-group">
                        <label for="datepicker" class="col-sm-2 control-label">Data:</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="datepicker" placeholder="dd-mm-yyyy" name="add_at" value="{{$finance->add_at->toDateString()}}" data-date-format="dd-mm-yyyy" required>
                        </div>
                    </div>

                    <div class="form-group" style="padding-top:20px;">
                        <label for="first_name" class="col-sm-2 control-label">Descrição:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" placeholder="Ex: Limpeza de Pele, Pagamento de Luz"  name="name" value="{{$finance->name}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="cpf" class="col-sm-2 control-label">Valor:</label>
                      <div class="col-sm-5">
                        <input type="number" class="form-control"  placeholder="100.00"  name="value" value="{{$finance->value}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="last_name" class="col-sm-2 control-label">Tipo:</label>
                        <div class="radio">
                          <label>
                            @if($finance->type == 1)
                            <input type="radio" name="type" id="optionsRadios1" value="1" checked required>
                            @else
                            <input type="radio" name="type" id="optionsRadios1" value="1" required>
                            @endif
                            Entrada
                          </label>

                        <label>
                            @if($finance->type == 0)
                            <input style="margin-left= 5px;" type="radio" name="type" id="optionsRadios2" value="0" checked required>
                            @else
                            <input style="margin-left= 5px;" type="radio" name="type" id="optionsRadios2" value="0" required>
                            @endif
                            Saida
                        </label>
                      </div>
                    </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                </form>
            </div>
         </div>
@endsection
