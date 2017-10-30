@extends('layouts.pdv')

@section('content')
	{!! Form::open(['url'=>[route('venda.store')], 'method'=>'post']) !!}
		<table class="table table-bordered table-striped" id="search-table">
			<tr>
				<td>
					{!! Form::text('codProduto', null , ['class'=>'form-control', 'placeholder' => 'Codigo' ]) !!}
				</td>
				<td>
					{!! Form::select('produto', $produtos ,null,  ['class'=>'form-control' , 'placeholder' => 'Selecione...'] ) !!}
				</td>
		 		<td>	 			
		 			<button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button>
		 		</td>
			</tr>

		</table>
	{!! Form::close() !!}




@endsection

@push('scripts')
<script>

$(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
      		//alert($("#produto").val());
           i++;  
           $('#search-table').append('<tr id="row'+i+'"><td><input type="text" value ="amor"  name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="fa fa-trash"></button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
</script>

@endpush

