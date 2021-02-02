<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taller;

class TallerController extends Controller
{
    public function view(){
        $talleres = Taller::all();
        // $tipos = Promocion::$Tipos;
        // dd($tipos);
        return view('taller.list', compact('talleres'));
    }

    public function create(){
        // $taller = Taller::$Tipos;
        return view('taller.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $taller = new Taller();
        $taller->NombreTaller = $request->Taller;
        $taller->Inicio = $request->FechaInicio;
        $taller->Fin = $request->FechaFin;
        $taller->Descripción = $request->Descripcion;
        $taller->Precio = $request->Precio;
        $taller->Hora = $request->Hora;

        $taller->save();
        
        $talleres = Taller::all();
        
        return redirect('verTaller')->with(['talleres'=>$talleres]);
    }

    public function delete($id){
        $taller = Taller::find($id);

        $taller->delete();

        return back();
    }

    public function update(Request $request){
        $taller = Taller::find($request->id);
        
        $taller->NombreTaller = $request->Taller;
        $taller->Inicio = $request->FechaInicio;
        $taller->Fin = $request->FechaFin;
        $taller->Descripción = $request->Descripcion;
        $taller->Precio = $request->Precio;
        $taller->Hora = $request->Hora;

        $taller->save();
       
        return back();
    }

    public function getData($id){
        $taller = Taller::find($id);

        return $taller;
    }
}
