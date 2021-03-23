@extends('layouts.menuGestor')

@section('importOwl')
<script src="{{asset('chart.js/dist/Chart.js')}}"></script>
@endsection

@section('menu')
    <a href="/sgtepetate/gestionTruchas" class="textoTitulosSeccion">
      Gestión Truchas
    </a>/
    <a href="#" class="textoTitulosSeccion">
      Mortalidad
    </a>
@endsection


@section('contenido')
<div class="row">
    @php  //inicializar arreglo del año 
        $sumaMuertesAn=[
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
        @foreach ($conteoM as $conteoPeces) 
                {{-- sacar el mes del registro --}}
                @php
                $mes = date('m', strtotime($conteoPeces->relacionConteoBitacora->fecha));
                $year = date('Y', strtotime($conteoPeces->relacionConteoBitacora->fecha));
                // {{-- hacer suma total de muertes por mes --}}
                if($year == date("Y"))
                $sumaMuertesAn[$mes]+=$conteoPeces->pecesMuertos;
                @endphp
        @endforeach

    <!-- Area Chart -->
        <div class="card  mb-4 contenido-AP">
            <div class="card-body" style="display: flex; flex-wrap: wrap; justify-content:space-between">
                <div class="chart-containerEnfermedades" >
                    <canvas id="line-chart"></canvas>
                </div>
                <script>
                    var sumaMuertesAn=<?php echo json_encode($sumaMuertesAn); ?>;
                    new Chart(document.getElementById("line-chart"), {
                    type: 'line',
                        data: {
                                labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                                datasets: [{ 
                                    data: [sumaMuertesAn['01'],sumaMuertesAn['02'],sumaMuertesAn['03'],sumaMuertesAn['04'],sumaMuertesAn['05'],sumaMuertesAn['06'],
                                            sumaMuertesAn['07'],sumaMuertesAn['08'],sumaMuertesAn['09'],sumaMuertesAn['10'],sumaMuertesAn['11'],sumaMuertesAn['12']
                                    ],
                                    label: "# Muertes",
                                    borderColor: "#207558",
                                    fill: false
                                    }]
                            },
                            options: {
                                title: {
                                display: true,
                                text: 'Índice de mortalidad del año en curso'},
                                maintainAspectRatio:false,
                                responsive:true
                            }
                    });
                </script>
                

                <div class="table-responsive mortalidadTable" style="height: 380px; overflow-y:scroll;">
                    <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th style="background-color: #207558; color:white">Causas de muerte</th>
                            <th style="background-color: #646464; color:white">Total de muertes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($muertes as $muertes)
                                <tr>
                                <td>{{$muertes->causaMuerte}}</td>
                                <td>{{$muertes->total}}</td>
                                </tr>    
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                        


                
                
            </div>
        </div>
    




      





</div>
@endsection