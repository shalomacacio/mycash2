<div class="row">
  <!--BOTÃO NOVO -->
  <div class="col-md-3 col-sm-6 col-xs-12 pull-left ">
    <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target=".modal_form"><i class="fa fa-plus"></i> Novo</button>
  </br>
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
        <div class="box-header with-border">
          <h3 class="box-title">Novo Fornecedor</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="row">
          {!! Form::open(['url'=>[route('fornecedor.store')], 'method'=>'post']) !!}
            @include('fornecedor._form')
            <div class="form-group col-xs-12">
              <div class="pull-right">
                {!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
                {!! Form::button('Close', ['class'=>'btn btn-defaut', 'data-dismiss'=>'modal']) !!}
              </div>
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