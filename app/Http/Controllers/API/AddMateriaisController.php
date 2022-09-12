<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\ItensReserva;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class AddMateriaisController extends Controller
{
    public function index($id)
    {
        $data =  Material::with('estoque')->findOrFail($id);

        return response($data, 200);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'reserva_id' => 'required|max:255',
            'material_id' => 'required',
            'quantidade' => 'required',
            'valor' => 'required',
            'total' => 'required',
            'entrega' => 'nullable',
        ]);

        try {

            DB::transaction(function () use ($validated)
            {
                ItensReserva::create($validated);
            });

            $data = ItensReserva::with('material')->where('reserva_id', $validated['reserva_id'])->get();


            return response($data, 200);

        } catch (\Throwable $th) {
            return response('erro ao adicionar' . $th, 500);
        }


    }

    public function getMaterial($id)
    {
        return response(ItensReserva::with('material')->where('reserva_id', $id)->get());
    }

    public function delMaterial($id)
    {
        try {

            DB::transaction(function () use ($id)
            {
                ItensReserva::findOrFail($id)->delete();
            });

            return redirect()->back();

        } catch (\Throwable $th) {
            return response('erro ao adicionar' . $th, 500);
        }
    }
}
