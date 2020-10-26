<?php

namespace App\Http\Controllers;
use App\CostoEnvio;
use Illuminate\Http\Request;

class CostoEnvioController extends Controller
{
    public function view(){
        $costosEnvio = CostoEnvio::all();
        
        return view('costosEnvio.list', compact('costosEnvio'));
    }

    public function create(){
        return view('costosEnvio.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $costoEnvio = CostoEnvio::create($request->all());
 
        $costosEnvio = CostoEnvio::all();
        return redirect('verCostoEnvio')->with(['costosEnvio'=>$costosEnvio]);
    }

    public function delete($id){
        $costoEnvio = CostoEnvio::find($id);

        $costoEnvio->delete();

        return back();
    }

    public function update(Request $request){
        $costoEnvio = CostoEnvio::find($request->id);

        $costoEnvio->Costo = $request->Costo;
        $costoEnvio->Pais = $request->Pais;
        $costoEnvio->save();

        return back();
    }

    public function getData($id){
        $costoEnvio = CostoEnvio::find($id);

        return $costoEnvio;
    }
}
