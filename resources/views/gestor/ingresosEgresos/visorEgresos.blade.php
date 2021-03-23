@extends('layouts.menuGestor')

@section('importOwl')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<link rel="stylesheet" href="{{asset('css/estilosIE.css')}}">
@endsection

@section('menu')
<a href="/sgtepetate/ingresos-egresos" class="textoTitulosSeccion">
  Ingresos y Egresos
</a>/
<a href="#" class="textoTitulosSeccion">
  Egresos
</a>
@endsection

@section('contenido')
<div style="width: 100%; display:flex; flex-wrap:wrap; justify-content:space-between">
  <a href="/sgtepetate/ingresos-egresos/nuevo-registro" class="btn btn-primary btn-icon-split btn-secundarioIE3" style="background-color: #207558">
    <span class="icon text-white-50">
        <i class="fas fa-plus-circle"></i>
    </span>
    <span class="text textBotonIE">Registrar Movimiento</span>
  </a>
  <a href="/sgtepetate/ingresos-egresos" class="linksIE" style="float: right">Regresar</a>
</div>
<div class="card shadow mb-4" style="margin-top: 20px">
  <div class="card-body bodyIE">
    <div class="table-responsive bodyTablaIE">
      <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="num_tablaPedidos">#</th>
            <th class="cliente_tablaPedidos">Nombre</th>
            <th class="fecha_tablaPedidos">Concepto</th>
            <th class="tel_tablaPedidos">Fecha</th>
            <th class="monto_tablaPedidos">Descripción</th>
            <th class="estado_tablaPedidos">Monto</th>
          </tr>
        </thead>
        <tbody>
          @php
              $sumaAlimento=0;
              $sumaNomina=0;
              $sumaMedicina=0;
              $sumaServicio=0;
              $sumaOtros=0;
            @endphp
            @foreach ($movF as $mf)
                @if ($mf->rel_tipomov->egresoIngreso=='Egreso')
                    @php
                    $monthf = date('m', strtotime($mf->rel_bitacora->fecha));
                    $yearf = date('y', strtotime($mf->rel_bitacora->fecha))+2000;
                    @endphp
                    @if ($monthf == $today->month && $yearf == $today->year)
                      <tr>
                        <td>{{$mf->idMovFinanciero}}</td>
                        <td>{{$mf->rel_bitacora->rel_usuario->nombre}}</td>
                        <td>{{$mf->rel_tipomov->nombre}}</td>
                        <td>{{$mf->rel_bitacora->fecha}}</td>
                        <td>{{$mf->concepto}}</td>
                        <td>$ {{$mf->monto}}</td>
                      </tr> 
                      @if ($mf->rel_tipomov->nombre == 'Compra de alimento')
                          @php
                              $sumaAlimento+=$mf->monto
                          @endphp
                      @elseif($mf->rel_tipomov->nombre == 'Pago de nómina')
                          @php
                            $sumaNomina+=$mf->monto
                          @endphp
                      @elseif($mf->rel_tipomov->nombre == 'Compra de medicinas')
                          @php
                            $sumaMedicina+=$mf->monto
                          @endphp
                      @elseif($mf->rel_tipomov->nombre == 'Pago de servicios')
                          @php
                            $sumaServicio+=$mf->monto
                          @endphp
                      @else
                          @php
                              $sumaOtros=$sumaOtros + $mf['monto']
                          @endphp
                      @endif
                    @endif
                @endif
            @endforeach    
        </tbody>
      </table>
    </div>
    <div style="width: 100%;height:50px;"></div>
    <div class="chart-containerIE" style="position: relative">
      <canvas id="bar-chart-horizontal" ></canvas>
    </div>
    <div class="chart-containerIE" style="position: relative">
      <canvas id="line-chart"></canvas>
    </div>
  </div>
  <div class="card-body">
    <p>*Datos especializados del mes actual</p>
  </div>
</div>

@php
      $sumaAlimentoAn=[
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
      $sumaNominasAn=[
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
      $sumaMedicinasAn=[
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
      $sumaServicioAn=[
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
      $sumaOtrosAn=[
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
@if ($mf2->rel_tipomov->egresoIngreso=='Egreso')
  @php
  $monthf2 = date('m', strtotime($mf2->rel_bitacora->fecha));
  $yearf2 = date('y', strtotime($mf2->rel_bitacora->fecha))+2000;
  @endphp
  @if ($yearf2 == $today->year)
      @if ($mf2->rel_tipomov->nombre == 'Compra de alimento')
        @php
          $sumaAlimentoAn[$monthf2]+=$mf2->monto
        @endphp
      @elseif($mf2->rel_tipomov->nombre == 'Pago de nómina')
        @php
          $sumaNominasAn[$monthf2]+=$mf2->monto
        @endphp
      @elseif($mf2->rel_tipomov->nombre == 'Compra de medicinas')
        @php
          $sumaMedicinasAn[$monthf2]+=$mf2->monto
        @endphp
      @elseif($mf2->rel_tipomov->nombre == 'Pago de servicios')
        @php
          $sumaServicioAn[$monthf2]+=$mf2->monto
        @endphp
      @else
        @php
          $sumaOtrosAn[$monthf2]+=$mf2['monto']
        @endphp
      @endif
  @endif
@endif
@endforeach
<script>
  var mes=<?php echo $today->month ?>;
  var sumaAlimento=<?php echo $sumaAlimento ?>;
  var sumaNomina=<?php echo $sumaNomina ?>;
  var sumaMedicina=<?php echo $sumaMedicina ?>;
  var sumaServicio=<?php echo $sumaServicio ?>;
  var sumaOtros=<?php echo $sumaOtros ?>;
  //sumas anuales
  var sumaAlimentoAn=<?php echo json_encode($sumaAlimentoAn); ?>;
  var sumaNominaAn=<?php echo json_encode($sumaNominasAn); ?>;
  var sumaMedicinaAn=<?php echo json_encode($sumaMedicinasAn); ?>;
  var sumaServicioAn=<?php echo json_encode($sumaServicioAn); ?>;
  var sumaOtrosAn=<?php echo json_encode($sumaOtrosAn); ?>;
  //
    var ano=<?php echo $today->year ?>;
    var mesString;
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
  new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["Compra de alimento", "Pago de nómina", "Compra de medicinas", "Pago de servicios","Otros"],
      datasets: [
        {
          label: "$",
          backgroundColor: ["#f3d145", "#ec9b54","#a66ebf","#ec7468","#7BCBC2"],
          data: [sumaAlimento,sumaNomina,sumaMedicina,sumaServicio,sumaOtros]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Egresos del mes de ' + mesString + ' de ' + ano
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
          data: [sumaAlimentoAn['01'],sumaAlimentoAn['02'],sumaAlimentoAn['03'],sumaAlimentoAn['04'],sumaAlimentoAn['05'],
          sumaAlimentoAn['06'],sumaAlimentoAn['07'],sumaAlimentoAn['08'],sumaAlimentoAn['09'],sumaAlimentoAn['10'],sumaAlimentoAn['11'],
          sumaAlimentoAn['12']
          ],
          label: "Compra de alimento $",
          borderColor: "#f3d145",
          fill: false
        }, { 
          data: [sumaNominaAn['01'],sumaNominaAn['02'],sumaNominaAn['03'],sumaNominaAn['04'],sumaNominaAn['05'],sumaNominaAn['06'],
          sumaNominaAn['07'],sumaNominaAn['08'],sumaNominaAn['09'],sumaNominaAn['10'],sumaNominaAn['11'],sumaNominaAn['12'],
          ],
          label: "Pago de nómina $",
          borderColor: "#ec9b54",
          fill: false
        },
        { 
          data: [sumaMedicinaAn['01'],sumaMedicinaAn['02'],sumaMedicinaAn['03'],sumaMedicinaAn['04'],sumaMedicinaAn['05'],
          sumaMedicinaAn['06'],sumaMedicinaAn['07'],sumaMedicinaAn['08'],sumaMedicinaAn['09'],sumaMedicinaAn['10'],
          sumaMedicinaAn['11'],sumaMedicinaAn['12']
          ],
          label: "Compra de medicinas $",
          borderColor: "#a66ebf",
          fill: false
        },
        { 
          data: [sumaServicioAn['01'],sumaServicioAn['02'],sumaServicioAn['03'],sumaServicioAn['04'],sumaServicioAn['05'],
          sumaServicioAn['06'],sumaServicioAn['07'],sumaServicioAn['08'],sumaServicioAn['09'],sumaServicioAn['10'],
          sumaServicioAn['11'],sumaServicioAn['12']
          ],
          label: "Pago de servicios $",
          borderColor: "#ec7468",
          fill: false
        },
        { 
          data: [sumaOtrosAn['01'],sumaOtrosAn['02'],sumaOtrosAn['03'],sumaOtrosAn['04'],sumaOtrosAn['05'],sumaOtrosAn['06'],
          sumaOtrosAn['07'],sumaOtrosAn['08'],sumaOtrosAn['09'],sumaOtrosAn['10'],sumaOtrosAn['11'],sumaOtrosAn['12']
          ],
          label: "Otros $",
          borderColor: "#7BCBC2",
          fill: false
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Egresos de ' + ano
      },
      maintainAspectRatio:false,
      responsive:true
    }
  });
</script>
@endsection