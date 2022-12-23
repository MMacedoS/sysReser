<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function populaCharts()
    {
        $dados = TransformMeses(Reserva::chartsMeses());

        return response(json_encode($dados), 200,[]);
    }
}
