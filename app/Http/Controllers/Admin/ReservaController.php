<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class ReservaController extends Controller
{

    public function __construct()
    {
        $this->atualizaReserva();
    }

    public function index(Request $request)
    {
        $data = Reserva::with('pagamentos', 'itens', 'cliente')->get();
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

        } catch (\Exception $th) {

            return redirect()->route('reserva.index')->withError('erro'. $th->getMessage());

        }
    }
    public function show($id)
    {
        $item = Reserva::with('cliente','itens.material','pagamentos')->findOrFail($id);
        return view('reservas.show', compact('item'));
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
        $item = Reserva::findOrFail($id);

        try{
            DB::transaction(function () use($item) {
                $item->delete();
            });
            return redirect()->route('reserva.index')->withStatus('Reserva deletada!');
        }catch(\Exception $th)
        {
            return redirect()->route('reserva.index')->withError('erro'. $th->getMessage());
        }
    }

    private function atualizaReserva()
    {
        $dados = Reserva::atualizaValor();

        if(isNull($dados)) {
            foreach ($dados as $key => $value) {
                $novoValor = 0;
                $dataValida = brDate(\Carbon\carbon::parse($value->updated_at)) == brDate(\Carbon\carbon::now());

                if(!empty($value->itens) && !$dataValida){
                    foreach ($value->itens as $item) {
                        if(!empty($item->material)) {
                            $material = $item->material;
                            $diasAtraso = getDays($value->dataRetorno);
                            if($material->tipo == "Diaria" && $diasAtraso > 0){

                             $valor = $material->valor * $item->quantidade;

                             $novoValor += $valor * $diasAtraso;

                            }
                            if($material->tipo == "Pacote" && $diasAtraso > 0) {
                                $novoValor += $material->valor * $diasAtraso;
                            }

                        }
                    }

                    Reserva::findOrfail($value->id)->increment('valor', $novoValor);
                }
            }
        }
    }
}
