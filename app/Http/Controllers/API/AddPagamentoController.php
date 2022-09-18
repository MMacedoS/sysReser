<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Pagamento;
use Illuminate\Support\Facades\DB;

class AddPagamentoController extends Controller
{
    public function index($id)
    {

        $data =  Pagamento::with('reserva.cliente')->where('reserva_id', $id)->get();

        if(!empty($data))
            return response($data, 200);

        return response([],200);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'reserva_id' => 'required|max:255',
            'tipo' => 'required',
            'valor' => 'required',
        ]);

        try {

            DB::transaction(function () use ($validated)
            {
                $reserva = Reserva::findOrFail($validated['reserva_id']);
                $reserva->saldo += $validated['valor'];
                $reserva->save();
                Pagamento::create($validated);

            });

            $data = Pagamento::where('reserva_id', $validated['reserva_id'])->get();


            return response($data, 200);

        } catch (\Throwable $th) {
            return response('erro ao adicionar' . $th, 500);
        }


    }

    public function delPagamento($id)
    {

        try {

            DB::transaction(function () use ($id)
            {
                $item = Pagamento::findOrFail($id);
                $reserva = Reserva::findOrFail($item->reserva_id);
                $reserva->saldo -= $item->valor;
                $reserva->save();
                $item->delete();
            });

            return redirect()->back();

        } catch (\Throwable $th) {
            return response('erro ao adicionar' . $th, 500);
        }
    }
}
