@extends('layouts.admin')

@section('content')
	@include('errors._error')
	@include('errors._alert')
	@include('layouts._widget')
	@include('categoria.create')
	@include('categoria._list')
@endsection

@push('scripts')
<script>
  $(function() {
    $("[data-mask]").inputmask();
  });
</script>
@endpush