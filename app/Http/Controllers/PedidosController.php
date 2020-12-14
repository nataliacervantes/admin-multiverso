<?php

namespace App\Http\Controllers;
use App\Pedidos;
use App\BookPedido;
use App\Libros;
use App\Mail\ConfirmacionDeEnvio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PedidosController extends Controller
{
    public function ver(){
        $pedidos = Pedidos::all();
        return view('pedidos.list',compact('pedidos'));
    }

    public function verDetalle($id){
        $pedido = Pedidos::where('id',$id)->first();
        // dd($pedido);
        return view('pedidos.detalle',compact('pedido'));
    }

    public function enviarPedido(Request $request){
        $pedido = Pedidos::where('id',$request->id)->first();

        $pedido->Guia = $request->Guia;
        $pedido->Paqueteria = $request->Paqueteria;
        $pedido->EstatusEnvio = 'Enviado';
        $pedido->save();

        $productos = BookPedido::where('pedidos_id', $pedido->id)->get();

        foreach($productos as $producto){
            // dd($producto);
            if($producto->books_id != null){
                $libro = Libros::find($producto->books_id);
                $libro->Stock = $libro->Stock - $producto->Cantidad;
                $libro->save();
            }
        }
        // if($pedido){
            Mail::to('nataliaglezcervantes@gmail.com')->send(new ConfirmacionDeEnvio($pedido));
        // }
        return back();
    }

    public function confirmarPago(Request $request){
        $pedido = Pedidos::where('id',$request->idPedido)->first();
        // dd($request->idPedido);
        $pedido->EstatusPago = 'Pagado';
        
        $pedido->save();
        return back();
    }
}
