<?php 
$title = "Cadastrar novo";
$subtitle = "Profissional";
?>

@extends ('layouts.layout')
@section ('content')

<div class="col-md-10 create-box" >
          <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Informações do Profissional</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" class="form-horizontal">
            
            <div class="box-body">
                
                <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="first_name" placeholder="Nome" value="">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Sobrenome</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="last_name" placeholder="Sobrenome" value="">
                    </div>
                </div>


                <div class="form-group">
                    <label for="cpf" class="col-sm-2 control-label">CPF</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="cpf" placeholder="CPF Somente numeros" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="position" class="col-sm-2 control-label">Função</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="position" placeholder="Função" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="datepicker" class="col-sm-2 control-label">Nascimento</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="datepicker" placeholder="date" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="telephone" class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="telephone" placeholder="Telefone" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cellphone" class="col-sm-2 control-label">Celular</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="cellphone" placeholder="Celular" value="">
                    </div>
                </div>
                  
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Email" value="">
                    </div>
                </div>

                <div class="form-group picture-input col-sm-10">
                    <label for="picture">Adicionar foto</label>
                    <input type="file" id="picture">
                </div>

            </div><!-- /.box-body -->
            
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form> 
    </div> <!-- /.box -->
</div> <!-- first Div -->

@endsection