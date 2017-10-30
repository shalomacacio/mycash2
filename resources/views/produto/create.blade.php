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
          <h3 class="box-title">Novo Produto</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="row">
          {!! Form::open(['url'=>[route('produto.store')], 'method'=>'post']) !!}
            @include('produto._form')
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
             {!! Form::label('vlr_unit','Valor Unit R$') !!}
             {!! Form::text('vlr_unit', null , ['class'=>'form-control','required',  'placeholder'=>"Valor em R$"]) !!}
            </div>

            <div class="form-group col-xs-6">
             {!! Form::label('frete','% Frete') !!}
             {!! Form::text('frete', null , ['class'=>'form-control','readOnly',  'placeholder'=>"Frete em %"]) !!}
            </div>


            <div class="form-group col-xs-6">
             {!! Form::label('iof','% IOF') !!}
             {!! Form::text('iof', null , ['class'=>'form-control','readOnly',  'placeholder'=>" IOF em % "]) !!}
            </div>

            <div class="form-group col-xs-6">
             {!! Form::label('tributacao','Tributacao %') !!}
             {!! Form::text('tributacao', null , ['class'=>'form-control','readOnly',  'placeholder'=>" Rateio da Tributacao"]) !!}
            </div>

            <div class="form-group col-xs-6">
                {!! Form::label('calc','Ações ') !!} <br>
                {!! Form::button('Calcular', ['class'=>'btn btn-primary ', 'name'=>'calc']) !!}
                {!! Form::button('Fechar', ['class'=>'btn btn-defaut', 'data-dismiss'=>'modal']) !!}
            </div>



            <div class="form-group col-xs-6">
             {!! Form::label('valorDaVenda','valorDaVenda') !!}
             {!! Form::text('valorDaVenda', null , ['class'=>'form-control', 'data-dismiss'=>'modal',  'placeholder'=>" Resultado"]) !!}
            </div>

          </div>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</div>
</div>


@push('scripts')
<script>

    $('select[name=compra_id]').blur(function () {

         var id = $(this).val(); //recebe o valor do input
         //alert("chamou");

        //implementar o ajax
        $.get('/mycash/produto/search/'+ id , function(result){
          
          $.each(result, function (key, value) {

          //recebe os valores do JSON result
           var valFrete = parseFloat(value.vlr_frete);
           var valCompra = parseFloat(value.vlr_compra);
           var percentIof = parseFloat(value.iof);
           var valTributacao = parseFloat(value.vlr_tributacao);
           var valCotacao = parseFloat(value.cotacao_dollar);
           var valQtdItens = parseFloat(value.qtd_itens);

           //calcular varlor percentual do frete 
           var percentFrete = (valFrete*100)/(valCompra + valFrete); 

           //calcular rateiro de tributacao pela quantidade de itens
           var percentTributacao = (valTributacao*100)/(valCompra + valFrete + valTributacao); 

            $('input[name=iof]').val(percentIof.toFixed(2));
            $('input[name=frete]').val(percentFrete.toFixed(2));
            $('input[name=tributacao]').val(percentTributacao.toFixed(2));
            $('input[name=cotacao]').val(valCotacao.toFixed(2));

            //calcula valUnit+ frete + iof + tributacao
            $('button[name=calc]').click(function(){

             var valUnit = parseFloat($('input[name=vlr_unit]').val());

             var frete =  ((valUnit * percentFrete)/100); 
             var iof = (valUnit * percentIof)/100;
             var tributacao = (valUnit * percentTributacao)/100;


             var vlrVendaFinal = (valUnit + frete + iof + tributacao);


              //var vlrDaVenda = (valUnit  * resultFrete/100) ;
              $('input[name=valorDaVenda]').val(vlrVendaFinal.toFixed(2));
              $('input[name=vlr_compra]').val(vlrVendaFinal.toFixed(2));


            }); 
          }); 
        });
    });






</script>

@endpush
