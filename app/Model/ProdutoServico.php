<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProdutoServico extends Model
{

    public function user() {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'tipo',
        'user_id'
    ];
    
}
