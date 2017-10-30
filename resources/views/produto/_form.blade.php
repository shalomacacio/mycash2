<div class="form-group col-xs-3">
	{!! Form::label('categoria_id','Categoria') !!}
	<div class="input-group">
                <div class="input-group-btn">
                   <a href="#" class="btn btn-info" role="button"><i class="fa fa-plus"></i></a>
                </div>
	{!! Form::select('categoria_id', $categorias , isset($produto->categoria_id)? $produto->categoria_id : null,  ['class'=>'form-control' ,'required', 'placeholder' => 'Selecione...'] ) !!}
	</div>
</div>

<div class="form-group col-xs-3">
	{!! Form::label('marca_id','Marca') !!}
	<div class="input-group">
                <div class="input-group-btn">
                   <a href="#" class="btn btn-info" role="button"><i class="fa fa-plus"></i></a>
                </div>
	{!! Form::select('marca_id', $marcas, isset($produto->marca_id)? $produto->marca_id : null ,  ['class'=>'form-control' ,'required', 'placeholder' => 'Selecione...'] ) !!}
	</div>
</div>

<div class="form-group col-xs-3">
	{!! Form::label('codigo_interno','Código') !!}

	<div class="input-group">
                <div class="input-group-btn">
                   <a href="#" class="btn btn-info" role="button"><i class="fa fa-barcode"></i></a>
                </div>
	{!! Form::text('codigo_interno',isset($produto->codigo_interno)? $produto->codigo_interno : null , ['class'=>'form-control', 'required', 'placeholder' => 'CÓDIGO DO PRODUTO' ]) !!}
	</div>
</div>

<div class="form-group col-xs-3">
	{!! Form::label('codigo_fornecedor','Código Barras') !!}
	{!! Form::text('codigo_fornecedor',isset($produto->codigo_fornecedor)? $produto->codigo_fornecedor : null , ['class'=>'form-control', 'required', 'placeholder' => 'CÓDIGO BARRAS' ]) !!}
</div>


<div class="form-group col-xs-6">
  {!! Form::label('nome','Nome') !!}
  {!! Form::text('nome',isset($produto->nome)? $produto->nome : null , ['class'=>'form-control text-uppercase','required',  'placeholder'=>"Nome produto"]) !!}
</div>

<div class="form-group col-xs-6">
	{!! Form::label('descricao','Descricao') !!}
	{!! Form::text('descricao',isset($produto->descricao)? $produto->descricao : null , ['class'=>'form-control',  'placeholder' => 'Descrição do Produto']) !!}
</div>

<div class="form-group col-xs-6 ">
	{!! Form::label('contratados[]','Contratados') !!}
	{!! Form::select('contratados[]', $contratados , null,  ['class'=>'form-control' ,'multiple'=> 'multiple', 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-6">
	{!! Form::label('fornecedores[]','Adicionar Fornecedor') !!}
	{!! Form::select('fornecedores[]', $fornecedores , isset($fornecedores->fornecedores)? $fornecedores->fornecedores : null,  ['class'=>'form-control' ,'multiple'=> 'multiple', 'placeholder' => 'Selecione...'] ) !!}
</div>








