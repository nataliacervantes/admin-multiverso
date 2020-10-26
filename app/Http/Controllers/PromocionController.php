<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promocion;
class PromocionController extends Controller
{
    public function view(){
        $promociones = Promocion::all();
        $tipos = Promocion::$Tipos;
        // dd($tipos);
        return view('promociones.list', compact('promociones','tipos'));
    }

    public function create(){
        $tipos = Promocion::$Tipos;
        return view('promociones.create', compact('tipos'));
    }

    public function store(Request $request){
        // dd($request->all());
        $promocion = new Promocion();
        $promocion->Titulo = $request->Titulo;
        $promocion->FechaI = $request->FechaI;
        $promocion->FechaF = $request->FechaF;
        $promocion->Tipo = $request->Tipo;
        $promocion->Porcentaje = $request->Porcentaje;
        $promocion->Dinero = $request->Dinero;
        $promocion->save();
        
        $promociones = Promocion::all();
        $tipos = Promocion::$Tipos;
        return redirect('verPromocion')->with(['promociones'=>$promociones,'tipos'=>$tipos]);
    }

    public function delete($id){
        $promocion = Promocion::find($id);

        $promocion->delete();

        return back();
    }

    public function update(Request $request){
        $promocion = Promocion::find($request->id);

        $promocion->Titulo = $request->Titulo;
        $promocion->FechaI = $request->FechaI;
        $promocion->FechaF = $request->FechaF;
        $promocion->Tipo = $request->Tipo;
        $promocion->Porcentaje = $request->Porcentaje;
        $promocion->Dinero = $request->Dinero;
        // dd($promocion);
        // $evento->Domicilio = $request->Domicilio;
        // $evento->Estado = $request->Estado;
        // $evento->Ciudad = $request->Ciudad;
        // $evento->Costo = $request->Costo;
        // $evento->Cupo = $request->Cupo;
        $promocion->save();

        return back();
    }

    public function getData($id){
        $promocion = Promocion::find($id);

        return $promocion;
    }
}
