<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReservaController extends Controller
{
    public function index(Request $request)
    {
        $data = Reserva::all();
        return view('reservas.index', compact('data'));
    }
    public function create(Request $request)
    {
        $clientes =  Cliente::all();
        $produtos =  Material::all();
        return view('reservas.create', compact('clientes','produtos'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'endereco' => 'nullable',
            'tipo' => 'required',
            'telefone' => 'nullable',
            'dataRetirada' => 'required',
            'dataRetorno' => 'required',
            'desconto' => 'nullable',
            'valor' => 'nullable',
            'desconto' => 'nullable'
        ]);

        try {
                DB::transaction(function () use ($validated) {
                    Reserva::create($validated);

                });

                return redirect()->route('reserva.index')->withStatus('reserva cadastrada!');

        } catch (Exception $th) {

            return redirect()->route('reserva.index')->withError('erro'. $th->getMessage());

        }
    }
    public function show($id)
    {
        $item = Reserva::findOrFail($id);
        $clientes =  Cliente::all();
        return view('clientes.show', compact('item'));
    }
    public function edit($id)
    {
        $item = Reserva::findOrFail($id);
        $clientes =  Cliente::all();
        return view('reservas.edit', compact('item', 'clientes'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'cliente_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'endereco' => 'nullable',
            'tipo' => 'required',
            'telefone' => 'nullable',
            'dataRetirada' => 'required',
            'dataRetorno' => 'required',
            'desconto' => 'nullable',
            'valor' => 'nullable',
            'desconto' => 'nullable'
        ]);


        try {
            $item = Reserva::findOrFail($id);

            DB::transaction(function () use ($validated, $item) {
                $item->update($validated);
            });

            return redirect()->route('reserva.index')->withStatus('reserva cadastrada!');

        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('reserva.index')->withError('erro'. $th->getMessage());

        }


    }
    public function destroy($id)
    {
        $item = Cliente::findOrFail($id);

        try{
            DB::transaction(function () use($item) {
                $item->delete();
            });
            return redirect()->route('cliente.index')->withStatus('clientes deletado!');
        }catch(Exception $th)
        {
            return redirect()->route('cliente.index')->withError('erro'. $th->getMessage());
        }
    }
}
