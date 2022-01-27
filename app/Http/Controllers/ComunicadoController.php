<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use App\Models\Torcedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ComunicadoController extends Controller
{
    public function index(){
        $comunicados = Comunicado::get();
        return view('comunicados.list', ['comunicados' => $comunicados]);
    }

    public function new(){
        return view('comunicados.form');
    }

    public function add(Request $request){
        $comunicado = new Comunicado();
        $comunicado->create($request->all());
        return Redirect::to('/comunicados');
    }

    public function edit($id){
        $comunicado = Comunicado::findOrFail($id);
        return view('comunicados.form', ['comunicado' => $comunicado]);
    }

    public function update($id, Request $request){
        $comunicado = Comunicado::findOrFail($id);
        $comunicado->update($request->all());
        return Redirect::to('/comunicados');
    }
}
