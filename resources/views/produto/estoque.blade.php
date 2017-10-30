@extends('layouts.admin')

@section('content')
  @include('errors._error')
  @include('errors._alert')

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Atualizar Estoque </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="row">
        {!! Form::open(['url'=>[route('produto.updateEstoque', $produto->id)], 'method'=>'put']) !!}

          <div class="form-group col-xs-4 ">
            {!! Form::label('codigo_interno','Codigo') !!}
            {!! Form::text('codigo_interno',isset($produto->codigo_interno)? $produto->codigo_interno : null , ['class'=>'form-control', 'disabled' ]) !!}
          </div>

          <div class="form-group col-xs-4 ">
            {!! Form::label('produto_nome','Produto') !!}
            {!! Form::text('produto_nome',isset($produto->nome)? $produto->nome : null , ['class'=>'form-control' , 'disabled' ]) !!}
          </div>

          <div class="form-group col-xs-1 ">
            {!! Form::label('quantidade','Quantidade') !!}
            {!! Form::text('quantidade', null , ['class'=>'form-control','required', 'placeholder' => 'Quantidade' ]) !!}
          </div>


          <div class="form-group col-xs-2 ">
            {!! Form::label('vlr_venda','Valor') !!}
            {!! Form::text('vlr_venda', isset($produto->estoque->vlr_venda)? $produto->estoque->vlr_venda : null , ['class'=>'form-control','required', 'placeholder' => 'Quantidade' ]) !!}
          </div>

         <div class="form-group col-xs-1 ">
            {!! Form::label('estoque','Est Atual') !!}
            {!! Form::text('estoque',isset($produto->estoque->qtd)? $produto->estoque->qtd : null , ['class'=>'form-control','disabled', 'placeholder' => 'Quantidade' ]) !!}
          </div>


          {!! Form::hidden('produto_id', $produto->id ) !!}
          <div class="form-group col-xs-12">
            <div class="pull-right">
              {!! Form::submit('Atualizar', ['class'=>'btn btn-primary']) !!}
              <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
            </div>
          </div>
        {!! Form::close() !!}
        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(function() {
    $("[data-mask]").inputmask();
  });
</script>

<script>
$(document).ready(function() {


   $("#lucro").blur(function() {

    //var $vlrVenda = $("#vlr_venda").val();
    var $lucro = parseFloat($("#lucro").val());
    var $vlrCompra = parseFloat ($("#vlr_compra").val());
    var $vlrVenda = ($vlrCompra * $lucro/100) + $vlrCompra;  
   
    $("#vlr_venda").val($vlrVenda);
   });

  //
});

</script>

@endpush