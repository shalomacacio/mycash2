<div class="form-group col-xs-3">
	{!! Form::label('categoria_id','Categoria') !!}
	{!! Form::select('categoria_id', $categorias , isset($produto->categoria_id)? $produto->categoria_id : null,  ['class'=>'form-control' ,'required', 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('marca_id','Marca') !!}
	{!! Form::select('marca_id', $marcas, isset($produto->marca_id)? $produto->marca_id : null ,  ['class'=>'form-control' ,'required', 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('compra_id','Código Compra') !!}
	{!! Form::select('compra_id',$compras, isset($produto->compra_id)? $produto->compra_id : null , ['class'=>'form-control', 'required', 'placeholder' => 'Selecione' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('codigo_fornecedor','Código Barras') !!}
	{!! Form::text('codigo_fornecedor',isset($produto->codigo_fornecedor)? $produto->codigo_fornecedor : null , ['class'=>'form-control', 'required', 'placeholder' => 'CÓDIGO BARRAS' ]) !!}
</div>

<div class="form-group col-xs-4">
	{!! Form::label('codigo','Código') !!}

	<div class="input-group">
                <div class="input-group-btn">
                   <a href="http://zxing.appspot.com/scan?ret=http://beibys.com.br/mycash/produto " class="btn btn-info" role="button"><i class="fa fa-barcode"></i></a>
                </div>
	{!! Form::text('codigo',isset($produto->codigo)? $produto->codigo : null , ['class'=>'form-control', 'required', 'placeholder' => 'CÓDIGO DO PRODUTO' ]) !!}
	</div>
</div>
<div class="form-group col-xs-4">
  {!! Form::label('nome','Nome') !!}
  {!! Form::text('nome',isset($produto->nome)? $produto->nome : null , ['class'=>'form-control text-uppercase','required',  'placeholder'=>"Nome produto"]) !!}
</div>

<div class="form-group col-xs-4">
	{!! Form::label('descricao','Descricao') !!}
	{!! Form::text('descricao',isset($produto->descricao)? $produto->descricao : null , ['class'=>'form-control',  'placeholder' => 'Descrição do Produto']) !!}
</div>

<div class="form-group col-xs-4">
	{!! Form::label('vlr_compra','Valor Compra R$') !!}

	<div class="input-group">
                <div class="input-group-btn">
                   <a href="#" data-toggle="modal" data-target=".modal_form2" class="btn btn-info" role="button"><i class="fa fa-calculator"></i></a>
                </div>
	{!! Form::text('vlr_compra',isset($produto->vlr_compra)? $produto->vlr_compra : null , ['class'=>'form-control','required', 'placeholder' => 'VALOR DA COMPRA' ]) !!}
	</div>
</div>


<div class="form-group col-xs-2">
	{!! Form::label('lucro',' Lucro %') !!}
	{!! Form::text('lucro',isset($produto->lucro)? $produto->lucro : null , ['class'=>'form-control', 'placeholder' => '% DE LUCRO' ]) !!}
</div>

<div class="form-group col-xs-2 ">
	{!! Form::label('vlr_venda','Valor Venda R$') !!}
	{!! Form::text('vlr_venda',isset($produto->vlr_venda)? $produto->vlr_venda : null , ['class'=>'form-control', 'required', 'placeholder' => 'Valor da Venda' ]) !!}
</div>

<div class="form-group col-xs-2 ">
	{!! Form::label('quantidade','Qtd') !!}
	{!! Form::text('quantidade',isset($produto->quantidade)? $produto->quantidade: null , ['class'=>'form-control', 'required', 'placeholder' => 'Valor da Venda' ]) !!}
</div>


<div class="form-group col-xs-6 ">
	{!! Form::label('contratados[]','Contratados') !!}
	{!! Form::select('contratados[]', $contratados , null,  ['class'=>'form-control' ,'multiple'=> 'multiple', 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-6">
	{!! Form::label('fornecedores[]','Adicionar Fornecedor') !!}
	{!! Form::select('fornecedores[]', $fornecedores , isset($fornecedores->fornecedores)? $fornecedores->fornecedores : null,  ['class'=>'form-control' ,'multiple'=> 'multiple', 'placeholder' => 'Selecione...'] ) !!}
</div>








