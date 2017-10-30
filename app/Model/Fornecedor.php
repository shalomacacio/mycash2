<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
     protected $table = 'fornecedores';

     protected $fillable = [
     'nome',
     'tipo_fornecedor',
     'cpf_cnpj',
     'contato',
     'observacao',
     ];


     public function produtos(){
     	return $this-> belongsToMany(Produto::class, 'fornecedor_produto','fornecedor_id', 'produto_id');
     }

}
