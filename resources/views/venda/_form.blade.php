
<div class="form-group col-xs-12 col-md-12">
	{!! Form::label('cliente_id','Cliente') !!}
	{!! Form::select('cliente_id', $clientes , isset($venda->cliente_id)? $venda->cliente_id : null,  ['class'=>'form-control' , 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-12 col-md-3">
	{!! Form::label('codProduto','Código') !!}
	<div class="input-group">
		<div class="input-group-btn">
			<a href="http://zxing.appspot.com/scan?ret=http://www.seu-dominio.com.br/seu-arquivo.php?codigo={CODE}" class="btn btn-info" role="button"><i class="fa fa-barcode"></i></a>
		</div>
		{!! Form::text('codProduto', null , ['class'=>'form-control', 'placeholder' => 'Codigo' ]) !!}
	</div>
</div>

<div class="form-group col-xs-12 col-md-3">
	{!! Form::label('produto','Produto') !!}
	{!! Form::text('produto', null , ['class'=>'form-control', 'disabled', 'placeholder' => 'Produto' ]) !!}
</div>

<div class="form-group col-xs-12 col-md-2">
	{!! Form::label('vlr_venda','Valor Unit') !!}
	{!! Form::text('vlr_venda', null , ['class'=>'form-control','disabled', 'placeholder' => 'Valor' ]) !!}
</div>

<div class="form-group col-xs-12 col-md-2">
	{!! Form::label('qtd','QTD') !!}
{!! Form::text('qtd', null , ['class'=>'form-control', 'placeholder' => 'QTD' ]) !!}	
</div>

<div class="form-group col-xs-12 col-md-2">
{!! Form::label('subtotal','Subtotal') !!}
 {!! Form::text('subtotal', null , ['class'=>'form-control', 'readOnly', 'placeholder' => 'Subtotal' ]) !!}	
</div>

<table class="table table-bordered table-striped" id="search-table">
</table>

<div class="form-group col-xs-12 col-md-4">
	{!! Form::label('tipo_pagamento','Forma de Pagamento') !!}
	{!! Form::select('tipo_pagamento', ['A VISTA'=>'avista', 'Cartao'=>'cartao', 'Promissoria' =>'promissoria'] , isset($venda->tipo_pagamento)? $venda->tipo_pagamento : null,  ['class'=>'form-control' , 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-12 col-md-4">
	{!! Form::label('desconto','Desconto') !!}
	{!! Form::text('desconto', isset($venda->desconto)? $venda->desconto : 0, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-xs-12 col-md-4">
	{!! Form::label('total','Total Geral ') !!}
	{!! Form::text('total', isset($venda->total)? $venda->total : 0, ['class'=>'form-control']) !!}
</div>

{!! Form::hidden('user_id', Auth::user()->id) !!}
{!! Form::hidden('cod_venda', Carbon\Carbon::now()->format('Ymdgis')) !!}
{!! Form::hidden('produto_id', null ) !!}

