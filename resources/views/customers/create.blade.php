<?php 
$title = "Cadastrar novo";
$subtitle = "Cliente";
?>

@extends ('layouts.layout')
@section ('content')

 <div class="col-md-10 create-box" >
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informações do cliente</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" class="form-horizontal" action="/clientes" method="POST">
              {{ csrf_field() }}
              <div class="box-body">
                
                <div class="form-group" style="width: 95%; margin: 0 auto;">
                  @include('layouts.error')
                </div>
                
                <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="first_name" placeholder="Nome" name="first_name" value="{{ old('first_name') }}" required>
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Sobrenome</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="last_name" placeholder="Sobrenome" name="last_name" value="{{ old('last_name') }}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Sexo</label>
                      <div class="radio">
                        <label>
                         <input type="radio" name="gender" id="optionsRadios1" value="1" required>
                          Masculino
                        </label>

                      <label>
                          <input style="margin-left= 5px;" type="radio" name="gender" id="optionsRadios2" value="0" required>
                          Feminino
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="cpf" class="col-sm-2 control-label">CPF</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="cpf" placeholder="CPF Somente numeros" value="{{ old('CPF') }}"  name="CPF">
                      @if($errors->has('CPF'))
                        <span class="help-block">
                          <p class="text-red">CPF inválido ou em uso.</p>
                        </span>
                      @endif
                    </div>
                  </div>

                <div class="form-group">
                    <label for="datepicker" class="col-sm-2 control-label">Nascimento</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="datepicker" placeholder="dd-mm-yyyy" name="birth" data-date-format="dd-mm-yyyy" value="{{ old('birth') }}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="telephone" class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="telephone" placeholder="Telefone" name="telephone" value="{{ old('telephone') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="cellphone" class="col-sm-2 control-label">Celular</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="cellphone" placeholder="Celular" name="cellphone" value="{{ old('cellphone') }}" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}" >
                    </div>
                  </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
      </div><!-- /.box -->
</div> <!-- first Div -->

@endsection