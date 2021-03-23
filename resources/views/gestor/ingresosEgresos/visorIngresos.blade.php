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
  Ingresos 
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
              $sumaVT=0;
              $sumaOtros=0;
            @endphp
            @foreach ($movF as $mf)
                @if ($mf->rel_tipomov->egresoIngreso=='Ingreso')
                    @php
                    $monthf = date('m', strtotime($mf->rel_bitacora->fecha));
                    $yearf = date('y', strtotime($mf->rel_bitacora->fecha)) + 2000;
                    @endphp
                    @if ($monthf == $today->month  && $yearf == $today->year)
                      <tr>
                        <td>{{$mf->idMovFinanciero}}</td>
                        <td>{{$mf->rel_bitacora->rel_usuario->nombre}}</td>
                        <td>{{$mf->rel_tipomov->nombre}}</td>
                        <td>{{$mf->rel_bitacora->fecha}}</td>
                        <td>{{$mf->concepto}}</td>
                        <td>$ {{$mf->monto}}</td>
                      </tr> 
                      @if ($mf->rel_tipomov->nombre == 'Venta de trucha')
                          @php
                              $sumaVT=$sumaVT + $mf->monto
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
  {{-- calculo de datos para la grafica anual --}}
  @php
      $ventasTR=[
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
      $ventasOT=[
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
    @if ($mf2->rel_tipomov->egresoIngreso=='Ingreso')
      @php
      $monthf2 = date('m', strtotime($mf2->rel_bitacora->fecha));
      $yearf2 = date('y', strtotime($mf2->rel_bitacora->fecha)) + 2000;
      @endphp
      @if ($yearf2 == $today->year)
          @if ($mf2->rel_tipomov->nombre == 'Venta de trucha' )
          @php
            $ventasTR[$monthf2]+=$mf2->monto
          @endphp
          @else
              @php
                $ventasOT[$monthf2]+=$mf2['monto']
              @endphp
          @endif
      @endif
    @endif
  @endforeach

  <script>
    var ventasOT=<?php echo json_encode($ventasOT); ?>;
    var ventasTR=<?php echo json_encode($ventasTR); ?>;
    var ventaT=<?php echo $sumaVT ?>;
    var otros=<?php echo $sumaOtros ?>;
    var mes=<?php echo $today->month ?>;
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
        labels: ["Venta de trucha", "Otros"],
        datasets: [
          {
            label: "$ ",
            backgroundColor: ["#3fb3a4", "#e74b3c"],
            data: [ventaT,otros]
          }
        ]
      },
      options: {
        legend: { display: false },
        title: {
          display: true,
          text: 'Ingresos del mes de ' + mesString + ' de ' + ano
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
            data: [ventasTR['01'],ventasTR['02'],ventasTR['03'],ventasTR['04'],ventasTR['05'],ventasTR['06'],ventasTR['07'],
              ventasTR['08'],ventasTR['09'],ventasTR['10'],ventasTR['11'],ventasTR['12']
              ],
            label: "Venta de trucha $",
            borderColor: "#3fb3a4",
            fill: false
            }, { 
            data: [ventasOT['01'],ventasOT['02'],ventasOT['03'],ventasOT['04'],ventasOT['05'],
            ventasOT['06'],ventasOT['07'],ventasOT['08'],ventasOT['09'],ventasOT['10'],ventasOT['11'],ventasOT['12']],
            label: "Otros $",
            borderColor: "#e74b3c",
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
  </script>
@endsection