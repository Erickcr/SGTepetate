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
            <form  action="#">
                @csrf
                <div class="div_sintomas">
                    <p class="txt-tituloS">Síntomas</p>
                    <div class="listaSintomas">
                        @foreach($enfermedades as $e)
                            <p style="font-weight:bold">{{$e->nombre}}</p>
                        @foreach($e->relacionSintomaEnfermedad as $sintomas)
                            <p class="sintomaSingle">{{$sintomas->nombre}}</p>
                        @endforeach
                        @endforeach
                        
                       
                    </div>
                    <div class="textoAclaracion" style="margin-top: 8%; color:#207558">
                        <p><i>El diagnóstico que se presenta es sólo una aproximación basada en datos proporcionados por la granja de truchas El Tepetate. Si el problema persiste es recomendable acudir con expertos.</i></p>
                    </div>
                    <div href="/sgtepetate/gestionTruchas/AproximaciónDiagnostico" class="btn-consultarDiagnostico">
                        <input type="submit" name="consultar" class="btn btn-success btn-icon-split AD" value="Regresar" style="display: flex; align-items:center; border-radius:2px; padding:6px; width:100%">
                    </div>
                </div>
            </form> 
            
            
            {{-- RESULTADOS --}}
            <form method="POST" action="/sgtepetate/gestionTruchas/AproximaciónDiagnostico/Archivar" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="div_diagnostico">
                    <div class="diagnostivo-txt">
                        <p id="nombreEnfermedad">Resultados: <b>{{$enfermedades[0]->nombre}}</b></p>
                        <input id="nombreEnfermedad2" style="display:none" name="nombreEnf" value="{{$enfermedades[0]->nombre}}" readonly>
                        {{-- Si hay más de un resultado --}}
                    
                        <p style="font-size:14px">Resultado(s):
                            @php
                            $i=0;   
                            @endphp

                            {{-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                        @foreach ($enfermedades as $enfermedad)  
                            {{-- foreach de cada uno de los resultados --}}
                            {{-- cuando se le de click al otro resultado, poner el que estaba cargado como opción --}}
                            <a href="#" onclick="cambiar('{{$enfermedades}}',{{$i}},{{$sintomaENF}})">Enfermedad {{$i+1}}    &nbsp;</a>
                            @php
                            $i++;   
                            @endphp
                        @endforeach
                        </p>
                    </div>
                    <div class="resultadoDiagnostico" style="height:380px; padding:10px;">
                        <p id="descripcionEnfermedad" style="text-align: justify">
                            {{$enfermedades[0]->descripcion}}
                        </p>
                    </div>
                    <div class="diagnostivo-txt"  style="height: 50px;">
                        <p>Tratamiento</p>
                    </div>
                    <div class="resultadoTratamiento">
                        <p id="tratamientoEnfermedad">
                            {{$enfermedades[0]->tratamiento}}
                        </p>
                    </div>
                    

                    <div class="ArchivarConsulta shadow">
                        <input type="submit" value="Archivar consulta"class="btn btn-success btn-icon-split "style="display: flex; align-items:center; border:solid #7bcbc2 .1rem ; border-radius=0px; background-color:#7bcbc2; padding:6%">
                    </div>
                    {{-- TEMPORAL --}}
                    
                </div>
            </form>
            
        </div>
    </div>
</div>

{{-- Consultar los diferentes resultados de las enfermedades --}}
<script type="text/javascript"> 
     function cambiar($enfermedades, $i, $sintomas){ 
        var app = @json($enfermedades);
            document.getElementById("nombreEnfermedad").innerHTML="Resultados: "+app[$i]['nombre'];
            document.getElementById("nombreEnfermedad2").value=app[$i]['nombre'];
            document.getElementById("descripcionEnfermedad").innerHTML=app[$i]['descripcion'];
            document.getElementById("tratamientoEnfermedad").innerHTML=app[$i]['tratamiento'];
        var app2 = @json($sintomas);
            // alert(app2[0]['idSintoma']);
        }
</script>





@endsection