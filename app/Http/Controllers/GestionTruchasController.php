<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estanque;
use App\Sintoma;
use App\Enfermedad;
use App\Conteo;
use App\Bitacora;
use App\Registroestanque;
use App\Actividad;
use App\Registroactividad; 
use App\Tipomovimiento;
use App\Inventario;
use App\Categoria;
use App\Unidadmedida;
use App\Sintomasenfermedad;
use Auth;
use App\ModificacionInventario;
use Carbon\Carbon;

class GestionTruchasController extends Controller
{
    //vista general (num estanque, nombre y num peces)
    public function index()  
    {
        $estanques = Estanque::orderBy('idEstanque','desc')->get(); //imprimir los estanques

        $estanque9 = Estanque::find(9);
        $estanque9->relacionEstanqueBitacora()->get();
        $estanque9si = $estanque9->relacionEstanqueBitacora()->orderBy('fecha','desc')->first();
        $conteo9 = Conteo::find($estanque9si->idBitacora);

        $estanque8 = Estanque::find(8);
        $estanque8->relacionEstanqueBitacora()->get();
        $estanque8si = $estanque8->relacionEstanqueBitacora()->orderBy('fecha','desc')->first();
        $conteo8 = Conteo::find($estanque8si->idBitacora);

        $estanque7 = Estanque::find(7);
        $estanque7->relacionEstanqueBitacora()->get();
        $estanque7si = $estanque7->relacionEstanqueBitacora()->orderBy('fecha','desc')->first();
        $conteo7 = Conteo::find($estanque7si->idBitacora);

        $estanque6 = Estanque::find(6);
        $estanque6->relacionEstanqueBitacora()->get();
        $estanque6si = $estanque6->relacionEstanqueBitacora()->orderBy('fecha','desc')->first();
        $conteo6 = Conteo::find($estanque6si->idBitacora);

        $estanque5 = Estanque::find(5);
        $estanque5->relacionEstanqueBitacora()->get();
        $estanque5si = $estanque5->relacionEstanqueBitacora()->orderBy('fecha','desc')->first();
        $conteo5 = Conteo::find($estanque5si->idBitacora);

        $estanque4 = Estanque::find(4);
        $estanque4->relacionEstanqueBitacora()->get();
        $estanque4si = $estanque4->relacionEstanqueBitacora()->orderBy('fecha','desc')->first();
        $conteo4 = Conteo::find($estanque4si->idBitacora);

        $estanque3 = Estanque::find(3);
        $estanque3->relacionEstanqueBitacora()->get();
        $estanque3si = $estanque3->relacionEstanqueBitacora()->orderBy('fecha','desc')->first();
        $conteo3 = Conteo::find($estanque3si->idBitacora);

        $estanque2 = Estanque::find(2);
        $estanque2->relacionEstanqueBitacora()->get();
        $estanque2si = $estanque2->relacionEstanqueBitacora()->orderBy('fecha','desc')->first();
        $conteo2 = Conteo::find($estanque2si->idBitacora);

        $estanque1 = Estanque::find(1);
        $estanque1->relacionEstanqueBitacora()->get();
        $estanque1si = $estanque1->relacionEstanqueBitacora()->orderBy('fecha','desc')->first();
        $conteo1 = Conteo::find($estanque1si->idBitacora);


        $actividades= Actividad::get();
        $tipomovimiento=Tipomovimiento::get();
        $unidadmedida=Unidadmedida::get();
        $idCategoria=Categoria::where('nombre','alimento')->find(1);
        $inventario=Inventario::where('categoria',$idCategoria->idCategoria)->get();
        $enfermedades=Conteo::select('causaMuerte')->orderBy('causaMuerte','ASC')->distinct()->get();
        $allInventario=Inventario::get();
        return view ('gestor.gestionTruchas.gestionTruchas',['estanques'=>$estanques,'conteo9'=>$conteo9,'conteo8'=>$conteo8,
        'conteo7'=>$conteo7,'conteo6'=>$conteo6,'conteo5'=>$conteo5,'conteo4'=>$conteo4,'conteo3'=>$conteo3,'conteo2'=>$conteo2,
        'conteo1'=>$conteo1, 'actividades'=>$actividades,'enfermedades'=>$enfermedades, 'tipomovimiento'=>$tipomovimiento, 'inventario'=>$inventario,'unidadmedida'=>$unidadmedida, 'allInventario'=>$allInventario]);
    }

    //Datos especificos por estanque
     public function indexEstanque($id){
         $estanqueESP = Estanque::find($id);  //estanque especifico
         $estanqueESP->relacionEstanqueBitacora()->get();
         $estanqueESPF = $estanqueESP->relacionEstanqueBitacora()->orderBy('fecha','desc')->first();
         $conteoESP = Conteo::find($estanqueESPF->idBitacora);
         return view ('gestor.gestionTruchas.gestionTruchas',['estanqueESP'=>$estanqueESP,'conteoESP'=>$conteoESP]);
    }

    //SINTOMAS
    public function indexSintomas(){
        $sintomas = Sintoma::orderBy('nombre','asc')->get();
        return view ('gestor.gestionTruchas.aproximacionDiagnostico',['sintomas'=>$sintomas]);
    }

    //RESULTADOS DE ENFERMEDADES
    public function indexResultados(Request $request){
        $data=$request->validate([ 
            'sintomas'=>'required'
        ]);
        $i=0;
        /*arrEnfermedad  guardará el nombre de la enfermedad y el número de incidencias de las veces que coincidio*/
        $numEnfermedades=Enfermedad::select('idEnfermedad')->orderBy('idEnfermedad','ASC')->get();
        $contArr=1;
        $arrEnfermedad=[];
        foreach($numEnfermedades as $num){
            $arrEnfermedad[$contArr]=0;
            $contArr ++;
        }
        foreach($request->sintomas as $sintoma)
        {
            $resultados=Sintomasenfermedad::where('idSintoma',$request->sintomas[$i])->get();
            //dd($resultado[2]->idEnfermedad);
            if($resultados!=null){
                foreach($resultados as $resultado)
                {
                    //revisar resultado; si no existe se va a aguardar el id de la enfermedad y en concurrencias se le pondrá "1"
                    //si si existe sumarle uno a la concurrencia en la posición específica
                    $arrEnfermedad[$resultado->idEnfermedad] ++;
                }
            }
            $i++;
        }
        $max=0;
        foreach($arrEnfermedad as $arr){
            if($arr>$max){
                $max=$arr;
            }
        }
        $i=1;
        $j=1;
        $arrEFinal=[];
        foreach($arrEnfermedad as $arr2){
            if($arr2==$max){
                $arrEFinal[$j]=$i;
                $j++;
            }
            $i++;
        }
        $enfermedades=Enfermedad::whereIn('idEnfermedad',$arrEFinal)->get();
        $sintomas = Sintoma::orderBy('nombre','asc')->get();
        $relacionSE = Sintomasenfermedad::get();
        $sintomaENF = Sintomasenfermedad::whereIn('idEnfermedad',$arrEFinal)->get();
        // dd($sintomaENF);

        return view ('gestor.gestionTruchas.aproximacionDiagnosticoResultado',['sintomaENF'=>$sintomaENF,'arrEFinal'=>$arrEFinal,'sintomas'=>$sintomas,'enfermedades'=>$enfermedades,'relacionSE'=>$relacionSE]);
    }

    public function indexMortalidad(){
        $muertes = Conteo::select('causaMuerte', Conteo::raw('SUM(pecesMuertos) as total'))->groupBy('causaMuerte')->get();
                 
        //sacando los registros del conteo que SI, registran muertes y causas
        $conteoM = Conteo::select('idBitacora','pecesMuertos')->where('pecesMuertos','>','0')->get();
        // dd($conteoM);
        $bitacora = Bitacora::find($conteoM); //en los registros de bitacora se encuentra la fecha del registro de muerte
        
        $fechaCarbon = Carbon::now()->format('y');
        return view ('gestor.gestionTruchas.mortalidad',['muertes'=>$muertes,$fechaCarbon,'bitacora'=>$bitacora,'conteoM'=>$conteoM ]);
    }

    public function indexEnfermedades(){
        $bitacoraEnf = Bitacora::select('idBitacora')->where('enfermedad','>','0')->get();
        $bitacora = Bitacora::find($bitacoraEnf);
        $enfermedadesTop = Bitacora::select('enfermedad', Bitacora::raw('COUNT(enfermedad) as total'))->groupBy('enfermedad')->where('enfermedad','>','0')->orderByDesc('total')->limit(3)->get();
        $nombreEnfermedad = Enfermedad::select('idEnfermedad','nombre')->get();

        return view ('gestor.gestionTruchas.enfermedades',['bitacora'=>$bitacora,'enfermedadesTop'=>$enfermedadesTop,'nombreEnfermedad'=>$nombreEnfermedad]);
    }

    public function archivarEnfermedad(){
        $bitacora = new Bitacora();
        $bitacora->usuario=Auth::id();
        $bitacora->fecha=Carbon::now()->toDateTimeString();
        $bitacora->descripcion='Registro de enfermedad (Aproximación)';
        $enfermedad=Enfermedad::where('nombre', request('nombreEnf'))->first()->idEnfermedad;
        $bitacora->enfermedad=$enfermedad;
        $bitacora->vigente=1;

        $bitacora->save();

        $registroActividad = new Registroactividad();
        $registroActividad->idBitacora = $bitacora->idBitacora;
        $registroActividad->idActividad = Actividad::where('nombre', 'Registro trucha enferma')->first()->idActividad;
        $registroActividad->save();

        return redirect('/sgtepetate/gestionTruchas/AproximaciónDiagnostico');
    }

    public function ingresoConteoTruchas(){
       
        $data=request()->validate([
            "Fecha" => 'required|date'
        ]);
        $date = str_replace('T', ' ', request('Fecha'));

        $bitacora = new Bitacora();
        $bitacora->usuario=Auth::id();
        $bitacora->fecha=$date;
        $bitacora->descripcion='Conteo desde apartado truchas al estanque: '.request('estanqueID');
        $bitacora->vigente=1;

        $bitacora->save();

        
        $conteo = new Conteo();
        $conteo->idBitacora =$bitacora->idBitacora;
        $conteo->observaciones = request('observaciones1');
        $conteo->numeroDePeces = request('numpeces1');
        $conteo->longitud = request('longpeces1');
        $conteo->peso = request('pesopeces1');

        if(request('numPecesMuertos1')){
            $conteo->pecesMuertos = request('numPecesMuertos1');
            $conteo->causaMuerte = request('CausaMuerte1');
        }
        $conteo->save(); 

        $registroEstanque = new Registroestanque();
        $registroEstanque->bitacora = $bitacora->idBitacora;
        $registroEstanque->estanque =request('estanqueID');
        $registroEstanque->save();

        $registroActividad = new Registroactividad();
        $registroActividad->idBitacora = $bitacora->idBitacora;
        $registroActividad->idActividad = Actividad::where('nombre', 'conteo')->first()->idActividad;
        $registroActividad->save();

        return redirect('/sgtepetate/gestionTruchas');

    }

    public function ingresoAlimentoTruchas(){
        $data=request()->validate([
            "fechaAlimentacion" => 'required|date'
        ]);
        $date = str_replace('T', ' ', request('fechaAlimentacion'));


        if(request('cantDiasProg')){

            $numdias=request('cantDiasProg');

            for($i=0; $i<$numdias; $i++){
                $bitacora = new Bitacora();
                $bitacora->usuario=Auth::id();
                $bitacora->fecha=$date;
                $inventario=Inventario::findOrFail(request('tipoAlimento')+1);
                $bitacora->descripcion='Programación de alimentación de truchas al estanque: '.request('estanqueID2').' alimento: '.$inventario->nombre.' Cantidad: '.request('cantidadAlimento').' '.$inventario->rel_unidad->abreviatura;
                $bitacora->vigente=0;
                $bitacora->save();

                $inventarioAModificar= new ModificacionInventario();
                $inventarioAModificar->bitacora=$bitacora->idBitacora;
                $inventarioAModificar->inventario=request('tipoAlimento')+1;
                $inventarioAModificar->tipo='salida';
                $inventarioAModificar->cantidad=request('cantidadAlimento');
                $inventarioAModificar->save();

            }

        }
        else{
            $bitacora = new Bitacora();
            $bitacora->usuario=Auth::id();
            $bitacora->fecha=$date;
            $bitacora->descripcion='Alimentación de truchas al estanque: '.request('estanqueID2');
            $bitacora->vigente=1;

            $bitacora->save();

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
        return redirect('/sgtepetate/gestionTruchas');
    }
}