<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Usuario;
use Auth;

class UsuarioController extends Controller
{
    public function index(){
        try { 
            $usuario = Usuario::where('idUsuario',Auth::id())->get();
        } catch(QueryException $ex){ 
            return view('errors.404', ['mensaje' => 'No fue posible conectarse con la base de datos']);
        }

        if($usuario == null){
            return view('errors.404', ['mensaje' => 'No fue posible conectarse con la base de datos']);
        }
        
        return view('gestor.perfilUsuario', ['usuario' => $usuario]);
    }
}
