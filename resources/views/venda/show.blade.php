@extends('layouts.admin')

@section('content')
 <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detalhes 
      </h1>

    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Beibys, Importados.
            <small class="pull-right">Data: {{Carbon\Carbon::now()->format('d/m/Y')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Vendedor
          <address>
            <strong>{{$v->user->name}}</strong><br>
            Email: {{$v->user->email}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Cliente
          <address>
            <strong>{{$v->cliente->nome}}</strong><br>
            Contato: {{$v->cliente->contato}}<br>
            Email: {{$v->cliente->email}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Venda</b><br>
          <br>
          <b>Cod Venda:</b> {{$v->cod_venda}}<br>
          <b>Data Compra:</b> {{Carbon\Carbon::parse($v->created_at)->format('d/m/Y g:i:s')}}<br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Cod Produto</th>
              <th>Produto</th>
              <th>Qtd</th>
              <th>Vlr Unit</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
           @foreach($v->produtos as $p)
              <tr>
                <td>{!! $p->codigo !!}</td>
                <td>{!! $p->nome !!}</td>
                <td>{!! $p->pivot->qtd !!}</td>
                <td>{!! $p->vlr_venda !!}</td>
                <td>R$ {!! $p->pivot->subtotal !!}</td>
              </tr>
            @endforeach()

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Forma de Pagamento:</p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Forma de pagamento: {!! $v->tipo_pagamento !!} </br>
          Parcelas: 2X </br>
          Taxa do Cartão: 2,3 % </p> 
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Montante:</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>R$ {!! $v->subtotal !!}</td>
              </tr>
              <tr>
                <th>Desconto</th>
                <td>{!! $v->desconto !!} %</td>
              </tr>
              <tr>
                <th>Total Geral:</th>
                <td>{!! $v->total !!}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Gerar PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>

@endsection


 