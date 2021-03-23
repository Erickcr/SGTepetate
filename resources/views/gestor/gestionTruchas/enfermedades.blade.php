@extends('layouts.menuGestor')

@section('importOwl')
<script src="{{asset('chart.js/dist/Chart.js')}}"></script>
@endsection

@section('menu')
    <a href="/sgtepetate/gestionTruchas" class="textoTitulosSeccion">
      Gestión Truchas
    </a>/
    <a href="#" class="textoTitulosSeccion">
      Enfermedades
    </a>
@endsection


@section('contenido')
<div class="row">
    @php  //inicializar arreglo del año 
    $sumaEnfermedadesAn=[
        '01'=>0,
        '02'=>0,
        '03'=>0,
        '04'=>0,
        '05'=>0,
        '06'=>0,
        '07'=>0,
        '08'=>0,
        '09'=>0,
        '10'=>0,
        '11'=>0,
        '12'=>0
    ];
    @endphp
    @foreach ($bitacora as $bitacora) 
            {{-- sacar el mes del registro --}}
            @php
            $mes = date('m', strtotime($bitacora->fecha));
            $year = date('Y', strtotime($bitacora->fecha));
            // {{-- hacer suma total de muertes por mes --}}
            if($year == date("Y"))
            $sumaEnfermedadesAn[$mes]+=1;
            @endphp
    @endforeach

    @php
    $cont=1;
    foreach ($enfermedadesTop as $top){
        if($cont==1){
                $enfermedad1=$top->total;
                $enfermedad1TXT=$top->enfermedad;
            }
            if($cont==2){
                $enfermedad2=$top->total;
                $enfermedad2TXT=$top->enfermedad;
            }
            else{
                $enfermedad3=$top->total;
                $enfermedad3TXT=$top->enfermedad;
            }
            $cont++;
    }  

    foreach ($nombreEnfermedad as $name){
        if($name->idEnfermedad==$enfermedad1TXT){
            $enfermedad1TXT=$name->nombre;
        }
        if($name->idEnfermedad==$enfermedad2TXT){
            $enfermedad2TXT=$name->nombre;
        }
        if($name->idEnfermedad==$enfermedad3TXT){
            $enfermedad3TXT=$name->nombre;
        }
    }
    @endphp
    


    <div class="btnAproximacion noresponsiveA">
        <a href="/sgtepetate/gestionTruchas/AproximaciónDiagnostico" class="btn btn-success btn-icon-split AD" style="display: flex; align-items:center;">
            <span class="icon text-white-50 icon-Aproximacion" >
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">
                Aproximación de diagnóstico
            </span>
        </a>
    </div>

    
    <div class="btnAproximacion responsiveA">
        <a href="#" class="btn btn-success btn-icon-split AD" style="display: flex; align-items:center;">
            <span class="text">
                Aproximación de diagnóstico
            </span>
        </a>
    </div>
    

    <!-- Area Chart -->
        <div class="card  mb-4 contenido-AP">
            <div class="card-body" style="display: flex; flex-wrap: wrap; justify-content:space-between">
                <div class="chart-containerEnfermedades" >
                    <canvas id="line-chart"></canvas>
                </div>
                <script>
                    var sumaEnfermedadesAn=<?php echo json_encode($sumaEnfermedadesAn); ?>;
                    new Chart(document.getElementById("line-chart"), {
                    type: 'line',
                        data: {
                                labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                                datasets: [{ 
                                    data: [sumaEnfermedadesAn['01'],sumaEnfermedadesAn['02'],sumaEnfermedadesAn['03'],sumaEnfermedadesAn['04'],sumaEnfermedadesAn['05'],sumaEnfermedadesAn['06'],
                                            sumaEnfermedadesAn['07'],sumaEnfermedadesAn['08'],sumaEnfermedadesAn['09'],sumaEnfermedadesAn['10'],sumaEnfermedadesAn['11'],sumaEnfermedadesAn['12']
                                    ],
                                    label: "# Enfermedades",
                                    borderColor: "#207558",
                                    fill: false
                                    }]
                            },
                            options: {
                                title: {
                                display: true,
                                text: 'Índice de enfermedades del año en curso'},
                                maintainAspectRatio:false,
                                responsive:true
                            }
                    });
                </script>


                <div class="chart-containerEnfermedades" >
                    <canvas id="doughnut-chart"></canvas>
                </div>
                <script>
                    var enfermedad1=<?php echo json_encode($enfermedad1); ?>;
                    var enfermedad2=<?php echo json_encode($enfermedad2); ?>;
                    var enfermedad3=<?php echo json_encode($enfermedad3); ?>;
                    var enfermedad1TXT=<?php echo json_encode($enfermedad1TXT); ?>;
                    var enfermedad2TXT=<?php echo json_encode($enfermedad2TXT); ?>;
                    var enfermedad3TXT=<?php echo json_encode($enfermedad3TXT); ?>;

                    new Chart(document.getElementById("doughnut-chart"), {
                    type: 'doughnut',
                    data: {
                    labels: [enfermedad1TXT, enfermedad2TXT,enfermedad3TXT],
                    datasets: [
                        {
                        label: "$",
                        backgroundColor: ["#507f85", "#2d2731","#01153a"],
                        data: [enfermedad1,enfermedad2,enfermedad3]
                        }
                    ]
                    },
                    options: {
                    title: {
                        display: true,
                        text: 'Enfermedades más frecuentes' 
                    },
                    maintainAspectRatio:false,
                    responsive:true
                    }
                });
                </script>
                
            </div>
        </div>
    




      





</div>
@endsection