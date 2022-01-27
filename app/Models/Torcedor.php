<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torcedor extends Model
{
    use HasFactory;
    protected $table = 'torcedores';
    protected $fillable = [
        'nome',
        'documento',
        'cep',
        'endereco',
        'bairro',
        'cidade',
        'uf',
        'telefone',
        'email',
        'ativo',
    ];

}
