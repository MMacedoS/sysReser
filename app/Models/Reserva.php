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

    public static function getDays($reserva)
    {
        $dataRetirada =  \Carbon\Carbon::parse($reserva->dataRetirada);

        $dataRetorno =  \Carbon\Carbon::parse($reserva->dataRetorno);

        return $dias = $dataRetirada->diffInDays($dataRetorno);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function itens()
    {
        return $this->hasMany(ItensReserva::class);
    }
}
