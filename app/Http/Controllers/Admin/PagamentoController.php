<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Pagamento;

class PagamentoController extends Controller
{
    public function index($id)
    {
        $item = Reserva::with('cliente')->findOrFail($id);

        $pagamento = Pagamento::all();

        return view('pagamentos.index', compact('item', 'pagamento'));

    }
}
