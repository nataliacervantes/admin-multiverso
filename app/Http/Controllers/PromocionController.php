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
        
        $promocion = new Promocion();
        $promocion->Cupon = $request->Cupon;
        $promocion->FechaI = $request->FechaI;
        $promocion->FechaF = $request->FechaF;
        $promocion->Tipo = $request->Tipo;
        $promocion->Porcentaje = $request->Porcentaje;
        $promocion->Dinero = $request->Dinero;
        $promocion->Limite = $request->Limite;
        if(!isset($request->Correo)){
            // dd($request->all());
            $promocion->Correo = 0;
        }else{
            // dd('nose');
            $promocion->Correo = $request->Correo;
        }
        
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

        $promocion->Cupon = $request->Cupon;
        $promocion->FechaI = $request->FechaI;
        $promocion->FechaF = $request->FechaF;
        $promocion->Tipo = $request->Tipo;
        $promocion->Limite = $request->Limite;
        $promocion->Porcentaje = $request->Porcentaje;
        $promocion->Dinero = $request->Dinero;
        if(!isset($request->Correo)){
            $promocion->Correo = 0;
        }else{
            $promocion->Correo = $request->Correo;
        }
        $promocion->save();

        return back();
    }

    public function getData($id){
        $promocion = Promocion::find($id);

        return $promocion;
    }
}
