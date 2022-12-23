<?php

namespace App\Http\Controllers;

use App\Models\Reserva;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reserva = Reserva::with('cliente')->where('dataRetorno', '<=', \Carbon\carbon::now())->simplePaginate(2);
        return view('dashboard', compact('reserva'));
    }
}
