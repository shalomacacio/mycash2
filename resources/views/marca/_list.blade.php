<div class="box">
  <div class="box-header">
    <h3 class="box-title">Marcas</h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="marcas-table">
        <thead>
         <tr>
          <th><a>ID</a></th>
          <th><a>MARCA</a></th>
          <th><a>EDITAR</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
          <tr>
            <td>{!! $l->id !!}</td>
            <td>{!! $l->nome !!}</td>
            <td><a href="{{route('marca.edit', $l->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a></td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

