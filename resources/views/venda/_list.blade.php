<div class="box">
  <div class="box-header">
    <h3 class="box-title">Lista de Vendas</h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="marcas-table">
        <thead>
         <tr>
         <th><a>DATA</a></th>
          <th><a>CÓDIGO</a></th>
          <th><a>CLIENTE</a></th>
          <th><a>TIPO PAGAMENTO</a></th>
          <th><a>TOTAL</a></th>
          <th><a>VENDEDOR</a></th>
          <th><a>AÇÃO</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
          <tr>
            <td>{!! $l->created_at !!}</td>
            <td>{!! $l->cod_venda !!}</td>
            <td>{!! $l->cliente_id!!}</td>
            <td>{!! $l->tipo_pagamento !!}</td>
            <td>{!! $l->total !!}</td>
            <td>{!! $l->user->name !!}</td>

            <td><a href="{{route('venda.show', $l->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-eye"></i> Detalhes</a></td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

