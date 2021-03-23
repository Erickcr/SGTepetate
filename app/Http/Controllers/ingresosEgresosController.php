<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\MovFinanciero;
use Illuminate\Http\Request;
use App\Tipomovimiento;
use App\Bitacora;
use Auth;
use Carbon;
use Illuminate\Support\Facades\Gate;
use App\Exports\MovFinancieroExport;
use App\Registroactividad;

class ingresosEgresosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        Gate::authorize('haveaccess','ingresosEgresos.index');
        $today=Carbon\Carbon::now();
        $movF=MovFinanciero::get();
        return view('gestor.ingresosEgresos.ingresosEgresos',['movF'=>$movF,'today'=>$today]);
    }

    public function indexIngresos(){
        Gate::authorize('haveaccess','ingresosEgresos.indexIngresos');
        $today=Carbon\Carbon::now();
        $movF=MovFinanciero::get();
        return view('gestor.ingresosEgresos.visorIngresos',['movF'=>$movF,'today'=>$today]);
    }

    public function indexEgresos(){
        Gate::authorize('haveaccess','ingresosEgresos.indexEgresos');
        $today=Carbon\Carbon::now();
        $movF=MovFinanciero::get();
        return view('gestor.ingresosEgresos.visorEgresos',['movF'=>$movF,'today'=>$today]);
    }

    public function registrar(){
        Gate::authorize('haveaccess','ingresosEgresos.registrar');
        $tipomovimiento=Tipomovimiento::get();
        return view('gestor.ingresosEgresos.registroIE',['tipomovimiento'=>$tipomovimiento]);
    }

    public function indexHistorial(){
        Gate::authorize('haveaccess','ingresosEgresos.indexHistorial');
        $movF=MovFinanciero::get();
        return view('gestor.ingresosEgresos.historialIE',['movF'=>$movF]);
    }

    public function indexEditar($id){
        Gate::authorize('haveaccess','ingresosEgresos.indexEditar');
        $movF=MovFinanciero::findOrFail($id);
        $tipomovimiento=Tipomovimiento::get();
        return view('gestor.ingresosEgresos.editarRegistroIE',['movF'=>$movF,'tipomovimiento'=>$tipomovimiento]);
    }

    public function updateEditar($id){
        Gate::authorize('haveaccess','ingresosEgresos.updateEditar');
        $data=request()->validate([
            'monto'=>'required|numeric',
            'tipoMovimiento'=>'required',
            'concepto'=>'required',
            'notas'=>'required|max:250',
            'fecha'=>'required|date'
        ]);

        $movfinanciero=MovFinanciero::findOrFail($id);
        $bitacora=Bitacora::where('movFinanciero',$id)->first();

        $movfinanciero->monto=request('monto');
        $movfinanciero->concepto=request('notas');
        $movfinanciero->tipoMovimiento=request('concepto');
        $movfinanciero->save();
        $date = str_replace('T', ' ', request('fecha'));
        $bitacora->fecha=$date;
        $bitacora->descripcion=request('notas');
        $bitacora->save();   
        return redirect('/sgtepetate/ingresos-egresos/historial');
    }

    public function deleteEditar(Request $request){
        Gate::authorize('haveaccess','ingresosEgresos.deleteEditar');
        $id=$request->movfid;

        $movfinanciero=MovFinanciero::findOrFail($id);
        $bitacora=Bitacora::where('movFinanciero',$id)->first();

        $movfinanciero->delete();
        $bitacora->delete();

        return redirect('/sgtepetate/ingresos-egresos/historial');
    }
    public function addRegistro(){
        Gate::authorize('haveaccess','ingresosEgresos.addRegistro');
        $data=request()->validate([
            'monto'=>'required|numeric',
            'tipoMovimiento'=>'required',
            'concepto'=>'required',
            'notas'=>'required|max:250',
            'fecha'=>'required|date'
        ]);

        $movfinanciero=new MovFinanciero();
        $movfinanciero->monto=request('monto');
        $movfinanciero->concepto=request('notas');
        $movfinanciero->tipoMovimiento=request('concepto');
        $movfinanciero->save();

        $movfinancieroReciente=MovFinanciero::orderBy('created_at', 'desc')->first();

        $bitacora=new Bitacora();
        $date = str_replace('T', ' ', request('fecha'));
        $bitacora->fecha=$date;
        $bitacora->usuario=Auth::id();
        $bitacora->movFinanciero=$movfinancieroReciente->idMovFinanciero;
        $bitacora->descripcion=request('notas');
        $bitacora->vigente='1';
        $bitacora->save();
        
        if(request('tipoMovimiento')=='Ingreso'){
            $actividad=Actividad::where('nombre','Mov Financiero - Ingreso')->first();
        }
        else{
            $actividad=Actividad::where('nombre','Mov Financiero - Egreso')->first();
        }
        
        $registroactividad=new Registroactividad();
        $registroactividad->idActividad=$actividad->idActividad;
        $registroactividad->idBitacora=$bitacora->idBitacora;;
        $registroactividad->save();
        
        return redirect('/sgtepetate/ingresos-egresos');
    }

    public function indexConceptos(){
        Gate::authorize('haveaccess','ingresosEgresos.indexConceptos');
        $tipomovimiento=Tipomovimiento::get();
        return view('gestor.ingresosEgresos.visorConceptos',['tipomov'=>$tipomovimiento]);
    }

    public function addConceptos(){
        Gate::authorize('haveaccess','ingresosEgresos.addConceptos');
        return view('gestor.ingresosEgresos.conceptoIE');
    }

    public function createConceptos(){
        Gate::authorize('haveaccess','ingresosEgresos.createConceptos');
        $data=request()->validate([
            'tipoMovimiento'=>'required',
            'nombre'=>'required|max:50|unique:tipomovimiento',
            'descripcion'=>'required|max:250'
        ]);
        $tipomovimiento=new Tipomovimiento();
        $tipomovimiento->egresoIngreso=request('tipoMovimiento');
        $tipomovimiento->nombre=request('nombre');
        $tipomovimiento->descripcion=request('descripcion');
        $tipomovimiento->save();
        return redirect('/sgtepetate/ingresos-egresos/conceptos');
    }

    public function editConceptos($id){
        Gate::authorize('haveaccess','ingresosEgresos.editConceptos');
        $tipomov=Tipomovimiento::findOrFail($id);
        return view('gestor.ingresosEgresos.editarConceptos',['tipomov'=>$tipomov]);
    }

    public function updateConceptos($id){
        Gate::authorize('haveaccess','ingresosEgresos.updateConceptos');
        $data=request()->validate([
            'tipoMovimiento'=>'required',
            'nombre'=>'required|max:50',
            'descripcion'=>'required|max:250'
        ]);
        $tipomovimiento=Tipomovimiento::findOrFail($id);
        $tipomovimiento->egresoIngreso=request('tipoMovimiento');
        $tipomovimiento->nombre=request('nombre');
        $tipomovimiento->descripcion=request('descripcion');
        $tipomovimiento->save();
        return redirect('/sgtepetate/ingresos-egresos/conceptos');

    }

    public function deleteConceptos(Request $request){
        Gate::authorize('haveaccess','ingresosEgresos.deleteConceptos');
        $id=$request->tmid;

        $tipomov=Tipomovimiento::findOrFail($id);
        $tipomov->delete();
        return redirect('/sgtepetate/ingresos-egresos/conceptos');
    }

    public function informe($mes,$anio){
        Gate::authorize('haveaccess','ingresosEgresos.informe');
        return (new MovFinancieroExport($mes,$anio))->download('informeMovFinancieros'.$anio."-".$mes.'.xlsx');
    }
}
