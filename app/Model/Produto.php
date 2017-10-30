<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'id',
        'codigo_interno',
        'codigo_fornecedor',
    	'nome',
        'descricao',
        'inativo',
        'categoria_id',
        'compra_id',
        'marca_id',
    ];


    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function marca(){
    	return $this->belongsTo(Marca::class);
    }

    public function estoque(){
        return $this->hasOne(Estoque::class, 'produto_id', 'id');
    }

    public function fornecedores(){
    	return $this->belongsToMany(Fornecedor::class, 'fornecedor_produto', 'produto_id', 'fornecedor_id');
    }

    public function vendas(){
        return $this->belongsToMany(Venda::class, 'produto_venda', 'produto_id', 'venda_id')
                ->withPivot('qtd', 'subtotal');
    }


}
