<div class="box">
  <div class="box-header">
    <h3 class="box-title">Fornecedores</h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="marcas-table">
        <thead>
         <tr>
          <th><a>ID</a></th>
          <th><a>NOME</a></th>
          <th><a>TIPO FORNECEDOR</a></th>
          <th><a>CPF / CNPJ</a></th>
          <th><a>CONTATO</a></th>
          <th><a>OBSERVAÇÃO</a></th>
          <th><a>EDITAR</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
          <tr>
            <td>{!! $l->id !!}</td>
            <td>{!! $l->nome !!}</td>

            @if($l->tipo_fornecedor == 'F')
              <td>PESSOA FISICA</td>
            @else
              <td>PESSOA JURIDICA</td>
            @endif

            <td>{!! $l->cpf_cnpj !!}</td>
            <td>{!! $l->contato !!}</td>
            <td>{!! $l->observacao !!}</td>
            <td><a href="{{route('fornecedor.edit', $l->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a></td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

