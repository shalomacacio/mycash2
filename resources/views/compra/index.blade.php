@extends('layouts.admin')

@section('content')
	@include('errors._error')
	@include('errors._alert')
	@include('layouts._widget')
	@include('compra.create')
	@include('compra._list')
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



