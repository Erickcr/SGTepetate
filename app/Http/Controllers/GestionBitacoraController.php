<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bitacora;
use App\Actividad;
use App\Registroactividad; 
use App\Tipomovimiento;
use App\Enfermedad;
use App\Inventario;
use App\Categoria;
use App\Unidadmedida;
use App\Conteo;
use App\Registroestanque;
use App\MovFinanciero;
use App\ModificacionInventario;
use App\Estanque;
use Auth;
use Illuminate\Database\QueryException;
use DateTime;
use Carbon;
class GestionBitacoraController extends Controller
{
    
    public function __construct(){
    $this->middleware('auth');
    }
 
    public function index(){
        $bitacoras= Bitacora::where('vigente','1')->get();
        return view('gestor.gestionBitacora.gestionBitacora',['bitacoras'=>$bitacoras]);
    }

    public function tareasPendientes(){
        $bitacoras= Bitacora::where('vigente','0')->get();
        return view('gestor.gestionBitacora.gestionTareas',['bitacoras'=>$bitacoras]);
    }

    public function deleteTarea(Request $request){
        $id=$request->tmid;

        $tarea=Bitacora::findOrFail($id);
        $tarea->delete();
        return redirect('/sgtepetate/gestionTareasPendientes');
    }

    public function updateTarea(Request $request){
        
            \DB::transaction(function() use ($request)
            {
                try{
                $id=$request->tmid;
                $tarea=Bitacora::findOrFail($id);
                $tarea->vigente=1;
                $tarea->fecha=Carbon\Carbon::now()->toDateTimeString();
                $tarea->save();

                $registroActividad=new Registroactividad();
                $registroActividad->idBitacora=$tarea->idBitacora;
                $registroActividad->idActividad=Actividad::where('nombre','Alimentar truchas')->first()->idActividad;
                $registroActividad->save();

                
                $modificacionInventario=Modificacioninventario::findOrFail($tarea->idBitacora);
                $inventario=Inventario::findOrFail($modificacionInventario->inventario);
                if($inventario->cantidad>=$modificacionInventario->cantidad){
                    $inventario->cantidad=$inventario->cantidad-$modificacionInventario->cantidad;
                    $inventario->save();
                }
                else{
                    \DB::rollback();
                    return back()->withErrors(['error' => 'ERROR: No se cuenta con la cantidad de alimento necesaria para completar la tarea.']);
                }
                return back();
                }
                catch(QueryException $ex){
                    return back()->withErrors(['error' => 'ERROR: No se pudo guardar la bitácaora!']);
                }
            });
            return back();
    }

    public function newBit(){
        $actividades= Actividad::get();
        $tipomovimiento=Tipomovimiento::get();
        $enfermedades=Enfermedad::get();
        $unidadmedida=Unidadmedida::get();
        $idCategoria=Categoria::where('nombre','alimento')->find(1);
        $inventario=Inventario::where('categoria',$idCategoria->idCategoria)->get();
        $allInventario=Inventario::get();
        return view('gestor.gestionBitacora.nuevaBitacora',['actividades'=>$actividades, 
        'tipomovimiento'=>$tipomovimiento, 'enfermedades'=>$enfermedades, 'inventario'=>$inventario, 
        'unidadmedida'=>$unidadmedida, 'allInventario'=>$allInventario]);
    }

    public function storeBitacora(){
        $data=request()->validate([
            'descripcionBit'=>'required',
            'activPerson'=>'nullable',
            'numPeces' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'peso' => 'nullable|numeric',
            'observaciones'=>'nullable|max:250',
            'estanqueConteo'=>'nullable|numeric',
            'numPecesMuertos' => 'nullable|numeric',
            'CausaMuerte' => 'nullable',
            'tipoMovimiento' => 'nullable',
            'concepto' => 'nullable',
            'monto' => 'nullable|numeric',
            "notas" => 'nullable|max:250',
            "fecha" => 'required|date',
            "estanque" => 'nullable|numeric',
            "tipoAlimento" => 'nullable',
            "cantidadAlimento" => 'nullable|numeric',
            "itemsInventario" => 'nullable',
            "cantidad" => 'nullable|numeric',
            "enfermedad" => 'nullable',
            "operacionInvent"=>'nullable',
            
        ]);
        try{
            \DB::transaction(function()
            {
                //$date = DateTime::createFromFormat('Y-m-d\Th:i', request('fecha'));

                $date = str_replace('T', ' ', request('fecha'));

                $bitacora = new Bitacora();
                $bitacora->usuario=Auth::id();
                $bitacora->fecha= $date;
                $bitacora->descripcion=request('descripcionBit');
                $bitacora->vigente=1;
                
                $bitacora->save();
                
                
                if(request('activPerson'))
                {
                    $registroActividad = new Registroactividad();
                    $registroActividad->idBitacora = $bitacora->idBitacora;
                    $registroActividad->idActividad = Actividad::where('nombre', request('activPerson'))->first()->idActividad;
                    $registroActividad->save();
                    
                }
                if(request('numPeces'))
                {
                    $conteo = new Conteo();
                    $conteo->idBitacora =$bitacora->idBitacora;
                    $conteo->observaciones = request('observaciones');
                    $conteo->numeroDePeces = request('numPeces');
                    $conteo->longitud = request('longitud');
                    $conteo->peso = request('peso');

                    if(request('numPecesMuertos')){
                        $conteo->pecesMuertos = request('numPecesMuertos');
                        $conteo->causaMuerte = request('CausaMuerte');
                    }
                    $conteo->save(); 
                    $registroEstanque = new Registroestanque();
                    $registroEstanque->bitacora = $bitacora->idBitacora;
                    $registroEstanque->estanque =request('estanqueConteo');
                    $registroEstanque->save();

                    $registroActividad = new Registroactividad();
                    $registroActividad->idBitacora = $bitacora->idBitacora;
                    $registroActividad->idActividad = Actividad::where('nombre', 'conteo')->first()->idActividad;
                    $registroActividad->save();
                }
                if(request('tipoMovimiento')){

                    $movFinanciero = new MovFinanciero();
                    $movFinanciero->monto = request('monto');
                    $movFinanciero->concepto = request('notas');
                    $movFinanciero->tipoMovimiento = request('concepto'); 
                    $movFinanciero->save();
                    
                    if(request('tipoMovimiento')=='Ingreso'){
                        $actividad=Actividad::where('nombre','Mov Financiero - Ingreso')->first();
                    }
                    else{
                        $actividad=Actividad::where('nombre','Mov Financiero - Egreso')->first();
                    }
            
                    $registroactividad=new Registroactividad();
                    $registroactividad->idActividad=$actividad->idActividad;
                    $registroactividad->idBitacora=$bitacora->idBitacora;
                    $registroactividad->save();

                    $bitacora->movFinanciero = $movFinanciero->idMovFinanciero;
                    $bitacora->save();
                }
                if(request('tipoAlimento')){
                    $cantidadActual = Inventario::findOrFail(request('tipoAlimento')+1);
                    $cantidad = $cantidadActual->cantidad;
                    
                    $alimentarTrucha = Inventario::findOrFail(request('tipoAlimento')+1);
                    $alimentarTrucha->cantidad = $cantidad-request('cantidadAlimento');
                    $alimentarTrucha->save();

                    $registroActividad = new Registroactividad();
                    $registroActividad->idBitacora = $bitacora->idBitacora;
                    $registroActividad->idActividad = Actividad::where('nombre', 'Alimentar truchas')->first()->idActividad;
                    $registroActividad->save();
                }

                if(request('itemsInventario')){
                    $inventario=Inventario::findOrFail(request('itemsInventario')+1);
                    
                    if(request('operacionInvent')=='resta'){
                    
                        $nuevaCantidad=($inventario->cantidad)-request('cantidad');
                        $tipo="Salida";
                        $actividad=Actividad::where('nombre','Egreso de inventario')->first();
                    }
                    else{
                    
                        $nuevaCantidad=($inventario->cantidad)+request('cantidad');
                        $actividad=Actividad::where('nombre','Ingreso de inventario')->first();
                        $tipo="Entrada";
                    }

                    $inventario->cantidad=$nuevaCantidad;
                    $inventario->save();

                    $registro=new Registroactividad();
                    $registro->idBitacora=$bitacora->idBitacora;
                    $registro->idActividad=$actividad->idActividad;
                    $registro->save();

                    $modificacion=new ModificacionInventario();
                    $modificacion->bitacora=$bitacora->idBitacora;
                    $modificacion->inventario=$inventario->idInventario;
                    $modificacion->tipo=$tipo;
                    $modificacion->cantidad=request('cantidad');
                    $modificacion->save();

                    if($inventario->rel_categoria->nombre=='Productos' && request('operacionInvent')=='suma'){
                        $bitacora->descripcion=request('descripcionBit') .', se restaron peces del estanque 9, se modificó tabla conteo';
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

                        $bitacora->save();
            
                    }
                }

                if(request('enfermedad')){

                    $bitacora->enfermedad = Enfermedad::where('nombre', request('enfermedad'))->first()->idEnfermedad;
                    $bitacora->save();
                    $registroActividad = new Registroactividad();
                    $registroActividad->idBitacora = $bitacora->idBitacora;
                    $registroActividad->idActividad = Actividad::where('nombre', 'Registro trucha enferma')->first()->idActividad;
                    $registroActividad->save();

                }

                $bitacora->fecha=request('fecha');
                $bitacora->save();

            });
        }
        catch(QueryException $ex){
            return redirect('/sgtepetate/gestionBitacora/')->withErrors(['error' => 'ERROR: No se pudo guardar la bitácaora!']);
        }

        return redirect('/sgtepetate/gestionBitacora/');

    }
}