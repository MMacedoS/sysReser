<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Material;

class AddMateriaisController extends Controller
{
    public function index($id)
    {
        $item = Reserva::with('cliente')->findOrFail($id);

        $produtos = Material::all();

        return view('reservas.add', compact('item', 'produtos'));
    }
}
