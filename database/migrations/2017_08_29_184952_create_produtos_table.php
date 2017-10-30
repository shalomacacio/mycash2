<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            //Opcional codigo do fornecedor 
            $table->unsignedBigInteger('codigo_fornecedor')->nullable();
            $table->unsignedBigInteger('codigo')->unique();
            $table->string('nome')->unique();
            $table->text('descricao')->nullable();
            $table->decimal('vlr_compra');
            $table->decimal('vlr_venda');
            $table->tinyInteger('inativo')->default(0)->nullable();
            $table->unsignedInteger('lucro');
            $table->unsignedInteger('desconto_max')->default(0)->nullable();
            $table->unsignedInteger('quantidade')->default(0);
            $table->unsignedInteger('estoque_min')->default(0);

            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('marca_id');
             $table->unsignedInteger('compra_id');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
