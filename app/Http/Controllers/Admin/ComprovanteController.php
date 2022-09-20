<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;

class ComprovanteController extends Controller
{
    public function index($id)
    {
        $data = Reserva::with('cliente', 'itens.material')->findOrFail($id);
        return view('reservas.comprovante', compact('data'));
    }
}
