<?php

namespace App\Http\Controllers;
use App\Libros;
use App\Escritor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibrosController extends Controller
{
    public function create(){
        $escritores = Escritor::all();
        return view('libros.create', compact('escritores'));
    }

    public function store(Request $request){
        $libros = new Libros();
      
        // dd($request->Video);
        $libros->Titulo = $request->Titulo;
        $libros->autores_id = $request->Autor;
        $libros->Descripcion = $request->Descripcion;
        $libros->Precio = $request->Precio;
        $libros->Stock = $request->Stock;
        
        $sub = substr($request->Video,7);
        $style = '<iframe style="position: absolute;top: 0;left: 0;bottom: 0;right: 0;width: 100%;height: 100%;border: none;" '.$sub;
        // dd($style);
        $libros->Video = $style;
        if($request->hasFile('Portada')){
            $var = $request->file('Portada');
            $ext = $request->file('Portada')->getClientOriginalExtension();
            $name = $request->Titulo.'Portada.'.$ext;
            $var->move('img/Portadas',$name);
            $libros->Portada = $name;
        }
        
        $libros->save();
       
        $libros = Libros::all();
         
        return redirect('verLibros')->with(['libros'=>$libros]);
    }

    // public function getImage($id){
    //     $libro = Libros::find($id);
    //     dd($libro);
    //     $fileBlob = Storage::get($libro->Imagenes);
    //     $mimeType = Storage::mimeType($libro->Imagenes);
    //     header('Content-Type: '.$mimeType);
    //     echo $fileBlob;

    //     // return $fileBlob;
    // }

    public function view(){
        $libros = Libros::all();
        $escritores = Escritor::all();
        return view('libros.list', compact('libros','escritores'));
    }

    public function getData($id){
        $libro = Libros::find($id);

        return $libro;
    }

    public function delete($id){
        $libro = Libros::find($id);
        $libro->delete();
        return back();
    }

    public function update(Request $request){
        $libros = Libros::find($request->id);
        // dd($request->Imagenes);
       
        $libros->Titulo = $request->Titulo;
        $libros->autores_id = $request->Autor;
        $libros->Descripcion = $request->Descripcion;
        $libros->Precio = $request->Precio;
        $libros->Stock = $request->Stock;
        $libros->Video = $request->Video;

        if($request->hasFile('Portada')){
            // dd($request->Portada);
            $var = $request->file('Portada');
            $ext = $request->file('Portada')->getClientOriginalExtension();
            $name = $request->Titulo.'.'.$ext;
            // dd($ext);
            $var->move('img/Portadas',$name);
            $libros->Portada = $name;
        }
        // if($request->hasFile('Contraportada')){
        //     // dd($request->Contraportada);
        //     $var = $request->file('Contraportada');
        //     $ext = $request->file('Contraportada')->getClientOriginalExtension();
        //     $name = $request->Titulo.'.'.$ext;
        //     // dd($ext);
        //     $var->move('img/Portadas',$name);
        //     $libros->Contraportada = $name;
        // }
        $libros->save();

        return back();
    }
}
