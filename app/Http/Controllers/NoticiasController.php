<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Noticia;
use Illuminate\Database\QueryException;

class NoticiasController extends Controller
{
    public function index(){
        try {
            //Carga las tablas de productos y recetas
            //$noticias=\DB::table('noticias')->orderBy('idNoticia','desc')->limit(3)->get();
            $noticias=Noticia::orderBy('fecha','desc')->paginate(4);
            $productos = Producto::get();
        } catch(QueryException $ex){ 
            //en caso que ocurra un error en la base de datos se carga el index de la pagina publicitaria pero sin cargar las recetas ni productos
            return view('publicitaria.noticias', ['mensaje' => 'No fue posible cargar los datos', 'productos'=> null,'noticias'=> null]);
        }

        return view('publicitaria.noticias',['noticias'=>$noticias, 'productos'=>$productos, 'mensaje' => null]);
    }
    
   
}