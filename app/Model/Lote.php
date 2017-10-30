<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
       protected $fillable = [
        'id',
        'cod_rastreio',
        'descricao',
        'data_compra',
        'vlr_total',
        'vlr_frete',
        'vlr_tributacao',
        'vlr_dollar',
        'qtd_itens', 
        'iof'

    ];
}
