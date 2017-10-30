<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
    'cod_venda',
    'produto_id',
    'vlr_venda',
    'qtd',
    'desconto',
    'subtotal',
    'total_pedido',
    ];


}
