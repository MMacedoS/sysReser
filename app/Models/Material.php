<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'materiais';

    protected $fillable = [
        'nome','valor','descricao','status','tipo','caracteristicas','qtdo','unidade'
    ];

    public static function getUnits()
    {
        return ['m' => 'Metro', 'un' => 'Unidade', 'pç' => 'Peça', 'cx' => 'Caixa'];
    }


    public function estoque()
    {
        return $this->hasOne(Estoque::class);
    }

    public function itens()
    {
        return $this->hasMany(ItensReserva::class);
    }


}
