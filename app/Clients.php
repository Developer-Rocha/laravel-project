<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table = 'clientes';
    protected $fillable = [
        'nome',
        'endereco',
        'numero'
    ];
}
