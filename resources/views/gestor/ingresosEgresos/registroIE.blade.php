@extends('layouts.menuGestor')

@section('importOwl')
<link rel="stylesheet" href="{{asset('css/estilosIE.css')}}">
<!-- Importando owl carousel -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection

@section('menu')
<a href="/sgtepetate/ingresos-egresos" class="textoTitulosSeccion">
    Ingresos y Egresos
</a>/
<a href="#" class="textoTitulosSeccion">
    Registrar Movimiento 
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
<div class="containerIE shadow" >
    <form class="formIE" action="/sgtepetate/ingresos-egresos/nuevo-registro/create" style="padding: 3%" method="POST" enctype="multipart/form-data">
        @csrf
        <p class="txtDatosNR tipoMov-txt" >Tipo de movimiento</p>
        <select class="selectProductoNR camposNR" name="tipoMovimiento" required>
            <option value="Ingreso">Ingreso</option>
            <option value="Egreso">Egreso</option>
            <option disable selected="selected" hidden value=""> &nbsp; Seleccionar movimiento</option>
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
        <p class="txtDatosNR tipoMov-txt">&#x1D11C; &nbsp;Fecha</p>
        <input class="camposNR campoDateNU" type="datetime-local" name="fecha" placeholder="&#x1D11C; Fecha" value="{{old('fecha')}}">
        <div class="divBotonesNR">
            <a class="btnCancelar " href="/sgtepetate/ingresos-egresos" style="text-decoration: none; text-align: center;">Cancelar</a>
            <input class="btnAñadir" type="submit" value="Añadir">	
        </div>
    </form>
</div>
</div>



<script type="text/javascript">
    $(document).ready(function(){
        var app = @json($tipomovimiento);
        $('[name=tipoMovimiento]').change(function(){
            $('.containerCarruselIE').show();
        if(this.value=='Ingreso'){
            $('.cuadroING').show();
            $('.cuadroEGR').hide();

            $('#conceptoListIE').html("<option disable selected='selected' hidden value=''> &nbsp; Seleccionar concepto</option>");
            for (var i = 0; i < app.length; i++){
                var obj = app[i];
                if(obj['egresoIngreso']=='Ingreso'){
                    $('#conceptoListIE').append($('<option>', {
                        value: obj['idTipoMovimiento'],
                        text: obj['nombre']
                    }));
                }
            }  
        }
        else{
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
        }
        });
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