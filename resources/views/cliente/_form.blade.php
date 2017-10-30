<div class="form-group col-xs-6">
  {!! Form::label('nome','Nome') !!}
  {!! Form::text('nome',isset($cliente->nome)? $cliente->nome : null , ['class'=>'form-control text-uppercase',  'placeholder'=>"Nome Cliente"]) !!}
</div>

<div class="form-group col-xs-6">
  {!! Form::label('contato','Contato') !!}
  {!! Form::text('contato',isset($cliente->contato)? $cliente->contato : null , ['class'=>'form-control text-uppercase',  'placeholder'=>"Contato Cliente"]) !!}
</div>

<div class="form-group col-xs-6">
	{!! Form::label('cpf','CPF') !!}
	{!! Form::text('cpf',isset($cliente->cpf)? $cliente->cpf : null , ['class'=>'form-control text-uppercase',  'placeholder'=>"CPF"]) !!}
</div>

<div class="form-group col-xs-6">
	{!! Form::label('email','E-mail') !!}
		{!! Form::text('email',isset($cliente->email)? $cliente->email : null , ['class'=>'form-control text-uppercase',  'placeholder'=>"Ex.: cliente@gmail.com"]) !!}
</div>

<div class="form-group col-xs-12">
	{!! Form::label('observacao','Observacao') !!}
	{!! Form::textarea('observacao',isset($cliente->observacao)? $cliente->observacao : null , ['class'=>'form-control']) !!}
</div>


