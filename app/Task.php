<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'produtos';
    protected $fillable = [
        'produto',
        'descricao'
    ];
}
