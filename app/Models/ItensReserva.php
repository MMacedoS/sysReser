<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensReserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'reserva_id',
        'material_id',
        'quantidade',
        'valor',
        'total',
        'entrega'
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

}
