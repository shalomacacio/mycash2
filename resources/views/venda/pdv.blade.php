@extends('layouts.pdv')

@section('content')
<br>
<div class="container">

	<div class="row">
		{!! Form::open(['url'=>[route('venda.addItem', 'codigo')], 'id'=>'formAddItem', 'method'=>'POST']) !!}
			
			<div class="form-group col-xs-12 col-md-12">
				{!! Form::label('cod_venda','Venda Nº') !!}
				{!! Form::text('cod_venda', isset($itensVenda->cod_venda)? $itensVenda->cod_venda : Carbon\Carbon::now()->format('Ymdgis') , ['class'=>'form-control', 'readOnly' ]) !!}
			</div>		

			<div class="form-group col-xs-12 col-md-2">
				{!! Form::label('cod','Codigo') !!}
				<div class="input-group">
					<div class="input-group-btn">
						<a  class="btn btn-info" data-toggle="modal" data-target=".modal_form" role="button"><i class="fa fa-search"></i></a>
					</div>
					{!! Form::text('cod', null , ['class'=>'form-control', 'readOnly', 'placeholder' => 'Codigo' ]) !!}
				</div>
			</div>
			<div class="form-group col-xs-12 col-md-4">
				{!! Form::label('pro','Produto') !!}
				{!! Form::text('pro', null , ['class'=>'form-control', 'readOnly', 'placeholder' => 'Produto' ]) !!}
			</div>
			<div class="form-group col-xs-12 col-md-2">
				{!! Form::label('ven','Val Unit') !!}
				{!! Form::text('ven', null , ['class'=>'form-control','readOnly', 'placeholder' => 'Valor' ]) !!}
			</div>
			<div class="form-group col-xs-12 col-md-1">
				{!! Form::label('qua','QTD') !!}
				{!! Form::text('qua', null , ['class'=>'form-control', 'placeholder' => 'QTD' ]) !!}
			</div>
			<div class="form-group col-xs-12 col-md-2">
				{!! Form::label('sub','Subtotal') !!}
				{!! Form::text('sub', null , ['class'=>'form-control','readOnly', 'placeholder' => 'Subtotal' ]) !!}
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-1">
				<br>
                {!! Form::submit('+', ['class'=>'btn btn-sm btn-block btn-success btn_add']) !!}
            </div>

		{!! Form::close() !!}
	</div>

	<div class="row">
		{!! Form::open(['url'=>[route('venda.store')], 'method'=>'post']) !!}
		@isset($itensVenda)
		{!! Form::hidden('itens', $itensVenda ) !!}
		<table class="table table-bordered table-striped" id="produtos">
			<thead>
				<tr>
					<th><a>CODIGO</a></th>
					<th><a>PRODUTO</a></th>
					<th><a>VALOR</a></th>
					<th><a>QTD</a></th>
					<th><a>SUBTOTAL</a></th>
					<th><a>AÇÕES</a></th>
				</tr>
			</thead>
			
			<tbody>
				
				@foreach($itensVenda as $iten)
		          <tr>
		            <td>{!! $iten->cod_produto !!} </td>
		            <td></td>
		            <td>{!! $iten->vlr_venda !!}</td>
		            <td>{!! $iten->qtd !!} </td>
		            <td>{!! $iten->subtotal !!}</td>
		            <td><a href="{{route('venda.removeItem', $iten->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Remove</a></td>

		          </tr>
		          @endforeach
		       
			</tbody>
		</table>
		@endisset
		<div class="form-group col-xs-12">
			<div class="pull-right">
				{!! Form::submit('Finalizar Venda', ['class'=>'btn btn-success']) !!}
			</div>
		</div>


		{!! Form::close() !!}
	</div>

</div>


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
			{!! Form::open(['url'=>[route('venda.search', 'codOrName')], 'id'=>'searchForm','method'=>'get']) !!}
			
			<div class="form-group col-xs-9 col-md-9">
				{!! Form::text('codOrName', null , ['class'=>'form-control','required',  'placeholder' => 'Codigo ou Nome do Produto' ]) !!}
			</div>

			<div class="form-group col-xs-3 col-md-3">
				{!! Form::button('Pesquisar', ['class'=>'btn btn-success', 'id'=>'btn_pesquisar']) !!}
                {!! Form::button('Close', ['class'=>'btn btn-defaut', 'data-dismiss'=>'modal']) !!}
            </div>
			
				<div class="form-group col-xs-12 col-md-12">
				 	<table class="table table-bordered table-striped" id="produtos-table">
				 		<thead>
				 			<tr>
				 				<th><a>CODIGO</a></th>
				 				<th><a>PRODUTO</a></th>
				 				<th><a>VALOR</a></th>
				 				<th><a>DESCRICAO</a></th>
				 				<th><a>AÇÕES</a></th>
				 			</tr>
				 		</thead>

					</table>
				</div>	
		
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
		//realiza pesquisa de produtos via ajax
    	$('#btn_pesquisar').click(function(){   
    		var codOuNome =  $('input[name=codOrName]').val(); 

    		$.get('/mycash/venda/pdv/search/'+ codOuNome , function(encontrados){

    			//foreach no JSON => encontrados
    			$.each(encontrados, function (key, value) {
    				//alert(value.codigo);
    				
    				//monta tabela com produtos encontrados por nome, id ou descricao.
    				$('#produtos-table').append('<tr id="row'+ value.id +'">'+
    					'<td id="id'+ value.id +'">'+ value.id +'</td>'+
    					'<td id="cod'+ value.id +'">'+ value.codigo +'</td>'+
    					'<td id="nom'+ value.id +'">'+ value.nome +'</td>'+
    					'<td id="ven'+ value.id +'">'+ value.vlr_venda +'</td>'+
    					'<td id="des'+ value.id +'">'+ value.descricao +'</td>'+
    					'<td><button type="button"  id="'+value.id+'" class="btn btn-success btn_escolher"><i class="fa fa-plus"></button></td></tr>');
    			});

    			//adiciona o produto selecionado para incluir quantidade e valor 
    			$('.btn_escolher').click(function(){  

    				//verifica o ID do botão clickado 
					var currentId = $(this).attr('id'); 
					//alert(this.id);
					//alert(currentId);

			      	var codigo = document.getElementById("cod"+currentId);
			      	var produto = document.getElementById("nom"+currentId);
			      	var valor = document.getElementById("ven"+currentId);
			  
			      	$('input[name=cod]').val(codigo.firstChild.nodeValue);
			      	$('input[name=pro]').val(produto.firstChild.nodeValue);
			      	$('input[name=ven]').val(valor.firstChild.nodeValue);

			      	//fecha modal 
			      	$('.modal_form').modal('hide');

			      	//limpa a tabela apos a escolha do produto
			      	$('.modal_form').on('hidden.bs.modal', function (e) {
			  			$('input[name=codOrName]').val('');
			  			$('#produtos-table').empty();
					})
				});
    		}); 
      	});  

      //escolhe o objeto pesquisado e preenche o form addItem
      $('input[name=qua]').blur(function() {

        //var $vlrVenda = $("#vlr_venda").val();
        var qtd = parseInt($('input[name=qua]').val());
        var vlrVenda = parseFloat ($('input[name=ven]').val());
        var subtotal = qtd * vlrVenda;       
        parseFloat ($('input[name=sub]').val(subtotal));

          //calcula valor com desconto 
          $('input[name=desconto]').blur(function() {
            var desconto = parseInt($('input[name=desconto]').val());
            var valDesconto = (desconto * subtotal)/100;
            var totalPagar = subtotal - valDesconto;
            //alert(totalPagar);
            $('input[name=total]').val(totalPagar);
          });

       });


      //adiciona produto com subtotal calculado ao form store
   /*   $('.btn_add').click(function(){
      	var currentId = $(this).attr('id');
      	alert(currentId);
      	
      	//$('input[name=codigo]').val(totalPagar); 
      	//
      	var cod = $('input[name=cod]').val();
      	var pro = $('input[name=pro]').val(); 
      	var ven = $('input[name=ven]').val(); 
      	var qua = $('input[name=qua]').val(); 
      	var sub = $('input[name=sub]').val();

      	var itens = { 
		    'codigo': cod,
		    'produto': pro,
		    'valor':ven,
		    'qtd': qua,
		    'subtotal': sub
		};

      		$(itens).each(function(index, element) { 
      			//alert(element[1]);
      			
        		$('#produtos').append(
        			'<tr id="row'+ index +'">'  +
        			'<td>'+ element['codigo']   +'</td>'+
        			'<td>'+ element['produto']  +'</td>'+
        			'<td>'+ element['valor']    +'</td>'+
        			'<td>'+ element['qtd']      +'</td>'+
        			'<td>'+ element['subtotal'] + 
        			'<td><button type="button" name="remove" id="'+index+'" class="btn btn-danger btn_remove"><i class="fa fa-trash"></button></td>'+
        			'</td>')

      		});

      		document.getElementById("formAddItem").reset();

    	});*/



/*      $(document).on('click', '.btn_remove', function(){
      	var button_id = $(this).attr("id");
      	$('#row'+button_id+'').remove();  
      });  */


</script>

@endpush
