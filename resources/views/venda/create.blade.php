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
    <div class="col-xs-12 col-md-12 col-lg-12">
      <!-- general form elements -->
      <div class="box box-primary">
        {!! Form::open(['url'=>[route('venda.store')], 'method'=>'post']) !!}
        <div class="box-header with-border">
          <h3 class="box-title">Nova Venda</h3>
          <h3 class="box-title pull-right">Vendedor: {!! Auth::user()->name !!}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="row">
          
            @include('venda._form')
            <div class="form-group col-xs-12 col-md-12 col-lg-12">
              <div class="pull-right">
                {!! Form::submit('Finalizar Venda', ['class'=>'btn btn-success']) !!}
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

@push('scripts')
<script>

    $('input[name=codProduto]').blur(function () {

         var codProduto = $(this).val(); //recebe o valor do input

        //implementar o ajax
        $.get('/mycash/venda/pdv/search/'+ codProduto , function(produtos){
           $('select[name=produtos]').empty();
          
          //alert("chamou o ajax");
          $.each(produtos, function (key, value) {
            $('input[name=produto]').val(value.nome);
            $('input[name=produto_id]').val(value.id);
            $('input[name=vlr_venda]').val(value.vlr_venda);
            //limpa os campos qtd e total 
            $('input[name=qtd]').val(null);
            $('input[name=subtotal]').val(null);
          });         
        }); 

        $('input[name=qtd]').blur(function() {

        //var $vlrVenda = $("#vlr_venda").val();
        var qtd = parseInt($('input[name=qtd]').val());
        var vlrVenda = parseFloat ($('input[name=vlr_venda]').val());
        var subtotal = qtd * vlrVenda;       
        parseFloat ($('input[name=subtotal]').val(subtotal));

          //calcula valor com desconto 
          $('input[name=desconto]').blur(function() {
            var desconto = parseInt($('input[name=desconto]').val());
            var valDesconto = (desconto * subtotal)/100;
            var totalPagar = subtotal - valDesconto;
            //alert(totalPagar);
            $('input[name=total]').val(totalPagar);
          });

       });


 
       var itens = [];
       var i = 1;

       $('button[name=add]').click(function(){

         $.get('/mycash/venda/pdv/search/'+ codProduto , function(itens){
            //alert(itens);

            $.each(itens, function (key, value) {
              alert(value.qtd);
            });

         });

       });

      $(document).on('click', '.btn_remove', function(){  
        var button_id = $(this).attr("id");   
        $('#row'+button_id+'').remove();  
      });  

    });

</script>

@endpush
