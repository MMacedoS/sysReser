<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
            'user_id',
            'status',
            'endereco',
            'tipo',
            'telefone',
            'dataRetirada',
            'dataRetorno',
            'desconto',
            'valor',
            'desconto'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
