<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        return view('material.index', compact('data'));
    }
    public function create(Request $request)
    {
        $data = [];
        return view('material.create', compact('data'));        
    }
    public function show(Request $request)
    {
        
    }
    public function edit(Request $request)
    {
        
    }
    public function update(Request $request)
    {
        
    }
    public function destroy(Request $request)
    {
        
    }
    public function rules(Request $request)
    {
        
    }
}
