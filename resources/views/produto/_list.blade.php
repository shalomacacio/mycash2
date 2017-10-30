<div class="box">
  <div class="box-header">
    <h3 class="box-title">Produtos</h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="marcas-table">
        <thead>
         <tr>
          <th><a>CÓD</a></th>
          <th><a>NOME</a></th>
          <th><a>MARCA</a></th>
          <th><a>CATEGORIA</a></th>
          <th><a>ESTOQUE</a></th>
 


          <th><a>AÇÃO</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
          <tr>
            <td>{!! $l->codigo_interno !!}</td>
            <td>{!! $l->nome !!}</td>
            <td>{!! $l->marca->nome!!}</td>
            <td>{!! $l->categoria->nome !!}</td>
            <td>{!! $l->estoque->qtd OR null!!}</td>
            <td>
              <a href="{{route('produto.edit', $l->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>
              <a href="{{route('produto.estoque', $l->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-undo"></i> Atualizar Estoque</a>
            </td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

