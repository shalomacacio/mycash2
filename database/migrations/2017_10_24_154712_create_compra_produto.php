<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('compra_produto', function (Blueprint $table) {
            
            $table->integer('produto_id')->unsigned();
            $table->integer('compra_id')->unsigned();

            $table->integer('qtd');

            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('compra_id')->references('id')->on('compras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
