<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
     'nome',
     'contato',
     'cpf',
     'email',
     'observacao',
     ];
}
