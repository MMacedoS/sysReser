<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $data = Cliente::all();
        return view('clientes.index', compact('data'));
    }
    public function create(Request $request)
    {

        return view('clientes.create');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nome' => 'required|max:255',
            'nif' => 'required',
            'status' => 'required',
            'endereco' => 'required',
            'tipo' => 'required',
            'telefone' => 'nullable',
            'celular' => 'required',
            'email' => 'nullable',
            'profissao' => 'nullable',
        ]);

        try {
                DB::transaction(function () use ($validated) {
                    Cliente::create($validated);

                });

                return redirect()->route('cliente.index')->withStatus('clientes cadastrado!');
        //code...
        } catch (Exception $th) {
            return redirect()->route('cliente.index')->withError('erro'. $th->getMessage());
        }
    }
    public function show($id)
    {
        $item = Cliente::findOrFail($id);
        return view('clientes.show', compact('item'));
    }
    public function edit($id)
    {
        $item = Cliente::findOrFail($id);
        return view('clientes.edit', compact('item'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'nif' => 'required',
            'status' => 'required',
            'endereco' => 'required',
            'tipo' => 'required',
            'telefone' => 'nullable',
            'celular' => 'required',
            'email' => 'nullable',
            'profissao' => 'nullable',
        ]);
        try {
            $item = Cliente::findOrFail($id);

            DB::transaction(function () use ($validated, $item) {
                $item->update($validated);
            });

            return redirect()->route('cliente.index')->withStatus('clientes Atualizado!');
        //code...
        } catch (\Throwable $th) {
            return redirect()->route('cliente.index')->withError('erro'. $th->getMessage());
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
