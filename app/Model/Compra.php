<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
        protected $fillable = [
        'id',
        'cod_rastreio',
        'data_compra',
        'descricao',
        'vlr_compra',
    	'vlr_frete',
        'vlr_tributacao',
        'cotacao_dollar',
        'qtd_itens',
        'iof',
    ];

    public function produtos(){
        return $this->belongsToMany(Produto::class , 'compra_produto', 'compra_id', 'produto_id')
                        ->withPivot('qtd');
    }
}
