@extends('layouts.menuGestor')

@section('importOwl')
<link rel="stylesheet" href="{{asset('css/estilosIE.css')}}">
<!-- Importando owl carousel -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection

@section('menu')
<a href="/sgtepetate/inventario/categoria/{{$inventario->categoria}}" class="textoTitulosSeccion">
    Inventario
  </a> /
  <a href="#" class="textoTitulosSeccion">
    Aumentar {{$inventario->nombre}}
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
 
<div class="row contenidoTotalGR">
    <div class="containerNR shadow">	
        <form class="formNR" action="/sgtepetate/inventario/pluspatchInventario/{{$inventario->idInventario}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <p class="txtDatosNR">Indique la cantidad que desea aumentar en: <b>{{$inventario->nombre}}</b></p>
            <p class="txtDatosNR">Cantidad actual: {{$inventario->cantidad}}</p>
            @if($inventario->rel_unidad->tipo=='Entero')
                <input style="width:100%;" class="camposNR" type="number" min="0"  max="{{999999-$inventario->cantidad}}" value="{{old('cantidad')}}" name="cantidad" placeholder="Cantidad" style="width:90%; margin-bottom:10px" required autofocus> <br>
            @else
                <input style="width:100%;" class="camposNR" type="number"  min="0"  max="{{999999-$inventario->cantidad}}" value="{{old('cantidad')}}" step="any" name="cantidad" placeholder="Cantidad" style="width:90%; margin-bottom:10px" required autofocus> <br>
            @endif
            <p class="txtDatosNR">Indique la fecha (aaaa-mm-ddT24:00)</p>
            <input class="camposNR"  type="datetime-local" name="fecha" placeholder="Fecha" style="width:100%; margin bottom:10px" required autofocus><br>
            <p class="txtDatosNR">Descripción de actividad</p>
            <input class="camposNR" type="text" name="descripcion" placeholder="Descripción" style="width:90%; margin bottom:10px" vale="{{ old('descripcion') }}" required autofocus><br>

            @if ($inventario->rel_categoria->nombre!='Productos')
                <h2 style="margin-top:50px; margin-bottom:25px;">Registrar egreso (Opcional): </h2>
                <p class="txtDatosNR tipoMov-txt" >Tipo de movimiento</p>
                <select class="selectProductoNR camposNR" name="tipoMovimiento" required>
                    <option selected="selected" value="Egreso">Egreso</option>
                </select>
                <div class="shadow containerCarruselIE" style="display: none">
                    <div class="" style="width: 100%"><a href='/sgtepetate/ingresos-egresos/conceptos'>Administrar Conceptos</a></div>
                    <p class="txtDatosNR">Concepto</p>
                    <select class="selectProductoNR camposNR" id="conceptoListIE" name="concepto" required style="height: 40px">
                        
                    </select>
                    {{-- Carrusel kk --}}
                    <div class="cuadrito cuadroEGR" id="botonTM1" style="background-color: #f3d145">
                        <img src="{{asset('/img/gestor/icon-comida.png')}}" alt="">
                        <p>Compra de alimento</p>
                    </div>
                    <div class="cuadrito cuadroEGR" id="botonTM2" style="background-color: #ec9b54">
                        <img src="{{asset('/img/gestor/icon-dinero.png')}}" alt="">
                        <p>Pago de nomina</p>
                    </div>
                    <div class="cuadrito cuadroEGR" id="botonTM3" style="background-color: #a66ebf">
                        <img src="{{asset('/img/gestor/icon-medicina.png')}}" alt="">
                        <p>Compra de medicina</p>
                    </div>
                    <div class="cuadrito cuadroEGR" id="botonTM4" style="background-color: #ec7468">
                        <img src="{{asset('/img/gestor/icon-tools.png')}}" alt="">
                        <p>Pago de servicios</p>
                    </div>
                    <div class="cuadrito cuadroING" id="botonTM5" style="background-color: #3fb3a4;display:none">
                        <img src="{{asset('/img/gestor/icon-fish.png')}}" alt="">
                        <p>Venta de trucha</p>
                    </div>
                    <div class="cuadrito cuadroING" id="botonTM6" style="background-color: #e74b3c;display:none">
                        <img src="{{asset('/img/gestor/icon-otros.png')}}" alt="">
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otros&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    </div>
                </div>
                <p class="txtDatosNR tipoMov-txt">&#x0024; &nbsp; Monto</p>
                <input class="camposNR" type="number" min="1" max="999999" step="any" oninput="this.value = Math.abs(this.value)" name="monto" placeholder="&#x0024;" value="{{old('monto')}}">
                <textarea class="camposNR tipoMov-txt" placeholder="&#x1F5CA; &nbsp; Notas" type="text" name="notas" required style="width:100%; resize:none">{{old('notas')}}</textarea><br>
            @endif
            <div class="divBotonesNR">
                <a class="btnCancelar " href="/sgtepetate/inventario/categoria/{{$inventario->categoria}}" style="text-decoration: none; text-align: center;">Cancelar</a>
                <input class="btnAñadir" type="submit" value="Guardar cambios">	
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var app = @json($tipomovimiento);
            $('.containerCarruselIE').show();
            $('.cuadroING').hide();
            $('.cuadroEGR').show();

            $('#conceptoListIE').html("<option disable selected='selected' hidden value=''> &nbsp; Seleccionar concepto</option>");
            for (var i = 0; i < app.length; i++){
                var obj = app[i];
                if(obj['egresoIngreso']=='Egreso'){
                    $('#conceptoListIE').append($('<option>', {
                        value: obj['idTipoMovimiento'],
                        text: obj['nombre']
                    }));
                }
            }         

        /* Eventos de los botones */
        $('#botonTM1').click(function(){
            $('#conceptoListIE option[value="1"]').attr('selected', true);
            $('#conceptoListIE option[value="2"]').attr('selected', false);
            $('#conceptoListIE option[value="3"]').attr('selected', false);
            $('#conceptoListIE option[value="4"]').attr('selected', false);   
        });
        $('#botonTM2').click(function(){
            $('#conceptoListIE option[value="1"]').attr('selected', false);
            $('#conceptoListIE option[value="2"]').attr('selected', true);
            $('#conceptoListIE option[value="3"]').attr('selected', false);
            $('#conceptoListIE option[value="4"]').attr('selected', false);
        });
        $('#botonTM3').click(function(){
            $('#conceptoListIE option[value="1"]').attr('selected', false);
            $('#conceptoListIE option[value="2"]').attr('selected', false);
            $('#conceptoListIE option[value="3"]').attr('selected', true);
            $('#conceptoListIE option[value="4"]').attr('selected', false);
        });
        $('#botonTM4').click(function(){
            $('#conceptoListIE option[value="1"]').attr('selected', false);
            $('#conceptoListIE option[value="2"]').attr('selected', false);
            $('#conceptoListIE option[value="3"]').attr('selected', false);
            $('#conceptoListIE option[value="4"]').attr('selected', true);
        });
        $('#botonTM5').click(function(){
            $('#conceptoListIE option[value="5"]').attr('selected', true);
            $('#conceptoListIE option[value="6"]').attr('selected', false);
        });
        $('#botonTM6').click(function(){
            $('#conceptoListIE option[value="5"]').attr('selected', false);
            $('#conceptoListIE option[value="6"]').attr('selected', true);
        });

    });
</script>
@endsection