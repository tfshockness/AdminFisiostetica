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
                <fieldset class="form-group">
                    <div class="box-header" style="padding-bottom: 0px;">

                        <div class="col-xs-4 right">
                            <div class="small-box bg-{{ (App\Finance::balance() > 0 ? 'green' : 'red') }}">
                                <div class="inner">
                                  <h3><span>Saldo: </span>{{ App\Finance::balance() }}</h3>

                                  <p>Saldo</p>
                                </div>
                                <div class="icon">
                                  <i class="ion ion-social-usd"></i>
                                </div>
                          </div>
                        </div>
                    </div> {{-- end box-header --}}


                    <div class="box-header" style="padding-top: 0px;">
                      <div>

                          <div class="col-md-2">
                            <a class="btn btn-app bg-olive" href="{{url('financeiro/create')}}"><i class="fa fa-plus "></i>Novo</a>
                          </div>

                          <app-index-search></app-index-search>
                          
                        </div>
                    </div> {{-- end box-header --}}
                </fieldset>
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
                    @foreach ($finances as $finance)
                    <tr>
                        <td>{{$finance->add_at->format('d/m/Y')}}</td>
                        <td>{{$finance->name}}</td>
                        @if($finance->type === 1)
                        <td>Entrada</td>
                        @else
                        <td>Saida</td>
                        @endif
                        @if($finance->type === 1)
                        <td style="color:green">{{$finance->value}}</td>
                        @else
                        <td style="color:red">{{$finance->value}}</td>
                        @endif
                        <td>
                            <a class="btn bg-olive" href="/financeiro/{{$finance->id}}/edit">
                                    <i class="fa fa-edit"></i> Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer pagination" align="center" style="width:100%">
            {{ $finances->links() }}
        </div>
    </div>
</div>

@endsection
