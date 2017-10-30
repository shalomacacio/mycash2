<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_rastreio')->unique();
            $table->string('descricao')->nullable();
            $table->dateTime('data_compra');
            $table->decimal('vlr_compra');
            $table->decimal('vlr_frete');
            $table->decimal('vlr_tributacao');
            $table->decimal('cotacao_dollar');
            $table->unsignedInteger('qtd_itens');
            $table->unsignedInteger('iof');   
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
        //
    }
}
