@extends('layouts.pdv')

@section('content')
	{!! Form::open(['url'=>[route('venda.store')], 'method'=>'post']) !!}
		<table class="table table-bordered table-striped" id="search-table">
			<tr>
				<td>
					<div class="input-group">
						<div class="input-group-btn">
							<a  class="btn btn-info" data-toggle="modal" data-target=".modal_form" role="button"><i class="fa fa-search"></i></a>
						</div>
						{!! Form::text('codProduto', null , ['class'=>'form-control', 'placeholder' => 'Codigo' ]) !!}
					</div>	
				</td>
				<td>
					{!! Form::text('produto', null , ['class'=>'form-control', 'placeholder' => 'Produto' ]) !!}
				</td>
				<td>
					{!! Form::text('vlr_venda', null , ['class'=>'form-control', 'placeholder' => 'Valor' ]) !!}
				</td>
				<td>
					{!! Form::text('qtd', null , ['class'=>'form-control', 'placeholder' => 'Quantidade' ]) !!}
				</td>
				<td>
					{!! Form::text('subtotal', null , ['class'=>'form-control', 'placeholder' => 'Subtotal' ]) !!}
				</td>
		 		<td>	 			
		 			<button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button>
		 		</td>
			</tr>
		</table>
	{!! Form::close() !!}


<!--MODAL FORM --> 
<div class="modal fade modal_form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">

    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <!-- form start -->
        <div class="box-body">
          <div class="row">
			{!! Form::open(['url'=>[route('venda.search', 'codOrName')], 'method'=>'get']) !!}
			
			<div class="form-group col-xs-9 col-md-9">
				{!! Form::text('codOrName', null , ['class'=>'form-control', 'placeholder' => 'Codigo ou Nome do Produto' ]) !!}
			</div>

			<div class="form-group col-xs-3 col-md-3">
				{!! Form::submit('Pesquisar', ['class'=>'btn btn-success']) !!}
                {!! Form::button('Close', ['class'=>'btn btn-defaut', 'data-dismiss'=>'modal']) !!}
            </div>
			@if($produtos != null)
				<div class="form-group col-xs-12 col-md-12">
				 	<table class="table table-bordered table-striped" id="marcas-table">
				 		<thead>
				 			<tr>
				 				<th><a>CODIGO</a></th>
				 				<th><a>PRODUTO</a></th>
				 				<th><a>AÇÕES</a></th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			@foreach($produtos as $p)
				 			<tr>
				 				<td>{!! $p->codigo !!}</td>
				 				<td>{!! $p->nome !!}</td>
				 				<td><a class="btn btn-xs btn-primary btn_esclher"><i class="fa fa-plus"></i></a></td>
				 			</tr>
					        @endforeach()
					    </tbody>
					</table>
				</div>	
			@endif
			{!! Form::close() !!}

          </div>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</div>
</div>
<!--FIM MODAL FORM-->

@endsection

@push('scripts')
<script>

	$(document).ready(function() {
    	$('.modal_form').modal('show');
    });

</script>

@endpush

