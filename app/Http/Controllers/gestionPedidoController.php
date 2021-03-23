<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido; //este es mi controlador
use App\ProductosPedido;
use Illuminate\Support\Facades\Gate;
use App\Notificacion;

class gestionPedidoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        Gate::authorize('haveaccess','gestionPedido.index');
        $pedidos= Pedido::get();
        return view('gestor.gestionPedido',['pedidos'=>$pedidos]);
    }
    public function show($id){
        Gate::authorize('haveaccess','gestionPedido.show');
        $productos= ProductosPedido::where('idPedido',$id)->get();    
        $pedido = Pedido::find($id);
       
        //borrar las notificaciones
        $notifiBorrar=Notificacion::where('idPedido',$id)->first();
        if($notifiBorrar!=null){
            $notifiBorrar->delete();
        }
        //esta parte es para que se vean las notificaciones
        $notificaciones=Notificacion::orderBy('created_at','desc')->get();
        $nnoti=Notificacion::count();
        return view('gestor.revisarpedido',['productos'=>$productos,'pedido'=>$pedido,'notificaciones'=>$notificaciones,'nnoti'=>$nnoti]);
    }
    public function update($id){
        Gate::authorize('haveaccess','gestionPedido.update');
        $data=request()->validate([
            'estatus'=>'required',
        ]);
        $pedido= Pedido::findOrFail($id);
        $pedido->estatus=request('estatus');
        $pedido->save();

        return redirect('/sgtepetate/pedidos')->with('alert', 'Se actualizó el pedido exitosamente!');
    }

   
}