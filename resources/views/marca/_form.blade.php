<div class="form-group col-xs-9">
  {!! Form::label('nome','Nome') !!}
  {!! Form::text('nome',isset($marca->nome)? $marca->nome : null , ['class'=>'form-control text-uppercase',  'placeholder'=>"Marca"]) !!}
</div>