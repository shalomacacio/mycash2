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
        <h3 class="box-title">Editar Compra </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="row">
        {!! Form::open(['url'=>[route('compra.update', $compra->id)], 'method'=>'put']) !!}
          @include('compra._form')
          <div class="form-group col-xs-12">
            <div class="pull-right">
              {!! Form::submit('Alterar', ['class'=>'btn btn-primary']) !!}
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