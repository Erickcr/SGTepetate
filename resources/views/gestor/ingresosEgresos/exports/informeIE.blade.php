
@php
if ($mes<10) {
    $mes="0"+$mes;
}
$mesNum=$mes;
switch($mes){
    case "01":$mes="Enero";
        break;
    case "02":$mes="Febrero";
        break;
    case "03":$mes="Marzo";
        break;
    case "04":$mes="Abril";
        break;
    case "05":$mes="Mayo";
        break;
    case "06":$mes="Junio";
        break;
    case "07":$mes="Julio";
        break;
    case "08":$mes="Agosto";
        break;
    case "09":$mes="Septiembre";
        break;
    case "10":$mes="Octubre";
        break;
    case "11":$mes="Noviembre";
        break;
    case "12":$mes="Diciembre";
        break;    
}
@endphp
<br>
<table border="1px">
<thead>
    <tr>
        <td colspan="6" style="text-align: center" height="100px">Informe mensual de movimientos financieros</td>
    </tr>
    <tr></tr>
     <tr>
         <th align="center" colspan="6" style="text-align: center">Ingresos</th>
     </tr>
     <tr>
         <th align="center" colspan="6" style="text-align: center">Del mes de {{$mes}} de {{$año}}</th>
     </tr>  
</thead>
</table>

<table class="table table-bordered table-hover tbody tr:hover">
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
    $sumaTotal=0;
  @endphp
  @foreach ($movF as $mf)
      @if ($mf->rel_tipomov->egresoIngreso=='Ingreso')
          @php
          $monthf = date('m', strtotime($mf->rel_bitacora->fecha));
          $yearf = date('y', strtotime($mf->rel_bitacora->fecha)) + 2000;
          @endphp
          @if ($monthf == $mesNum  && $yearf == $año)
            <tr>
              <td>{{$mf->idMovFinanciero}}</td>
              <td>{{$mf->rel_bitacora->rel_usuario->nombre}}</td>
              <td>{{$mf->rel_tipomov->nombre}}</td>
              <td>{{$mf->rel_bitacora->fecha}}</td>
              <td>{{$mf->concepto}}</td>
              <td> {{$mf->monto}}</td>
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
            @php
              $sumaTotal=$sumaTotal + $mf['monto']
            @endphp
          @endif
      @endif
  @endforeach
            <tr></tr>
            <tr>
                <td colspan="4">
                </td>
                <td style="text-align: right">Total= $</td>
                <td>{{$sumaTotal}}</td>
            </tr>
</tbody>
</table>

<br>
<br>
<table>
  <thead>
    <tr>
        <th align="center" colspan="6" style="text-align: center">Egresos</th>
    </tr>
    <tr>
        <th align="center" colspan="6" style="text-align: center">Del mes de {{$mes}} de {{$año}}</th>
    </tr> 
  </thead>
</table>
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
      $sumaTotal2=0;
    @endphp
    @foreach ($movF as $mf)
        @if ($mf->rel_tipomov->egresoIngreso=='Egreso')
            @php
            $monthf = date('m', strtotime($mf->rel_bitacora->fecha));
            $yearf = date('y', strtotime($mf->rel_bitacora->fecha))+2000;
            @endphp
            @if ($monthf == $mesNum && $yearf == $año)
              <tr>
                <td>{{$mf->idMovFinanciero}}</td>
                <td>{{$mf->rel_bitacora->rel_usuario->nombre}}</td>
                <td>{{$mf->rel_tipomov->nombre}}</td>
                <td>{{$mf->rel_bitacora->fecha}}</td>
                <td>{{$mf->concepto}}</td>
                <td> {{$mf->monto}}</td>
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
                @php
                $sumaTotal2=$sumaTotal2 + $mf['monto']
                @endphp
            @endif
        @endif
    @endforeach
    <tr></tr>
            <tr>
                <td colspan="4">
                </td>
                <td style="text-align: right">Total= $</td>
                <td>{{$sumaTotal2}}</td>
            </tr>    
</tbody>
</table>