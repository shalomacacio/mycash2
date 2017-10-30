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
          <h3 class="box-title">Nova Compra</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="row">
          {!! Form::open(['url'=>[route('compra.store')], 'method'=>'post']) !!}
            @include('compra._form')
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



<div class="modal fade modal_form2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2">
  <div class="modal-dialog modal-lg" role="document">
   <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Calcular Valor de Compra</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="row">

            <div class="form-group col-xs-6">
             {!! Form::label('cotacao','Cotacao $') !!}
             {!! Form::text('cotacao', null , ['class'=>'form-control','required',  'placeholder'=>" % Cotacao Dollar"]) !!}
            </div>

            <div class="form-group col-xs-6">
             {!! Form::label('vlr_unit','Valor Unitario') !!}
             {!! Form::text('vlr_unit', null , ['class'=>'form-control','required',  'placeholder'=>"Valor em $"]) !!}
            </div>

            <div class="form-group col-xs-6">
             {!! Form::label('percent_frete','% Frete') !!}
             {!! Form::text('percent_frete', null , ['class'=>'form-control','required',  'placeholder'=>"Frete em %"]) !!}
            </div>

            <div class="form-group col-xs-6">
             {!! Form::label('iof','% IOF') !!}
             {!! Form::text('iof', null , ['class'=>'form-control','required',  'placeholder'=>" IOF em % "]) !!}
            </div>

            <div class="form-group col-xs-6">
             {!! Form::label('tributacao','Tributacao') !!}
             {!! Form::text('tributacao', null , ['class'=>'form-control','required',  'placeholder'=>" Rateio da Tributacao"]) !!}
            </div>

           

            <div class="form-group col-xs-6">
                {!! Form::label('calc','Calc') !!} <br>
                {!! Form::button('Calcular', ['class'=>'btn btn-primary']) !!}
            </div>

            <div class="form-group col-xs-6">
             {!! Form::label('result','Resultado') !!}
             {!! Form::text('valorDaVenda', null , ['class'=>'form-control',  'placeholder'=>" Resultado"]) !!}
            </div>



          </div>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</div>
</div>