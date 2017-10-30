<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $fillable = [
        'id',
        'produto_id',
        'qtd',
        'minimo',
        'vlr_venda',
    ];

    public $timestamps = false; 

}
