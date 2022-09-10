<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AddMateriaisController extends Controller
{
    public function index($id)
    {
        $item = Reserva::with('cliente')->findOrFail($id);

        $produtos = Material::all();

        return view('reservas.add', compact('item', 'produtos'));
    }
}
