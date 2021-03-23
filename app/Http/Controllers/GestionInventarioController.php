<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Inventario;
use App\Unidadmedida;
use App\Bitacora;
use App\Estanque;
use App\ModificacionInventario;
use App\Actividad;
use App\Registroactividad;
use Carbon\Carbon;
use App\Registroestanque;
use Auth;
use Illuminate\Support\Facades\Gate;
use App\Conteo;
use App\Tipomovimiento;

class GestionInventarioController extends Controller
{
    public function index()
    {
        Gate::authorize('haveaccess','GestionInventario.index');
        $categorias = Categoria::get();
        return view ('gestor.inventario',['categorias'=>$categorias]);
    }

    public function showall()
    {
        Gate::authorize('haveaccess','GestionInventario.showall');
        $inventarios = Inventario::get();
        return view ('gestor.gestionInventario.inventarioTotal',['inventarios'=>$inventarios]);
    }

    public function showcategoria($id)
    {
        Gate::authorize('haveaccess','GestionInventario.showcategoria');
        $categoria = Categoria::findOrFail($id);
        $inventarios= Inventario::where('categoria',$id)->get();
        return view ('gestor.gestionInventario.inventarioCategoria',['inventarios'=>$inventarios,'categoria'=>$categoria]);
    }

    public function addcategoria()
    {
        Gate::authorize('haveaccess','GestionInventario.addcategoria');
        return view ('gestor.gestionInventario.createCategoria');
    }

    public function storecategoria(){
        Gate::authorize('haveaccess','GestionInventario.storecategoria');
        // dd($request);
        $data=request()->validate([
            'nombre'=>'required|max:30|unique:categoria',
            'descripcion'=>'nullable|max:250',
            'foto'=>'image|required'
        ]);
        
        $fileNameWithTheExtension = request('foto')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('foto')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('foto')->storeAs('/public/images/categorias_img',$newFileName);

        $categoria=new Categoria();
        $categoria->nombre=request('nombre');
        $categoria->foto=$newFileName;
        $categoria->descripcion=request('descripcion');

        $categoria->save();
        return redirect('/sgtepetate/inventario');
    }

    public function editcategoria($id)
    {
        Gate::authorize('haveaccess','GestionInventario.editcategoria');
        $categoria = Categoria::findOrFail($id);
        return view ('gestor.gestionInventario.editCategoria',['categoria'=>$categoria]);
    }

    public function updatecategoria($id){
        Gate::authorize('haveaccess','GestionInventario.updatecategoria');
        // dd($request);
        $data=request()->validate([
            'nombre'=>'required|max:30',
            'descripcion'=>'nullable|max:250',
            'foto'=>'image'
        ]);
        $categorias = Categoria::where('idCategoria',$id)->get();
        $imagen=$categorias->first();

        if(request('foto')==null){
            $newFileName=$imagen->foto;
        }

        else{
        $fileNameWithTheExtension = request('foto')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('foto')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('foto')->storeAs('/public/images/categorias_img',$newFileName);

        $oldImage=public_path().'/storage/images/categorias_img/'.$imagen->foto;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
        }

        $categoria=Categoria::findOrFail($id);
        $categoria->descripcion=request('descripcion');
        $categoria->nombre=request('nombre');
        $categoria->foto=$newFileName;

        $categoria->save();
        return redirect('/sgtepetate/inventario/categoria/'.$id);
    }

    public function destroycategoria($id)
    {
        Gate::authorize('haveaccess','GestionInventario.destroycategoria');
        if($id > 3){
            $categoria=Categoria::findOrFail($id);

            $oldImage=public_path().'/storage/images/categorias_img/'.$categoria->foto;
    
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
            
            $categoria->delete();
        }
        return redirect('/sgtepetate/inventario');
    }

    public function editinventario($id)
    {
        Gate::authorize('haveaccess','GestionInventario.editinventario');
        $inventario = Inventario::findOrFail($id);
        $categorias = Categoria::get();
        $unidades = Unidadmedida::get();
        return view ('gestor.gestionInventario.editInventario',['inventario'=>$inventario,'categorias'=>$categorias,'unidades'=>$unidades]);
    }

    public function updateinventario($id)
    {
        Gate::authorize('haveaccess','GestionInventario.updateinventario');
        $data=request()->validate([
            'nombre'=>'required|max:50',
            'descripcion'=>'nullable|max:250',
            'categoria'=>'required',
            'unidadmedida'=>'required'
        ]);

        $categoriaId=Categoria::where('nombre',request('categoria'))->first();
        $unidadmedidaId=Unidadmedida::where('abreviatura',request('unidadmedida'))->first();
        $inventario=Inventario::findOrFail($id);

        $inventario->nombre=request('nombre');
        $inventario->descripcion=request('descripcion');
        $inventario->categoria=$categoriaId->idCategoria;
        $inventario->unidadMedida=$unidadmedidaId->idUnidadMedida;

        $inventario->save();

        $inventario=Inventario::findOrFail($id);

        return redirect('/sgtepetate/inventario/categoria/'.$inventario->categoria);
    }

    public function minusinventario($id)
    {
        Gate::authorize('haveaccess','GestionInventario.minusinventario');
        $inventario = Inventario::findOrFail($id);
        $categorias = Categoria::get();
        $unidades = Unidadmedida::get();
        $fecha = Carbon::now()->format('y/m/d');
        // dd($fecha);
        return view ('gestor.gestionInventario.minusInventario',['inventario'=>$inventario,'categorias'=>$categorias,'unidades'=>$unidades,'fecha'=>$fecha]);
    }

    public function minusupdateinventario($id)
    {
        Gate::authorize('haveaccess','GestionInventario.minusupdateinventario');
        $data=request()->validate([
            'cantidad'=>'required',
            'fecha'=>'required|date',
            'descripcion'=>'required'
        ]);

        $inventario=Inventario::findOrFail($id);
        $nuevaCantidad=($inventario->cantidad)-request('cantidad');
        $inventario->cantidad=$nuevaCantidad;
        
        $bitacora=new Bitacora();
        $bitacora->usuario=Auth::id();
        $date = str_replace('T', ' ', request('fecha'));
        $bitacora->fecha=$date;
        $bitacora->vigente=1;
        $bitacora->descripcion=request('descripcion');
        $bitacora->save();
        $inventario->save();

        $registro=new Registroactividad();
        $actividad=Actividad::where('nombre','Egreso de inventario')->first();

        $registro->idBitacora=$bitacora->idBitacora;
        $registro->idActividad=$actividad->idActividad;
        $registro->save();
        
        $modificacion=new ModificacionInventario();

        $modificacion->bitacora=$bitacora->idBitacora;
        $modificacion->inventario=$inventario->idInventario;
        $modificacion->tipo='Salida';
        $modificacion->cantidad=request('cantidad');
        $modificacion->save();
        return redirect('/sgtepetate/inventario/categoria/'.$inventario->categoria);
    }

    public function plusinventario($id)
    {
        Gate::authorize('haveaccess','GestionInventario.plusinventario');
        $inventario = Inventario::findOrFail($id);
        $categorias = Categoria::get();
        $unidades = Unidadmedida::get();
        $fecha = Carbon::now()->format('y/m/d');
        $tipomovimiento=Tipomovimiento::get();
        // dd($fecha);
        return view ('gestor.gestionInventario.plusInventario',['inventario'=>$inventario,'categorias'=>$categorias,'unidades'=>$unidades,'fecha'=>$fecha, 'tipomovimiento'=>$tipomovimiento]);
    }

    public function plusupdateinventario($id)
    {
        Gate::authorize('haveaccess','GestionInventario.plusupdateinventario');
        $data=request()->validate([
            'cantidad'=>'required',
            'fecha'=>'required|date',
            'descripcion'=>'required'
        ]);

        $inventario=Inventario::findOrFail($id);

        try{
            \DB::transaction(function() use ($inventario)
            {
                $nuevaCantidad=($inventario->cantidad)+request('cantidad');
                $inventario->cantidad=$nuevaCantidad;
                $inventario->save();
                
                $bitacora=new Bitacora();
                $bitacora->usuario=Auth::id();
                $date = str_replace('T', ' ', request('fecha'));
                $bitacora->fecha=$date;
                $bitacora->vigente=1;
                $bitacora->descripcion=request('descripcion');
                $bitacora->save();
                
                $modificacion=new ModificacionInventario();
                $registro=new Registroactividad();
                $actividad=Actividad::where('nombre','Ingreso de inventario')->first();
                $registro->idBitacora=$bitacora->idBitacora;
                $registro->idActividad=$actividad->idActividad;
                $registro->save();
                $modificacion->bitacora=$bitacora->idBitacora;
                $modificacion->inventario=$inventario->idInventario;
                $modificacion->tipo='Entrada';
                $modificacion->cantidad=request('cantidad');
                $modificacion->save();

                if($inventario->rel_categoria->nombre=='Productos'){
                        $bitacora->descripcion=request('descripcion').', se restaron peces del estanque 9, se modificó tabla conteo';
                        $estanque = Estanque::findOrFail(9);
                        $estanque->relacionEstanqueBitacora()->get();
                        $estanque = $estanque->relacionEstanqueBitacora()->orderBy('fecha','desc')->first();

                        $conteonew = new Conteo();
                        $conteonew->idBitacora = $bitacora->idBitacora;
                        $conteolast = Conteo::find($estanque->idBitacora);
                        $conteonew->observaciones =$conteolast->observaciones;
                        $conteonew->numeroDePeces = $conteolast->numeroDePeces - request('cantidad');
                        $conteonew->longitud =$conteolast->longitud;
                        $conteonew->peso =$conteolast->peso;
                        $conteonew->pecesMuertos =$conteolast->pecesMuertos;
                        $conteonew->causaMuerte =$conteolast->causaMuerte;
                        $conteonew->save();

                        $registroestanque = new Registroestanque;
                        $registroestanque->bitacora = $bitacora->idBitacora;
                        $registroestanque->estanque = 9;
                        $registroestanque->save();

                        $bitacora->fecha=$date;
                        $bitacora->save();

                    }
                });
            }
            catch(QueryException $ex){
                return redirect('/sgtepetate/inventario/categoria/')->withErrors(['error' => 'ERROR: No se pudo guardar el registro!']);
            }

        return redirect('/sgtepetate/inventario/categoria/'.$inventario->categoria);
    }

    public function addinventario($id)
    {
        Gate::authorize('haveaccess','GestionInventario.addinventario');
        $categoria = Categoria::findOrFail($id);
        $unidades = Unidadmedida::get();
        return view ('gestor.gestionInventario.createInventario',['id'=>$id,'unidades'=>$unidades,'categoria'=>$categoria]);
    }
    public function storeinventario($id){
        Gate::authorize('haveaccess','GestionInventario.storeinventario');
        // dd($request);
        $data=request()->validate([
            'nombre'=>'required|max:50',
            'descripcion'=>'nullable|max:250',
            'unidadmedida'=>'required'
        ]);
        
        $unidadmedidaId=Unidadmedida::where('abreviatura',request('unidadmedida'))->first();

        $inventario=new Inventario();
        $inventario->nombre=request('nombre');
        $inventario->descripcion=request('descripcion');
        $inventario->categoria=$id;
        $inventario->unidadMedida=$unidadmedidaId->idUnidadMedida;
        $inventario->cantidad=0;

        $inventario->save();
        return redirect('/sgtepetate/inventario/categoria/'.$id);
    }

    public function destroyinventario($id)
    {
        Gate::authorize('haveaccess','GestionInventario.destroyinventario');
        $inventario=Inventario::findOrFail($id);
        $categoriaid=$inventario->categoria;
        $inventario->delete();
        return redirect('/sgtepetate/inventario/categoria/'.$categoriaid);
    }

    public function editunidad($id)
    {
        Gate::authorize('haveaccess','GestionInventario.storeunidad');
        $unidad = Unidadmedida::find($id);
        return view ('gestor.gestionInventario.editUnidad',['unidad'=>$unidad]);
    }

    public function showunidades(){
        Gate::authorize('haveaccess','GestionInventario.storeunidad');
        $unidades = Unidadmedida::get();
        return view ('gestor.gestionInventario.unidades',['unidades'=>$unidades]);
    }
    public function updateunidad($id)
    {
        Gate::authorize('haveaccess','GestionInventario.storeunidad');
        $data=request()->validate([
            'nombre'=>'nullable|max:50',
            'abreviatura'=>'required|max:10',
            'tipo'=>'required'
        ]);

        $unidad=Unidadmedida::findOrFail($id);
        $unidad->nombre=request('nombre');
        $unidad->abreviatura=request('abreviatura'); 
        $unidad->tipo=request('tipo');
        $unidad->save();
        return redirect('/sgtepetate/inventario/editarUnidades');
    }

    public function storeunidad($id){
        Gate::authorize('haveaccess','GestionInventario.storeunidad');
        // dd($request);
        $data=request()->validate([
            'nombre'=>'nullable|max:50|unique:unidadmedida',
            'abreviatura'=>'required|max:10|unique:unidadmedida',
            'tipo'=>'required'
        ]);
        $unidad=new Unidadmedida();
        $unidad->nombre=request('nombre');
        $unidad->abreviatura=request('abreviatura');
        $unidad->tipo=request('tipo');
        $unidad->save();
        return redirect()->back();
    }
}
