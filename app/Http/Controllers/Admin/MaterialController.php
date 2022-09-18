<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Material;
use App\Models\Estoque;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        $data = Material::all();
        return view('material.index', compact('data'));
    }
    public function create(Request $request)
    {
        return view('material.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'valor' => 'required',
            'status' => 'required',
            'descricao' => 'required',
            'tipo' => 'required',
            'caracteristicas' => 'required',
            'unidade' => 'required',
            'qtdo' => 'required'
        ]);

        try {

                DB::transaction(function () use ($validated) {
                    Material::create($validated);
                });

                return redirect()->route('material.index')->withStatus('Material cadastrado!');
        //code...
        } catch (\Throwable $th) {
            return redirect()->route('material.index')->withError('erro'. $th->getMessage());
        }
    }
    public function show($id)
    {
        $item = Material::findOrFail($id);
        return view('material.show', compact('item'));
    }
    public function edit($id)
    {
        $item = Material::findOrFail($id);
        return view('material.edit', compact('item'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'valor' => 'required',
            'status' => 'required',
            'descricao' => 'required',
            'tipo' => 'required',
            'caracteristicas' => 'required',
            'unidade' => 'required',
            'qtdo' => 'required'
        ]);
        try {
            $item = Material::findOrFail($id);

            DB::transaction(function () use ($validated, $item) {
                $item->update($validated);
            });

            return redirect()->route('material.index')->withStatus('Material Atualizado!');
        //code...
        } catch (\Throwable $th) {
            return redirect()->route('material.index')->withError('erro'. $th->getMessage());
        }


    }
    public function destroy($id)
    {
        $item = Material::findOrFail($id);

        try{
            DB::transaction(function () use($item) {
                Estoque::where('material_id',$item->id)->delete();
                $item->delete();
            });
            return redirect()->route('material.index')->withStatus('Material deletado!');
        }catch(Exception $th)
        {
            return redirect()->route('material.index')->withError('erro'. $th->getMessage());
        }
    }
}
