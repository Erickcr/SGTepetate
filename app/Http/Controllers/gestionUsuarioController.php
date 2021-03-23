<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class gestionUsuarioController extends Controller
{
    //
    public function index(){
        Gate::authorize('haveaccess','gestionUsuario.index');
        $usuario = Usuario::get();
        return view('gestor.gestionUsuarios', ['usuario' => $usuario]);
    }

    public function editusuario($id){
        Gate::authorize('haveaccess','gestionUsuario.editusuario');
        $usuario = Usuario::where('idUsuario',$id)->get();
        return view('gestor.editarUsuario', ['usuario' => $usuario]);
    }
    public function updateusuario($id){
        // dd($request);
        Gate::authorize('haveaccess','gestionUsuario.updateusuario');
        $data=request()->validate([
            'nombre'=>'required|max:255',
            'tipo'=>'required',
            'calle'=>'max:45',
            'numCasa'=>'max:10',
            'colonia'=>'max:45',
            'ciudad'=>'max:45',
            'telefono'=>'digits_between:10,15',
            'contraseña'=>'max:40',
            'sueldo'=>'nullable',
            'fechaNac'=>'nullable',
            'fechaContratacion'=>'nullable',
            'email'=>'required|email',
            'foto'=>'nullable|image',
            'estatus'=>'required'
        ]);
        if (request('estatus') == "Activo") {
            $newEstatus = 1;
    
        } else {
            $newEstatus = 0;
        }
        $idRol=0;
        if(request('tipo')=='Administrador'){
            $idRol=1;
        }
        if(request('tipo')=='Tecnico'){
            $idRol=2;
        }
        if(request('tipo')=='Empleado'){
            $idRol=3;
        }
        $usuarios = Usuario::where('idUsuario',$id)->get();
        $imagen=$usuarios->first();
        if (request('foto')==null){
            $newFileName=$imagen->foto;
        }
        else {
            $oldImage=public_path().'/storage/images/usuarios_img/'.$imagen->foto;
            if(file_exists($oldImage) && ($imagen->foto)!='fotoPerfilDefault.png'){
                unlink($oldImage);
            }

            $fileNameWithTheExtension = request('foto')->getClientOriginalName();
            $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
            $extension = request('foto')->getClientOriginalExtension();
            $newFileName=$fileName.'_'.time().'.'.$extension;
            $path = request('foto')->storeAs('/public/images/usuarios_img',$newFileName);
        }

        $usuario=Usuario::findOrFail($id);
        $usuario->nombre=request('nombre');
        $usuario->tipo=request('tipo');
        $usuario->calle=request('calle');
        $usuario->numCasa=request('numCasa');
        $usuario->colonia=request('colonia');
        $usuario->ciudad=request('ciudad');
        $usuario->estatus=$newEstatus;
        $usuario->telefono=request('telefono');
        $usuario->contraseña=request('contraseña');
        $usuario->sueldo=request('sueldo');
        $usuario->fechaNac=request('fechaNac');
        $usuario->fechaContratacion=request('fechaContratacion');
        $usuario->email=request('email');
        $usuario->foto=$newFileName;

        $usuario->save();

        $users=User::findOrFail($id);
        $users->name=request('nombre');
        $users->email=request('email');
        $users->password=Hash::make(request('contraseña'));
        $users->active=$newEstatus;
        $users->save();

        $users->roles()->sync([$idRol]);

        return redirect('/sgtepetate/Usuarios');

    }

    public function addusuario(){
        Gate::authorize('haveaccess','gestionUsuario.addusuario');
        return view('gestor.nuevoUsuario');
    }

    public function storeusuario(Request $request){
        //  dd($request);
        Gate::authorize('haveaccess','gestionUsuario.storeusuario');
        $data=request()->validate([
            'nombre'=>'required|max:255',
            'tipo'=>'required',
            'calle'=>'max:45',
            'numCasa'=>'max:10',
            'colonia'=>'max:45',
            'ciudad'=>'max:45',
            'telefono'=>'digits_between:10,15',
            'contraseña'=>'max:40',
            'sueldo'=>'nullable',
            'fechaNac'=>'nullable',
            'fechaContratacion'=>'nullable',
            'email'=>'required|email',
            'foto'=>'nullable|image'
        ]);
        $idRol=0;
        if(request('tipo')=='Administrador'){
            $idRol=1;
        }
        if(request('tipo')=='Tecnico'){
            $idRol=2;
        }
        if(request('tipo')=='Empleado'){
            $idRol=3;
        }
        if (request('foto')==null){
            $newFileName='fotoPerfilDefault.png';
        }
        else{
            $fileNameWithTheExtension = request('foto')->getClientOriginalName();
            $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
            $extension = request('foto')->getClientOriginalExtension();
            $newFileName=$fileName.'_'.time().'.'.$extension;
            $path = request('foto')->storeAs('/public/images/usuarios_img',$newFileName);
        }
        $usuario=new Usuario();
        $usuario->nombre=request('nombre');
        $usuario->tipo=request('tipo');
        $usuario->calle=request('calle');
        $usuario->numCasa=request('numCasa');
        $usuario->colonia=request('colonia');
        $usuario->ciudad=request('ciudad');
        $usuario->estatus=1;
        $usuario->telefono=request('telefono');
        $usuario->contraseña=request('contraseña');
        $usuario->sueldo=request('sueldo');
        $usuario->fechaNac=request('fechaNac');
        $usuario->fechaContratacion=request('fechaContratacion');
        $usuario->email=request('email');
        $usuario->foto=$newFileName;

        $usuario->save();
        $users=new User();
        $users->name=request('nombre');
        $users->email=request('email');
        $users->password=Hash::make(request('contraseña'));
        $users->active=1;
        $users->save();
        $users->roles()->sync([$idRol]);
        return redirect('/sgtepetate/Usuarios');
    }

    public function destroy($id){
        Gate::authorize('haveaccess','gestionUsuario.destroy');
        $usuario=Usuario::findOrFail($id);
        $oldImage=public_path().'/storage/images/usuarios_img/'.$usuario->foto;

        if(file_exists($oldImage) && ($usuario->foto)!='fotoPerfilDefault.png'){
            unlink($oldImage);
        }

        $usuario->delete();

        $users=User::findOrFail($id);
        $users->delete();
        return redirect('/sgtepetate/Usuarios');
    }

    public function destroyEstatus($id){
        if(Auth::id()==$id){
            return back()->withErrors('No puedes borrar tu propio usuario');
        }
        Gate::authorize('haveaccess','gestionUsuario.destroy');
        $usuario=Usuario::findOrFail($id);
        $usuario->estatus=0;
        $usuario->save();

        $user=User::findOrFail($id);
        $user->active=0;
        $user->save();

        return redirect('/sgtepetate/Usuarios');
    }

    public function indexInactivos(){
        Gate::authorize('haveaccess','gestionUsuario.index');
        $usuario = Usuario::where('estatus','0')->get();
        return view('gestor.gestionUsuariosIn', ['usuario' => $usuario]);
    }

    public function reactivarUsuario($id){
        Gate::authorize('haveaccess','gestionUsuario.destroy');
        $usuario=Usuario::findOrFail($id);
        $usuario->estatus=1;
        $usuario->save();

        $user=User::findOrFail($id);
        $user->active=1;
        $user->save();

        return redirect('/sgtepetate/Usuarios');
    }
}
