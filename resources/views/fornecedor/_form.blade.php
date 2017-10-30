<div class="form-group col-xs-6">
  {!! Form::label('nome','Nome') !!}
  {!! Form::text('nome',isset($fornecedor->nome)? $fornecedor->nome : null , ['class'=>'form-control text-uppercase',  'placeholder'=>"Nome Fornecedor"]) !!}
</div>

<div class="form-group col-xs-6">
	{!! Form::label('tipo_fornecedor','Tipo Fornecedor') !!}
	{!! Form::select('tipo_fornecedor', ['F'=>'Pessoa Fisica ', 'J'=>'Pessora Juridica'], isset($fornecedor->tipo_fornecedor)? $fornecedor->tipo_fornecedor : null, ['class'=>'form-control' , 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-6">
	{!! Form::label('cpf_cnpj','CPF / CNPJ') !!}
	{!! Form::text('cpf_cnpj',isset($fornecedor->cpf_cnpj)? $fornecedor->cpf_cnpj : null , ['class'=>'form-control text-uppercase',  'placeholder'=>"CPF OU CNPJ"]) !!}
</div>

<div class="form-group col-xs-6">
	{!! Form::label('contato','Contato') !!}
		{!! Form::text('contato',isset($fornecedor->contato)? $fornecedor->contato : null , ['class'=>'form-control text-uppercase',  'placeholder'=>"CONTATO"]) !!}
</div>

<div class="form-group col-xs-12">
	{!! Form::label('observacao','Observacao') !!}
	{!! Form::textarea('observacao',isset($fornecedor->observacao)? $fornecedor->observacao : null , ['class'=>'form-control']) !!}
</div>


