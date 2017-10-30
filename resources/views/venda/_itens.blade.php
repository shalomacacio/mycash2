    <table class="table table-bordered table-striped" id="search-table">
      <tr>
        <td>
          {!! Form::text('codProduto', null , ['class'=>'form-control', 'placeholder' => 'Codigo' ]) !!}
        </td>
        <td>
          {!! Form::text('produto', null , ['class'=>'form-control', 'disabled', 'placeholder' => 'Produto' ]) !!}
        </td>
        <td>
          {!! Form::text('vlr_venda', null , ['class'=>'form-control','disabled', 'placeholder' => 'Valor' ]) !!}
        </td>
        <td>
          {!! Form::text('qtd', null , ['class'=>'form-control', 'placeholder' => 'Quantidade' ]) !!}
        </td>
        <td>
          {!! Form::text('total', null , ['class'=>'form-control', 'disabled', 'placeholder' => 'Total' ]) !!}
        </td>
        <td>        
          <button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button>
        </td>
      </tr>
    </table>

    <table class="table table-bordered table-striped" id="itens-table">
        
        
  
    </table>