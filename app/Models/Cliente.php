<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table =  'clientes';

    protected $fillable = [
        'nome','nif','status','celular','endereco','tipo','telefone','email','profissao'];


    public function reserva()
    {
        return $this->hasOne(Reserva::class);
    }
}
