<?php

namespace App\Http\Controllers;
use App\Escritor;
use App\Libros;
use Illuminate\Http\Request;

class EscritorController extends Controller
{
    public function view(){
        $escritores = Escritor::all();
        return view('escritores.list', compact('escritores'));
    }

    public function create(){
        return view('escritores.create');
    }

    public function store(Request $request){
        $escritor = Escritor::create($request->all());

        $escritores = Escritor::all();
         return redirect('verEscritor')->with(['escritores'=>$escritores]);
    }

    public function delete($id){
        $escritor = Escritor::find($id);
        $libros = Libros::where('autores_id',$escritor)-get();

        foreach($libros as $libro){
            $libros->delete();
        }
        $escritor->delete();

        return back();
    }

    public function update(Request $request){
        $escritor = Escritor::find($request->id);

        $escritor->Nombre = $request->Nombre;
        $escritor->Descripcion = $request->Descripcion;
 
        $escritor->save();

        return back();
    }

    public function getData($id){
        $escritor = Escritor::find($id);

        return $escritor;
    }
}
