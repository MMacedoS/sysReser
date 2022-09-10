<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'estoque';

    protected $fillable = ['material_id','saldo_anterior', 'saldo_atual'];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
