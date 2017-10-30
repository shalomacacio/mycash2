<div class="form-group col-xs-9">
  {!! Form::label('nome','Nome') !!}
  {!! Form::text('nome',isset($categoria->nome)? $categoria->nome : null , ['class'=>'form-control text-uppercase',  'placeholder'=>"Categoria"]) !!}
</div>