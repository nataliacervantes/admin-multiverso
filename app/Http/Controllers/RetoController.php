<?php

namespace App\Http\Controllers;
use App\Reto;
use Illuminate\Http\Request;

class RetoController extends Controller
{
    public function view(){
        $retos = Reto::all();
        // $tipos = Promocion::$Tipos;
        // dd($tipos);
        return view('reto.list', compact('retos'));
    }

    public function create(){
        // $Reto = Reto::$Tipos;
        return view('reto.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $reto = new Reto();
        $reto->NombreReto = $request->Reto;
        $reto->Inicio = $request->FechaInicio;
        $reto->Fin = $request->FechaFin;
        $reto->Descripción = $request->Descripcion;
        $reto->Precio = $request->Precio;
        $reto->Hora = $request->Hora;

        if($request->hasFile('Imagen')){
            $var = $request->file('Imagen');
            $ext = $request->file('Imagen')->getClientOriginalExtension();
            $name = $request->Titulo.'Imagen.'.$ext;
            $var->move('img/Reto',$name);
            $reto->Imagen = $name;
        }

        $reto->save();
        
        $retos = Reto::all();
        
        return redirect('verReto')->with(['retos'=>$retos]);
    }

    public function delete($id){
        $reto = Reto::find($id);

        $reto->delete();

        return back();
    }

    public function update(Request $request){
        $reto = Reto::find($request->id);
        
        $reto->NombreReto = $request->Reto;
        $reto->Inicio = $request->FechaInicio;
        $reto->Fin = $request->FechaFin;
        $reto->Descripción = $request->Descripcion;
        $reto->Precio = $request->Precio;
        $reto->Hora = $request->Hora;

        if($request->hasFile('Imagen')){
            $var = $request->file('Imagen');
            $ext = $request->file('Imagen')->getClientOriginalExtension();
            $name = $request->Titulo.'Imagen.'.$ext;
            $var->move('img/Reto',$name);
            $reto->Imagen = $name;
        }
        
        $reto->save();
       
        return back();
    }

    public function getData($id){
        $reto = Reto::find($id);

        return $reto;
    }
}
