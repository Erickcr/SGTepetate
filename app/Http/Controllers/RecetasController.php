<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;
use App\Producto;
use Illuminate\Database\QueryException;

class RecetasController extends Controller
{
    public function index(){
        try {
            //Carga las tablas de productos y recetas
            $recetas=Receta::orderBy('idReceta','desc')->take(10)->get();
            $recetasCompletas=Receta::paginate(10);
            $productos = Producto::get();
        } catch(QueryException $ex){ 
            //en caso que ocurra un error en la base de datos se carga el index de la pagina publicitaria pero sin cargar las recetas ni productos
            return view('publicitaria.recetas', ['mensaje' => 'No fue posible cargar los datos', 'productos'=> null,'recetas'=> null,'recetasCompletas'=> null]);
        }

        //en caso que no haya errores se mandadn los datos de los productos y las recetas
        return view('publicitaria.recetas',['recetas'=>$recetas,'recetasCompletas'=>$recetasCompletas, 'productos'=>$productos, 'mensaje' => null]);
    }

    public function show($id){
        //$receta=\DB::select('select * from receta where idReceta= '.$id)->get();
        try {
            //Carga las tablas de productos y recetas
            $productos = Producto::get();
            $receta=Receta::where('idReceta',$id)->get();
            $recetas=Receta::orderBy('idReceta','desc')->take(10)->get();
        } catch(QueryException $ex){ 
            //en caso que ocurra un error en la base de datos se carga el index de la pagina publicitaria pero sin cargar las recetas ni productos
            return view('publicitaria.receta', ['mensaje' => 'No fue posible cargar los datos', 'productos'=> null, 'receta'=> null,'recetas'=> null,'id' => 0]);
        }

        //en caso que no haya errores se mandadn los datos de los productos y las recetas
        return view('publicitaria.receta',['receta'=>$receta, 'productos'=>$productos, 'mensaje'=> null, 'recetas'=>$recetas]);
    }
}
