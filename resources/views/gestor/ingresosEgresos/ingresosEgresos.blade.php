@extends('layouts.menuGestor')

@section('importOwl')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<link rel="stylesheet" href="{{asset('css/estilosIE.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection

@section('menu')
<a href="#" class="textoTitulosSeccion">
    Ingresos y Egresos
</a>
@endsection

@section('contenido')
    @php
        $mesSelec=$today->month;
        $añoSelec=$today->year;
        if (isset($_GET['mesSelec']) && isset($_GET['añoSelec']) ) {
            $mesSelec=$_GET['mesSelec'];
            $añoSelec=$_GET['añoSelec'];
        }
    @endphp
    <div class="card shadow mb-4">
        <div class="card-body graficasIE">
            <form class="card-body graficasIE" action="" style="width:100%">
                <div class="chart-containerIE2">
                    <div class="formIE">
                        <p class="txtDatosNR">Mes</p>
                        <select class="selectProductoNR camposNR" name="mesSelec" id="">
                            <option value="01" @php
                                if ($mesSelec=='01') {
                                    echo  'selected';
                                }
                            @endphp  >Enero</option>
                            <option value="02" @php
                                if ($mesSelec=='02') {
                                    echo  'selected';
                                }
                            @endphp >Febrero</option>
                            <option value="03"@php
                                if ($mesSelec=='03') {
                                    echo  'selected';
                                }
                            @endphp >Marzo</option>
                            <option value="04" @php
                                if ($mesSelec=='04') {
                                    echo  'selected';
                                }
                            @endphp>Abril</option>
                            <option value="05" @php
                                if ($mesSelec=='05') {
                                    echo  'selected';
                                }
                            @endphp>Mayo</option>
                            <option value="06" @php
                                if ($mesSelec=='06') {
                                    echo  'selected';
                                }
                            @endphp>Junio</option>
                            <option value="07" @php
                                if ($mesSelec=='07') {
                                    echo  'selected';
                                }
                            @endphp>Julio</option>
                            <option value="08" @php
                                if ($mesSelec=='08') {
                                    echo  'selected';
                                }
                            @endphp>Agosto</option>
                            <option value="09" @php
                                if ($mesSelec=='09') {
                                    echo  'selected';
                                }
                            @endphp>Septiembre</option>
                            <option value="10" @php
                                if ($mesSelec=='10') {
                                    echo  'selected';
                                }
                            @endphp>Octubre</option>
                            <option value="11" @php
                                if ($mesSelec=='11') {
                                    echo  'selected';
                                }
                            @endphp>Noviembre</option>
                            <option value="12" @php
                                if ($mesSelec=='12') {
                                    echo  'selected';
                                }
                            @endphp>Diciembre</option>
                        </select>
                    </div>
                </div>
                <div class="chart-containerIE2">
                    <div class="formIE">
                        <p class="txtDatosNR">Año</p>
                        <select class="selectProductoNR camposNR" name="añoSelec" id="">
                            @php
                                $valor=(int)$añoSelec-5;
                                for ($i=0; $i < 10; $i++) { 
                                    if($i!=5){
                                        echo "<option value='".$valor."'>".$valor."</option>";
                                    }
                                    else {
                                        echo "<option value='".$valor."' selected>".$valor."</option>";
                                    }
                                    $valor=$valor+1;
                                }
                            @endphp
                        </select>
                    </div>
                </div>
                <input class="btn text-white shadhow-sm mb-4" style="background-color: #3e95cd; margin-top:25px" type="submit" value="Buscar">
            </form>
        </div>
        <div class="card-body graficasIE">
            
            <div class="chart-containerIE" style="position: relative;">
                <canvas id="doughnut-chart"></canvas>
            </div>
            <div class="chart-containerIE" style="position: relative;">
                <canvas id="line-chart"></canvas>
            </div>
        </div>
        <div class="card-body">
            <div class="containerLinksIE" style="">
                <a href='/sgtepetate/ingresos-egresos/ver-ingresos' class="linksIEingresos btn shadhow-sm mb-4" >INGRESOS</a>
                <a href='/sgtepetate/ingresos-egresos/ver-egresos' class="linksIEegresos btn  shadhow-sm mb-4">EGRESOS</a>
            </div>
        </div>
        <div class="card-body graficasIE">
            <div class="chart-containerIE2" style="position: relative">
                <p class="informacionIE">Información</p>
                <textarea class="form-control textareaIE " name="" id="informacionIE" cols="30" rows="2" style="background-color: #ffffff" disabled></textarea>
                <a href="{{route('informeIE',[$mesSelec,$añoSelec])}}" class="btn btn-primary btn-icon-split btn-informeIE">
                    <span class="icon text-white-50">
                        <i class="far fa-file-alt"></i>
                    </span>
                    <span class="text textBotonIE">Generar Informe</span>
                </a>
            </div>
            <div class="chart-containerIE2 containerBotonesIE" style="position: relative">
                <a href="/sgtepetate/ingresos-egresos/nuevo-registro" class="btn btn-primary btn-icon-split btn-secundarioIE" style="background-color: #207558; margin-right:5px; margin-top:5px">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text textBotonIE">Registrar Movimiento</span>
                </a>

                <a href='/sgtepetate/ingresos-egresos/historial' class="btn btn-primary btn-icon-split btn-secundarioIE" style="background-color: #3e95cd; margin-left:5px; margin-top:5px; display:flex; justify-content:center; vertical-align:middle">
                    <span class="icon text-white-50">
                        <i class="fas fa-history"></i>
                    </span>
                    <span class="text textBotonIE" >Ver Historial</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <p>*Datos especializados del mes</p>
        </div>
    </div>

@php
 $sumaIng=0;
 $sumaEg=0;   
@endphp

@foreach ($movF as $mf)
    @php
    $monthf = date('m', strtotime($mf->rel_bitacora->fecha));
    $yearf = date('y', strtotime($mf->rel_bitacora->fecha)) +2000;
    @endphp
    @if ($monthf == $mesSelec && $yearf == $añoSelec )
        @if ($mf->rel_tipomov->egresoIngreso=='Egreso')
            @php
                $sumaEg+=$mf->monto   
            @endphp
        @elseif($mf->rel_tipomov->egresoIngreso=='Ingreso')
            @php
                $sumaIng+=$mf->monto
            @endphp
        @endif
    @endif
@endforeach

@php
      $sumaIngAn=[
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
      $sumaEgAn=[
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
@foreach ($movF as $mf2)
  @php
  $monthf2 = date('m', strtotime($mf2->rel_bitacora->fecha));
  $yearf2 = date('y', strtotime($mf2->rel_bitacora->fecha)) + 2000;
  @endphp
  @if ($yearf2==$añoSelec)
    @if ($mf2->rel_tipomov->egresoIngreso=='Ingreso')
        @php
            $sumaIngAn[$monthf2]+=$mf2->monto
        @endphp
    @elseif($mf2->rel_tipomov->egresoIngreso=='Egreso')
        @php
            $sumaEgAn[$monthf2]+=$mf2['monto']
        @endphp
    @endif
  @endif
@endforeach
    <script>
        var sumaIngAn=<?php echo json_encode($sumaIngAn); ?>;
        var sumaEgAn=<?php echo json_encode($sumaEgAn); ?>;
        var sumaIng=<?php echo $sumaIng ?>;
        var sumaEg=<?php echo $sumaEg ?>;
        var mes=<?php echo $mesSelec ?>;
        var ano=<?php echo $añoSelec ?>;
        var mesString;
        var porcentaje=0;
        switch (mes) {
            case 1:
            mesString='Enero'
            break;
            case 2:
            mesString='Febrero'
            break;
            case 3:
            mesString='Marzo'
            break;
            case 4:
            mesString='Abril'
            break;
            case 5:
            mesString='Mayo'
            break; 
            case 6:
            mesString='Junio'
            break; 
            case 7:
            mesString='Julio'
            break;
            case 8:
            mesString='Agosto'
            break;
            case 9:
            mesString='Septiembre'
            break;
            case 10:
            mesString='Octubre'
            break;
            case 11:
            mesString='Noviembre'
            break;
            case 12:
            mesString='Diciembre'
            break;
        }
        new Chart(document.getElementById("doughnut-chart"), {
            type: 'doughnut',
            data: {
            labels: ["Ingresos", "Egresos"],
            datasets: [
                {
                label: "$",
                backgroundColor: ["#1cc88a", "#e74a3b"],
                data: [sumaIng,sumaEg]
                }
            ]
            },
            options: {
            title: {
                display: true,
                text: 'Ingresos y Egresos del mes de ' + mesString + ' de ' + ano
            },
            maintainAspectRatio:false,
            responsive:true
            }
        });
        new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
                labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                datasets: [{ 
                    data: [sumaIngAn['01'],sumaIngAn['02'],sumaIngAn['03'],sumaIngAn['04'],sumaIngAn['05'],sumaIngAn['06'],
                    sumaIngAn['07'],sumaIngAn['08'],sumaIngAn['09'],sumaIngAn['10'],sumaIngAn['11'],sumaIngAn['12']
                    ],
                    label: "Ingresos",
                    borderColor: "#1cc88a",
                    fill: false
                }, { 
                    data: [sumaEgAn['01'],sumaEgAn['02'],sumaEgAn['03'],sumaEgAn['04'],sumaEgAn['05'],sumaEgAn['06'],sumaEgAn['07'],
                    sumaEgAn['08'],sumaEgAn['09'],sumaEgAn['10'],sumaEgAn['11'],sumaEgAn['12']
                    ],
                    label: "Egresos",
                    borderColor: "#e74a3b",
                    fill: false
                }
                ]
            },
            options: {
                title: {
                display: true,
                text: 'Ingresos de ' + ano
                },
                maintainAspectRatio:false,
                responsive:true
            }
            });
        
        
        var menor=0;
        var mayor=0;
        if(sumaIng>sumaEg){
            menor=sumaEg;
            mayor=sumaIng;
        }
        if(sumaIng<sumaEg){
            menor=sumaIng;
            mayor=sumaEg;
        }
        porcentaje=((mayor*100)/menor)-100;
        porcentaje=porcentaje.toFixed(2);
        $(document).ready(function(){
            if(sumaIng!=0 && sumaEg!=0){
                if(sumaIng>sumaEg){
                    $('#informacionIE').val('Los ingresos son mayores este mes en un ' + porcentaje + '%' );
                }
                else{
                    $('#informacionIE').val('Los egresos de este mes son mayores que los ingresos en un '  + porcentaje + '%');
                }
                if(sumaIng==sumaEg){
                    $('#informacionIE').val('Las cuentas de ingresos y egresos se encuentran balanceadas');
                }
            }
            else{
                if(sumaIng==0){
                    $('#informacionIE').val('Para este mes solo se registraron movimientos de egresos');
                }
                if(sumaEg==0){
                    $('#informacionIE').val('Para este mes solo se registraron movimientos de ingresos');
                }
            }
        });
        </script>
@endsection