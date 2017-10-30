<div class="box">
  <div class="box-header">
    <h3 class="box-title">Compras</h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="marcas-table">
        <thead>
         <tr>
          <th><a>DATA COMPRA</a></th>
          <th><a>COD RASTREIO</a></th>
          <th><a>VLR COMPRA</a></th>
          <th><a>TRIBUTACAO</a></th>
          <th><a>COT DOLAR </a></th>
          <th><a>FRETE </a></th>
          <th><a>AÇÕES</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
          <tr>
            <td>{{ Carbon\Carbon::parse( $l->data_compra)->format('d-m-Y') }}</td>
            <td>{!! $l->cod_rastreio !!}</td>
            <td>{!! $l->vlr_compra !!}</td>
            <td>{!! $l->vlr_tributacao !!}</td>
            <td>{!! $l->cotacao_dollar !!}</td>
            <td>{!! $l->vlr_frete !!}</td>
            <td>
              <a href="{{route('compra.edit', $l->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> </a>
              <a href="{{route('compra.show', $l->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> </a>
            </td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

