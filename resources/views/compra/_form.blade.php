<div class="form-group col-xs-3">
	{!! Form::label('cod_rastreio','Código de Rastreio ') !!}
	{!! Form::text('cod_rastreio',isset($compra->cod_rastreio)? $compra->cod_rastreio : null , ['class'=>'form-control', 'required', 'placeholder' => 'CÓDIGO DO RASTREIO' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('descricao','Descricao ') !!}
	{!! Form::text('descricao',isset($compra->descricao)? $compra->descricao : null , ['class'=>'form-control', 'required', 'placeholder' => 'DESCRICAO' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('data_compra','Data da Compra ') !!}
	{!! Form::date('data_compra',isset($compra->data_compra)? $dataCompra : null , ['class'=>'form-control', 'required', 'placeholder' => 'Data da Compra' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('vlr_compra','Valor da Compra R$') !!}
	{!! Form::text('vlr_compra',isset($compra->vlr_compra)? $compra->vlr_compra : null , ['class'=>'form-control', 'required', 'placeholder' => 'Valor da Compra' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('vlr_frete','Frete + Taxas R$') !!}
	{!! Form::text('vlr_frete',isset($compra->vlr_frete)? $compra->vlr_frete : null , ['class'=>'form-control', 'required', 'placeholder' => 'Valor do Frete' ]) !!}
	
</div>

<div class="form-group col-xs-3">
	{!! Form::label('vlr_tributacao','Tributacao R$') !!}
	{!! Form::text('vlr_tributacao',isset($compra->vlr_tributacao)? $compra->vlr_tributacao : null , ['class'=>'form-control', 'required', 'placeholder' => 'Valor da Tributacao' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('cotacao_dollar','Cotacao do Dolar R$') !!}
	{!! Form::text('cotacao_dollar',isset($compra->cotacao_dollar)? $compra->cotacao_dollar : null , ['class'=>'form-control', 'required', 'placeholder' => 'Cotacao do Dolar' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('qtd_itens','Qtd Itens') !!}
	{!! Form::text('qtd_itens',isset($compra->qtd_itens)? $compra->qtd_itens : null , ['class'=>'form-control', 'required', 'placeholder' => 'Quantidade de Itens' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('iof','IOF em %') !!}
	{!! Form::text('iof',isset($compra->iof)? $compra->iof : null , ['class'=>'form-control', 'required', 'placeholder' => 'IOF em %' ]) !!}
</div>
