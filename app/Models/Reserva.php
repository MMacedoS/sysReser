<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
            'valor'
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

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }

    public function atualizaValor()
    {
        return Reserva::with('itens.material')
        ->where('status', 1)
        ->where('dataRetorno', '<', \Carbon\Carbon::now())
        ->get();
    }

    public function chartsMeses()
    {
        return Reserva::select(DB::raw('Month(dataRetirada) as mes, sum(valor) as valor'))
        ->groupBy('mes')
        ->orderBy('mes', 'asc')
        ->get();
    }

}
