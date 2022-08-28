<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'materiais';

    protected $fillable = [
        'nome','valor','descricao','status','tipo','caracteristicas'
    ];
}
