<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Oferta;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProductosController extends Controller
{
    public function index()
    {
        try {
            //Carga las tablas de productos y ofertas
            $productosPaginado = Producto::paginate(9);
            $productos = Producto::get();
            $ofertas = Oferta::orderBy('idOferta','desc')->get();
        } catch(QueryException $ex){ 
            //en caso que ocurra un error en la base de datos se carga el index de la pagina publicitaria pero sin cargar las recetas ni productos
            return view('publicitaria.productos', ['mensaje' => 'No fue posible cargar los datos', 'productos'=>null, 'productosPaginado'=>null,'ofertas'=>null]);
        }
       // return $productos;
        return view ('publicitaria.productos',['productos'=>$productos, 'productosPaginado'=>$productosPaginado,'ofertas' => $ofertas,'mensaje'=>null]);
    }
}
