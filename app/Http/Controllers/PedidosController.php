<?php

namespace App\Http\Controllers;
use App\Pedidos;
use App\BookPedido;
use App\Eventos;
use App\EventPedidos;
use App\Libros;
use App\Mail\EnviarBoleto;
use App\Mail\ConfirmacionDeEnvio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
class PedidosController extends Controller
{
    public function ver(){
        $pedidos = Pedidos::all();
        return view('pedidos.list',compact('pedidos'));
    }
    public function verDetalle($id){
        $pedido = Pedidos::where('id',$id)->first();
        $detalleLibros = BookPedido::where('pedidos_id',$id)->get();
        $detalleEventos = EventPedidos::where('pedidos_id',$id)->get();
        // dd();
        if($pedido->Folio == 0){
            $folio = 'no';
        }
        // dd($detalleLibros->books);
        return view('pedidos.detalle',compact('pedido','detalleLibros','detalleEventos','folio'));
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
            Mail::to($pedido->Email)->send(new ConfirmacionDeEnvio($pedido));
        // }
        return back();
    }
    public function confirmarPago(Request $request){
        $pedido = Pedidos::where('id',$request->idPedido)->first();
        // dd($request->idPedido);
        $evento = EventPedidos::where('pedidos_id',$pedido->id)->get();
        $libro = BookPedido::where('pedidos_id', $pedido->id)->get();

        if($evento != null && $libro != null){
            $pedido->EstatusPago = 'Pagado';
            // $pedido->EstatusEnvio = 'Enviado';
            $pedido->save();
            Mail::to($pedido->Email)->send(new EnviarBoleto($pedido));
        }elseif($evento != null && $libro == null){
            $pedido->EstatusPago = 'Pagado';
            $pedido->EstatusEnvio = 'Enviado';
            $pedido->save();
            Mail::to($pedido->Email)->send(new EnviarBoleto($pedido));
        }

        $pedido->EstatusPago = 'Pagado';

        $pedido->save();
        return back();
    }

    public function viewBoletos(){
        $eventos = Eventos::all();
        return view('boletos.imprimir')->with(['eventos'=>$eventos]);
    }
    public function generarBoletos(Request $request){
        // dd(gettype($request->otro));
        $evento = Eventos::find($request->id);
        $evento->Cupo = $evento->Cupo - 1;
        $evento->save();
        // dd($evento);
        $data = [
            'evento' => $evento,
        ];
        $pdf = PDF::loadView('boletos.boleto',$data) ->setPaper('a4', 'landscape');
        return $pdf->download('boletos.pdf');
    }
}
