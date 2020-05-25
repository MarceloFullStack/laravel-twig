<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'foto', 'preco',
    ];
}
