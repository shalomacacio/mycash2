<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Venda extends Model
{
    	protected $fillable = [
    	'created_at',
    	'cod_venda',
    	'desconto',
    	'total',
    	'tipo_pagamento',
        'cliente_id',
    	'user_id',    
    	];

        public function cliente(){
            return $this->belongsTo(Cliente::class);
        }

        public function user(){
            return $this->belongsTo(User::class);
        }

        public function produtos(){
            return $this->belongsToMany(Produto::class, 'produto_venda', 'venda_id', 'produto_id')
                        ->withPivot('qtd', 'subtotal');
        }
    
}
