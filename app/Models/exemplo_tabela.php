<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class exemplo_tabela extends Model   
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'cpf',
        'dinheiro'
    ];

    protected $table = 'exemplo_tabela';
    public $incrementing = true;
    public $timestamps = false;
}
