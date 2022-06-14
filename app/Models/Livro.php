<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $table = 'tblivros';
    protected $fillable = [
        'capa',
        'nome',
        'autor',
        'ano',
        'edicao',
        'editora',
        'isbn',
        'categoria',
        'descricao',
        'user_id',
        'status'
    ];
}
