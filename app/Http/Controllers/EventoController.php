<?php

namespace App\Http\Controllers;
use App\Eventos;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function view(){
        $eventos = eventos::all();
        return view('eventos.list', compact('eventos'));
    }

    public function create(){
        return view('eventos.create');
    }

    public function store(Request $request){
        $evento = Eventos::create($request->all());

        $eventos = Eventos::all();
         return redirect('verEventos')->with(['eventos'=>$eventos]);
    }

    public function delete($id){
        $evento = Eventos::find($id);

        $evento->delete();

        return back();
    }

    public function update(Request $request){
        $evento = Eventos::find($request->id);
        // dd($evento);
        $evento->Evento = $request->Evento;
        $evento->Lugar = $request->Lugar;
        $evento->Fecha = $request->Fecha;
        $evento->Hora = $request->Hora;
        $evento->Domicilio = $request->Domicilio;
        $evento->Estado = $request->Estado;
        $evento->Ciudad = $request->Ciudad;
        $evento->Costo = $request->Costo;
        $evento->Cupo = $request->Cupo;
        $evento->Video = $request->Video;
        $evento->Imagen = $request->Imagen;
        $evento->Maps = $request->Maps;
        $evento->Fanpage = $request->Fanpage;
        $evento->save();

        return back();
    }

    public function getData($id){
        $evento = Eventos::find($id);

        return $evento;
    }
}
