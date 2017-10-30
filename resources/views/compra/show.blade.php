@extends('layouts.admin')

@section('content')
 <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detalhes Da Venda
      </h1>

    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-cart-arrow-down"></i> LOTE : {!! $c->cod_rastreio OR null!!}
            <small class="pull-right">Data: {{Carbon\Carbon::now()->format('d/m/Y')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Data Compra:</b> {!! Carbon\Carbon::parse($c->data_compra)->format('d/m/Y') !!}<br>
          <b>Descrição da compra:</b> {!! $c->descricao  !!} <br>
          <b>Quantidade de Itens:</b> {!! $c->qtd_itens  !!} <br>
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
            </tr>
            </thead>
            <tbody>
           @foreach($c->produtos as $p)
              <tr>
                <td>{!! $p->codigo !!}</td>
                <td>{!! $p->nome !!}</td>
                <td>{!! $p->pivot->qtd !!}</td>
              </tr>
            @endforeach()

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Gerar PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>

@endsection


 