<?php

namespace App\Http\Controllers;
use App\Pedidos;
use Illuminate\Http\Request;

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
