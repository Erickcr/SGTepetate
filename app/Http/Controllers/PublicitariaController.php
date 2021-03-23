<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Receta;
use App\Oferta;
use App\Pedido;
use Illuminate\Database\QueryException;
use App\ProductosPedido;
use Cookie;
use Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Notificacion;

class PublicitariaController extends Controller
{
    //Página principal
    public function index(){
        try {
            //Carga las tablas de productos y recetas
            $productos = Producto::get();
            $recetas = Receta::get();
            $ofertas = Oferta::orderBy('idOferta','desc')->get();
        } catch(QueryException $ex){ 
            //en caso que ocurra un error en la base de datos se carga el index de la pagina publicitaria pero sin cargar las recetas ni productos
            return view('publicitaria.index', ['mensaje' => 'No fue posible cargar los datos', 'productos', 'recetas','ofertas'=>null]);
        }

        //en caso que no haya errores se mandadn los datos de los productos y las recetas
        return view('publicitaria.index',['productos'=>$productos,'recetas'=>$recetas,'ofertas'=>$ofertas, 'mensaje' => null]);
    }

    public function sobreNosotros(){
        try {
            //Carga las tablas de productos para el carrito
            $productos = Producto::get();
        } catch(QueryException $ex){ 
            //en caso que ocurra un error en la base de datos se carga el index de la pagina publicitaria pero sin cargar las recetas ni productos}
            return view('publicitaria.sobreNosotros', ['mensaje' => 'No fue posible cargar los datos', 'productos' => null]);
        }

        //en caso que no haya errores se mandadn los datos de los productos y las recetas
        return view('publicitaria.sobreNosotros', ['mensaje' => null, 'productos' => $productos]);
    }

    public function contacto(){
        try {
            //Carga las tablas de productos para el carrito
            $productos = Producto::get();
        } catch(QueryException $ex){ 
            //en caso que ocurra un error en la base de datos se carga el index de la pagina publicitaria pero sin cargar las recetas ni productos}
            return view('publicitaria.contacto', ['mensaje' => 'No fue posible cargar los datos', 'productos' => null]);
        }
        //en caso que no haya errores se mandadn los datos de los productos y las recetas
        return view('publicitaria.contacto', ['mensaje' => null, 'productos' => $productos]);
    }

    //AGREGAR PRODUCTO AL CARRITO
    public function agregarAlCarrito($id){
        //Carga el producto seleccionado
        try {
            $product = Producto::find($id);
        } catch(QueryException $ex){ 
            //en caso que ocurra un error en la base de datos se carga el index de la pagina publicitaria pero sin cargar las recetas ni productos
            //return view('publicitaria.index', ['mensaje' => 'No fue posible cargar los datos', 'productos', 'recetas']);
            abort(404);
        }
        //verifica que el producto exista
        if(!$product) {
            abort(404);
        }
 
        //optiene el carrito de la sesión
        $cart = session()->get('cart');
 
        // Si el carrito está vacío entonces es el primer producto
        if(!$cart) {
            //se crea el carrito con un unico producto
            $cart = [
                    $id => [
                        "quantity" => 1,
                        "id" => $id
                    ]
            ];
 
            //se agrega el carrito creado a la sesion
            session()->put('cart', $cart);
            
            //se redirecciona al usuario a la pagina donde estaba
            return redirect(url()->previous().'#producto'.$id)->with('success', 'Producto añadido al carrito exitosamente!');
        }
 
        //Si el carrito no esta vacio entonces checa si el producto existe e incrementa la cantidad
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']++;
 
            //se agrega el carrito creado a la sesion
            session()->put('cart', $cart);
 
            //se redirecciona al usuario a la pagina donde estaba
            return redirect(url()->previous().'#producto'.$id)->with('success', 'Producto añadido al carrito exitosamente!');
 
        }
 
        //Si el item no existe en el carrito entonces añade al carrito con cantidad = 1
        $cart[$id] = [
            "quantity" => 1,
            "id" => $id
        ];
 
        //se agrega el carrito creado a la sesion
        session()->put('cart', $cart);
 
        //se redirecciona al usuario a la pagina donde estaba
        return redirect(url()->previous().'#producto'.$id)->with('success', 'Producto añadido al carrito exitosamente!');
    }

    //AUMENTA PRODUCTO AL CARRITO
    public function update(Request $request)
    {
        //si se mando el id y la cantidad en el request
        if($request->id and $request->quantity)
        {
            //se obtiene el carrito de la sesion
            $cart = session()->get('cart');
 
            //se cambia la cantidad del producto por la recibida en el request
            $cart[$request->id]["quantity"] = $request->quantity;
 
            //se agrega el carrito creado a la sesion
            session()->put('cart', $cart);
 
            //se redirecciona al usuario a la pagina donde estaba
            session()->flash('success', 'Cart updated successfully');
        }
    }
 
    //ELIMINAR PRODUCTO DEL CARRITO
    public function remove(Request $request)
    {
        //si el request tiene el id
        if($request->id) {
            //se obtiene el carrito de la sesion
            $cart = session()->get('cart');
 
            //verifica que el producto seleccionado en el request exista en el carrito
            if(isset($cart[$request->id])) {
 
                //quita el producto del carrito
                unset($cart[$request->id]);
 
                //guarda los cambios en la sesion
                session()->put('cart', $cart);
            }

            //se redirecciona al usuario a la pagina donde estaba
            session()->flash('success', 'Producto eliminado exitosamente');
        }
    }

    public function solicitudPedido(){
        try {
            $product = Producto::get();
        } catch(QueryException $ex){ 
            //en caso que ocurra un error en la base de datos se carga el index de la pagina publicitaria pero sin cargar las recetas ni productos
            //return view('publicitaria.index', ['mensaje' => 'No fue posible cargar los datos', 'productos', 'recetas']);
            abort(404);
        }

        return view('publicitaria.solicitarPedido',['productos'=>$product]);
    }

    public function enviarPedido(){
        $data=request()->validate([
            'nombre'=>'required|max:45',
            'descripcion'=>'nullable|max:250',
            'telefono'=>'required|max:15',
            'direccion'=>'required|max:45',
            'email'=>'required|max:45',
        ]);

        //obtenemos el carrito de la sesion
        $cart = session()->get('cart');
        
        //creamos un objeto que contenga todos los productos
        $productos = Producto::get();
        
        $today=Carbon\Carbon::now()->format('Y-m-d H:i:s');;

        $pedido=new Pedido();
        $pedido->nombre=request('nombre');
        $pedido->descripcion=request('descripcion');
        $pedido->telefono=request('telefono');
        $pedido->direccion=request('direccion');
        $pedido->correo=request('email');
        $pedido->fecha=$today;

        //creamos una variable que guarda el total del pedido
        $total = 0;

        //vamos a recorrer todo el carrito y obtenemos sus datos de productos
        foreach($cart as $producto){
            //recorre todos los productos hasta encontrar el del carrito
            foreach($productos as $p){
                //si se encuentra un producto que esta en el carrito
                if($p->idProducto == $producto["id"]){
                    $total += ($p->precioMenudeo - ($p->precioMenudeo * $p->descuentoMenudeo/100))*$producto['quantity'];
                }
            }
        }

        $pedido->total=$total;
        $pedido->save();

        //obtenemos el id del pedido que agregamos
        $pedidoNuevo = Pedido::orderBy('created_at','desc')->first();

        //vamos a recorrer todo el carrito y obtenemos sus datos de productos
        foreach($cart as $producto){
            //recorre todos los productos hasta encontrar el del carrito
            foreach($productos as $p){
                //si se encuentra un producto que esta en el carrito
                if($p->idProducto == $producto["id"]){
                    //se crea el registro en productos pedido
                    $productosPedido = new ProductosPedido();

                    //se escriben los datos del producto en el pedido
                    $productosPedido->idPedido = $pedidoNuevo->idPedido;
                    $productosPedido->precio = $p->precioMenudeo;
                    $productosPedido->descuento = $p->descuentoMenudeo;
                    $productosPedido->nombre = $p->nombre;
                    $productosPedido->cantidad = $producto['quantity'];
                    $productosPedido->save();
                    break;
                }
            }
        }
        $request = session()->forget('cart');

        $notificacion=new Notificacion();
        $notificacion->idPedido= $pedidoNuevo->idPedido;
        $notificacion->tipo='pedido';
        $notificacion->save();

        //enviar correo
        Mail::to('arturoalcocermolina@gmail.com')->send(new SendMailable());
        return redirect('/')->withErrors(['msg', 'The Message']);
    }

    
}
