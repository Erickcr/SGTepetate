@extends('layouts.menuGestor')


@section('menu')
    <a href="/sgtepetate/gestionTruchas" class="textoTitulosSeccion">
        Gestión Truchas
    </a>/
    <a href="/sgtepetate/gestionTruchas/Enfermedades" class="textoTitulosSeccion">
        Enfermedades
    </a>/
    <a href="/sgtepetate/gestionTruchas/AproximaciónDiagnostico" class="textoTitulosSeccion">
        Aproximación de Diagnóstico 
    </a>
@endsection

@section('contenido')

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="row">
    <div class="card mb-4 contenido-AP">
        <div class="card-body">
            {{-- SINTOMAS --}}
            <form method="POST" action="/sgtepetate/gestionTruchas/AproximaciónDiagnostico">
                @csrf
                <div class="div_sintomas">
                    <p class="txt-tituloS">Síntomas</p>
                    <div class="listaSintomas">
                        {{-- foreach de sintomas --}}
                        @foreach($sintomas as $sintoma)
                         
                        <input type="checkbox" name="sintomas[]" value="{{$sintoma->idSintoma}}" id='{{$sintoma->nombre}}'/>
                            <label class="sintomaSingle" for="{{$sintoma->nombre}}" >
                                {{$sintoma->nombre}}
                                <span class="fa-stack">
                                    <i class="fa fa-square-o fa-stack-1x"></i>
                                    <i class="fa fa-check fa-stack-1x"></i>
                                </span>
                            </label>
                        
                        @endforeach
                        
                       
                    </div>
                    <div class="textoAclaracion" style="margin-top: 8%; color:#207558">
                        <p><i>El diagnóstico que se presenta es sólo una aproximación basada en datos proporcionados por la granja de truchas El Tepetate. Si el problema persiste es recomendable acudir con expertos.</i></p>
                    </div>
                    <div class="btn-consultarDiagnostico">
                        <input type="submit" name="consultar" class="btn btn-success btn-icon-split AD" value="Consultar" style="display: flex; align-items:center; border-radius:2px; padding:6px; width:100%">
                    </div>
                </div>
            </form>
            
            {{-- RESULTADOS --}}
            <div class="div_diagnostico">
                <div class="diagnostivo-txt" >
                    <p>Resultados: <b></b></p>
                    {{-- Si hay más de un resultado --}}
                    <p style="font-size:14px">
                        {{-- foreach de cada uno de los resultados --}}
                        {{-- cuando se le de click al otro resultado, poner el que estaba cargado como opción --}}
                        <a href="#"></a>
                    </p>
                </div>
                <div class="resultadoDiagnostico" style="height:380px">
                    <p style="text-align: justify">
                    </p>
                </div>
                <div class="diagnostivo-txt" style="height: 50px;">
                    <p>Tratamiento</p>
                </div>
                <div class="resultadoTratamiento">
                    <p>
                    </p>
                </div>
                
            </div>
            
        </div>
    </div>
</div>

@endsection