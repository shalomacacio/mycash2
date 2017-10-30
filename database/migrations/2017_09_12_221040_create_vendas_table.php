<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('cod_venda')->unique();
            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('desconto')->default(0); //em %
            $table->decimal('total');
            $table->tinyInteger('ativo')->default(0)->nullable();
            $table->string('tipo_pagamento');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('vendas');
    }
}
