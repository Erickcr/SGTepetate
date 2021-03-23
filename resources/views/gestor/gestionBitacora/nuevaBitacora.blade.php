@extends('layouts.menuGestor')

@section('importOwl')
<link rel="stylesheet" href="{{asset('css/estilosIE.css')}}">
<!-- Importando owl carousel -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    localStorage.setItem('index','0')
   var index=0;
   var lessorplus;
   var temp;
   var temp2;
   var candado=true;
   var candado2=true;//para que no se empieze a restar y restar
   var controlAlimento;
   var controlInventario;  //sirven para evitar que la suma del mismo alimento sea mayor al total disponible    
   var aux; //sirve para guardar valores de los scripts que se usan luego de cliquear guardar en cada modal
   var click; //me servirá para saber si se clikeo o no un elemento
</script>

@endsection


@section('menu')
    Bitácora/agregar
@endsection


@section('contenido')



<div class="row contenidoTotalGR">
<div class="containerNR shadow">	
    <form class="formNR" action="/sgtepetate/gestionBitacora/addBitacora" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <p class="txtDatosNR">Descripción</p>
        <input class="camposNR" type="text" name="descripcionBit" placeholder="Descripción de la bitácora (actividades que se realizaron)" value="" style="width:100%; margin-bottom:10px" required autofocus> <br>
        <p class="txtDatosNR">&#x1D11C; &nbsp;Fecha</p>
        <input class="camposNR campoDateNU" type="datetime-local" name="fecha" placeholder="&#x1D11C; Fecha" value="{{old('fecha')}}" required>

        <p class="txtDatosNR">Seleccionar actividad</p>
        <select id="slcActividadPers" class="selectProductoNR camposNR" style="width:100%;" name="activPerson">
            @foreach ($actividades as $actividad)
            @if($actividad->idActividad>7)
            <option>
                {{$actividad['nombre']}}    
            </option>
            @endif        
            @endforeach
            <option disable selected="selected" hidden value=""> &nbsp; Seleccionar actividad personalizada</option>
        </select>

        <script type="text/javascript">
            $(document).ready(function() {
                
                $('#slcActividadPers').change(function () {
                    index++;
                    $('.col1-'+index).html(index);
                    $('.col2-'+index).html($('#slcActividadPers').val());
                    $('.col3-'+index).html("Actividad personalizada")

                     if ($('#tbactividades').css('display')=='none'){

                        $("#tbactividades").show();
                        $('.btnAñadir').show();
                    }        
                   
            });
            });
        </script>


        <a class="btnConteo" href="" style="text-decoration: none; text-align: center;" data-toggle="modal" data-target="#ModalConteo">Conteo</a>
        <a class="btnMovFin" href="" style="text-decoration: none; text-align: center;" data-toggle="modal" data-target="#ModalMovFin">Movimiento financiero</a>
        <a class="btnAlimTruchas" href="" style="text-decoration: none; text-align: center;" data-toggle="modal" data-target="#ModalTrucha">Alimentar truchas</a>
        <a class="btnAddInv" href="" style="text-decoration: none; text-align: center;" data-toggle="modal" data-target="#ModalInventario">Modificar inventario</a>
        <a class="btnEnfermedad" href="" style="text-decoration: none; text-align: center;" data-toggle="modal" data-target="#ModalEnferma">Registrar trucha enferma</a>

        <!--INICIO TABLA-->
            
                <table id="tbactividades" width="100%" cellspacing="0" style="display: none">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Actividad</th>
                      <th>Detalle 1</th>
                      <th>Detalle 2</th>
                    </tr>
                  </thead>
                  <tbody id="tbbodyact">
                    <tr class="1">
                      <td class="col1-1"></td>
                      <td class="col2-1"></td>
                      <td class="col3-1"></td>
                      <td class="col4-1"></td>
                    </tr>
                    <tr class="2">
                        <td class="col1-2"></td>
                        <td class="col2-2"></td>
                        <td class="col3-2"></td>
                        <td class="col4-2"></td>
                    </tr>
                    <tr class="3">
                        <td class="col1-3"></td>
                        <td class="col2-3"></td>
                        <td class="col3-3"></td>
                        <td class="col4-3"></td>
                    </tr>
                    <tr class="4">
                        <td class="col1-4"></td>
                        <td class="col2-4"></td>
                        <td class="col3-4"></td>
                        <td class="col4-4"></td>
                    </tr>
                    <tr class="5">
                        <td class="col1-5"></td>
                        <td class="col2-5"></td>
                        <td class="col3-5"></td>
                        <td class="col4-5"></td>
                    </tr>
                    <tr class="6">
                        <td class="col1-6"></td>
                        <td class="col2-6"></td>
                        <td class="col3-6"></td>
                        <td class="col4-6"></td>
                    </tr>
                    <tr class="7">
                        <td class="col1-7"></td>
                        <td class="col2-7"></td>
                        <td class="col3-7"></td>
                        <td class="col4-7"></td>
                    </tr>
                    <tr class="8">
                        <td class="col1-8"></td>
                        <td class="col2-8"></td>
                        <td class="col3-8"></td>
                        <td class="col4-8"></td>
                    </tr>
                    <tr class="9">
                        <td class="col1-9"></td>
                        <td class="col2-9"></td>
                        <td class="col3-9"></td>
                        <td class="col4-9"></td>
                    </tr>
                    <tr class="10">
                        <td class="col1-10"></td>
                        <td class="col2-10"></td>
                        <td class="col3-10"></td>
                        <td class="col4-10"></td>
                    </tr>  
                  </tbody>
                </table>

        <!--FIN TABLA-->

        <div class="divBotonesNR">
            <!--MODALES-->
            <!--MODAL CONTEO-->
            <div class="modal" id="ModalConteo" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Conteo</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <p class="txtDatosNR">Estanque</p>
                        <input class="camposNR" type="number" min="1" max="9" step="any" oninput="this.value = Math.abs(this.value)" name="estanqueConteo" placeholder="Eliga el estanque" value="{{old('estanque')}}">
                        <p class="txtDatosNR">Número de peces</p>
                        <input id="numpeces" class="camposNR" type="number" min="1" max="999" step="any" oninput="this.value = Math.abs(this.value)" name="numPeces" placeholder="Peces" value="{{old('numPeces')}}">
                        <p class="txtDatosNR">Longitud (cm)</p>
                        <input id="longpeces" class="camposNR" type="number" min="1" max="100" step="any" oninput="this.value = Math.abs(this.value)" name="longitud" placeholder="Longitud" value="{{old('longitud')}}">
                        <p class="txtDatosNR">Peso (gr)</p>
                        <input id="pesopeces" class="camposNR" type="number" min="1" max="1000" step="any" oninput="this.value = Math.abs(this.value)" name="peso" placeholder="Peso" value="{{old('peso')}}">
                        <input id="observaciones" class="camposNR" type="text" name="observaciones" placeholder="Observaciones" style="width:100%; margin-bottom:10px"> <br>
                        
                        <button type="button" id="btnMortalidad" class="btn btn-primary" style="background-color: #d97c3f">Registrar mortalidad</button>
                        
                        <div id="divMortalidad" style="display: none">
                            <p class="txtDatosNR">Cantidad</p>
                            <input id="cantmuertos" class="camposNR" type="number" min="1" max="999" step="any" oninput="this.value = Math.abs(this.value)" name="numPecesMuertos" placeholder="Peces muertos" value="{{old('numPecesMuertos')}}">
                            <p class="txtDatosNR">Causa de muerte</p>
                            <select class="selectProductoNR camposNR" name="CausaMuerte">
                            @foreach ($enfermedades as $enfermedad)
                                <option>
                                {{$enfermedad->nombre}}
                                </option> 
                            @endforeach
                                
                                <option disable selected="selected" hidden value=""> &nbsp; Seleccionar causa de muerte</option>
                            </select>
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#btnMortalidad').on('click', function () {
                                    
                                    if ($("#divMortalidad").css('display')=='none'){

                                        $("#divMortalidad").show();    
                                        click=true;
                                    }
                                    else{
                                        $("#divMortalidad").hide();
                                        click=false;
                                    }    
                                });
                            });
                        </script>

                        <p></p>
                    </div>
                    <div class="modal-footer">
                      <button id="btnWardCont" type="button" class="btn btn-primary" >Guardar</button>
                    
                      <!--script para llenar la tabla de actividades-->
                      
                      <script type="text/javascript">
                        
                        $(document).ready(function() {
                            $('#btnWardCont').on('click', function () {
                                if($('#numpeces').val() && $('#numpeces').val()>0 && $('#numpeces').val()<10000 && 
                                $('#longpeces').val() && $('#longpeces').val()>0 && $('#longpeces').val()<500 &&
                                $('#pesopeces').val() && $('#pesopeces').val()>0 && $('#pesopeces').val()<10000
                                && $('[name=estanqueConteo]').val() && $('[name=estanqueConteo]').val()<10
                                && $('[name=estanqueConteo]').val()>0){
                                    
                                    if(click){
                                    if($('[name=CausaMuerte]').val() && $('#cantmuertos').val() 
                                    && $('#cantmuertos').val()>0){
                                        index++;
                                        $('.col1-'+index).html(index);
                                        $('.col2-'+index).html("Conteo");
                                        $('.col3-'+index).html("Peces contados: "+$('#numpeces').val());
                                        $('.col4-'+index).html($('#observaciones').val());
                                
                                            if ($('#tbactividades').css('display')=='none'){

                                                $("#tbactividades").show();
                                                $('.btnAñadir').show();
                                            }

                                        $('#ModalConteo').modal('hide');
                                        $('.btnConteo').css({'background-color':'grey'});
                                        $('.btnConteo').html('Actividad registrada');
                                        $('.btnConteo').attr('data-target','');
                                    }
                                    else{
                                        alert("Llene los campos de mortalidad")
                                    }
                                    }
                                    else{
                                        index++;
                                        $('.col1-'+index).html(index);
                                        $('.col2-'+index).html("Conteo");
                                        $('.col3-'+index).html("Peces contados: "+$('#numpeces').val());
                                        $('.col4-'+index).html($('#observaciones').val());
                                
                                        if ($('#tbactividades').css('display')=='none'){

                                            $("#tbactividades").show();
                                            $('.btnAñadir').show();
                                        }

                                        $('#ModalConteo').modal('hide');
                                        $('.btnConteo').css({'background-color':'grey'});
                                        $('.btnConteo').html('Actividad registrada');
                                        $('.btnConteo').attr('data-target','');
                                    }
                                }          
                                else {
                                    alert("Llena los campos de manera correcta");    
                                }    
                            });
                        });
                    </script>
                    </div>
                  </div>
                </div>
            </div>
            <!--fin modal conteo -->
            
            <!--MODAL MOV FINANCIERO-->
            <div class="modal xlarge-only-text-right" id="ModalMovFin" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Movimiento financiero</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <!--FORMULARIO INGRESO-EGRESO-->     
                            
                                <p class="txtDatosNR">Tipo de movimiento</p>
                                <select class="selectProductoNR camposNR" name="tipoMovimiento">
                                    <option value="Ingreso">Ingreso</option>
                                    <option value="Egreso">Egreso</option>
                                    <option disable selected="selected" hidden value=""> &nbsp; Seleccionar movimiento</option>
                                </select>
                                <div class="shadow containerCarruselIE" style="display: none">
                                    <div class="" style="width: 100%"><a href='/sgtepetate/ingresos-egresos/conceptos'>Administrar Conceptos</a></div>
                                    <p class="txtDatosNR">Concepto</p>
                                    <select class="selectProductoNR camposNR" id="conceptoListIE" name="concepto" style="height: 40px">
                                        
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
                                <p class="txtDatosNR">&#x0024; &nbsp; Monto</p>
                                <input class="camposNR" type="number" min="1" max="999999" step="any" oninput="this.value = Math.abs(this.value)" name="monto" placeholder="&#x0024;" value="{{old('monto')}}">
                                <textarea class="camposNR" placeholder="&#x1F5CA; &nbsp; Notas" type="text" name="notas" style="width:100%; resize:none">{{old('notas')}}</textarea><br>
                                                                
                    <!--FIN de formulario-->
                    <!--script de formulario-->
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
                    
                    <!--fin script-->

             </div>
            <div class="modal-footer">
                      <button type="button" id="btnWard_financiero" class="btn btn-primary">Guardar</button>
                      
                      <!--script para tabla actividades-->
                      <script type="text/javascript">
                        
                            $(document).ready(function() {
                            $('#btnWard_financiero').on('click', function () {

                            if($('[name=tipoMovimiento]').val() && $('[name=concepto]').val() 
                            && $('[name=monto]').val()){
                              
                                index++;        
                                $('.col1-'+index).html(index);
                                $('.col2-'+index).html("Movimiento financiero");
                                $('.col3-'+index).html($('[name=tipoMovimiento]').val());
                                $('.col4-'+index).html('&#x0024;'+$('[name=monto]').val());    

                                if ($('#tbactividades').css('display')=='none'){

                                    $("#tbactividades").show();
                                    $('.btnAñadir').show();
                                }

                                $('#ModalMovFin').modal('hide');
                                $('.btnMovFin').css({'background-color':'grey'});
                                $('.btnMovFin').html('Actividad registrada');
                                $('.btnMovFin').attr('data-target','');
                            }

                            else{
                                alert("Llena los campos de manera correcta");
                            }     
                            });
                        });
                    </script>

                    </div>
                  </div>
                </div>
            </div>
        <!--fin modal mov fin-->

        <!--MODAL ALIMENTAR TRUCHAS-->
        <div class="modal" id="ModalTrucha" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Alimentar truchas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <p class="txtDatosNR">Estanque</p>
                        <input class="camposNR" type="number" min="1" max="9" step="any" oninput="this.value = Math.abs(this.value)" name="estanque" placeholder="Eliga el estanque" value="{{old('estanque')}}">
                        <p class="txtDatosNR">Tipo de alimento</p>
                        <select id="selectAlimento" class="selectProductoNR camposNR" name="tipoAlimento">
                            @php
                            $i=0;
                            @endphp
                            @foreach ($inventario as $invent)
                           
                            <option id="opcion" value={{$i}}>{{$invent->nombre}}</option>

                            @php
                            $i++
                            @endphp
                            @endforeach
                            <option disable selected="selected" hidden value=""> &nbsp; Seleccionar alimento</option> 
                        </select>
                    
                    <div id="CantAlim" style="display: none">
                        <p id="txtCantInv" class="txtDatosNR" style="float: left;"></p>
                        <p id="txtUnidadMed" class="txtDatosNR" style= "float: right"></p>
                        <input id="unidAlim" class="camposNR" type="number" min="1" step="any" oninput="this.value = Math.abs(this.value)" name="cantidadAlimento" placeholder="Cantidad" value="{{old('cantidadAlimento')}}">
                    </div>
                    
                    <script type="text/javascript">
                       var bita = @json($inventario);
                       var unit = @json($unidadmedida);
                        $(document).ready(function(){
                            $('[name=tipoAlimento]').change(function(){
                                var j=this.value;
                                for (var i = 0; i < bita.length; i++){
                                    if(j==i){
                                    var obj = bita [i];
                                    break;
                                    }
                                }

                                var k=obj['unidadMedida'];
                                for (var l = 0; l < unit.length; l++){
                                    if(k==l){
                                    var obj2 = unit [l-1];
                                    break;
                                    }
                                }
                                controlAlimento=obj;
                                if(controlInventario && controlInventario['idInventario']==controlAlimento['idInventario']){
                                    if($('[name=cantidad]').val()){
                                        if(lessorplus=='Restar'){
                                            if(candado){
                                            temp=obj['cantidad']-$('[name=cantidad]').val();
                                            candado=false;
                                            }
                                            $('#txtCantInv').html("Cantidad: " + temp);
                                            controlAlimento['cantidad']=temp;
                                            
                                        }
                                    }
                                }
                                else{
                                $('#txtCantInv').html("Cantidad: " + obj['cantidad']);
                                }
                                $('#txtUnidadMed').html("Unidad de medida: "+ obj2['abreviatura']);
                                $("#CantAlim").show();
                                
                                aux=obj;
                            });

                            
                        });

                    </script>
                </div>
                <div class="modal-footer">
                  <button id="btnWardAlimentar" type="button" class="btn btn-primary">Guardar</button>
                    
                  <!--script para tabla actividades-->
                    <script type="text/javascript">
                        
                        $(document).ready(function() {
                            $('#btnWardAlimentar').on('click', function () {
            
                                if($('[name=estanque]').val() && $('[name=tipoAlimento]').val()
                                && ($('[name=cantidadAlimento]').val() 
                                && $('[name=cantidadAlimento]').val()<controlAlimento['cantidad'])
                                && $('[name=estanque]').val()<10){
                                    
                                index++;        
                                $('.col1-'+index).html(index);
                                $('.col2-'+index).html("Alimentar truchas");
                                $('.col3-'+index).html($('[name=estanque]').val());
                                $('.col4-'+index).html(aux['nombre']);
                                if ($('#tbactividades').css('display')=='none'){

                                    $("#tbactividades").show();
                                    $('.btnAñadir').show();
                                }

                                $('#ModalTrucha').modal('hide');
                                $('.btnAlimTruchas').css({'background-color':'grey'});
                                $('.btnAlimTruchas').html('Actividad registrada');
                                $('.btnAlimTruchas').attr('data-target','');
                                
                                }
                                else {
                                    alert("Llena los campos de manera correcta");
                                }
                               
                            });
                        });
                    </script>
                
                </div>
              </div>
            </div>
        </div>
        <!--fin modal alimentar truchas -->

        <!--modal modificar inventario-->
        
        <div class="modal" id="ModalInventario" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modificar inventario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <p class="txtDatosNR">Eliga el elemento a modificar</p>
                        <select id=itemsInv class="selectProductoNR camposNR" name="itemsInventario">
                        
                            @php
                            $j=0;
                            @endphp
                            @foreach ($allInventario as $invent)
                           
                            <option id="opcion" value={{$j}}>{{$invent->nombre}}</option>

                            @php
                            $j++
                            @endphp
                            @endforeach


                        <option disable selected="selected" hidden value=""> &nbsp; Seleccionar elemento</option>
                        </select>
     
                    <div id="ModifInv" style="display: none">
                        <p id="txtInfo" class="txtDatosNR"></p>
                        <p id="txtCantTotal" class="txtDatosNR"></p>
           
                        <input class="camposNR" type="number" min="0"  max="999" value="{{old('cantidad')}}" name="cantidad" placeholder="Cantidad" style="width:90%; margin-bottom:10px" autofocus> <br>
                        <button id="btnless" type="button" class="btn btn-primary" style="background-color: red; ">Restar</button>
                        <button id="btnplus" type="button" class="btn btn-primary" style="background-color:green;">Sumar</button>
                        <input type="text" style="display : none" name="operacionInvent" value="">
                    </div>
                    
                    <script type="text/javascript">
                        var bita = @json($allInventario);
                        $(document).ready(function(){
                            $('[name=itemsInventario]').change(function(){
                                var j=this.value;
                                 for (var i = 0; i < bita.length; i++){
                                     if(j==i){
                                     var obj = bita [i];
                                     break;
                                     }
                                 }
                                 
                                $('#txtInfo').html("Indique la cantidad que desea restar o aumentar en "+ obj['nombre']);
                                controlInventario=obj;
                                if(controlAlimento && controlAlimento['idInventario']==controlInventario['idInventario']){
                                    if($('[name=cantidadAlimento]').val()){
                                        if(candado2){
                                        temp2=obj['cantidad']-$('[name=cantidadAlimento]').val();       
                                        candado2=false;
                                        }
                                        $('#txtCantTotal').html("Cantidad: " + temp2);
                                        controlInventario['cantidad']=temp2;
                                        
                                    }
                                }
                                else{
                                    $('#txtCantTotal').html("Cantidad actual: "+ obj['cantidad']);
                                }
                                $("#ModifInv").show();
                                aux=obj;
                            });
                        });

                    </script>
                </div>
                <div class="modal-footer">
                <button id="btnWard_modifInv" type="button" class="btn btn-primary">Guardar</button>
                
                <!--script para tabla actividades-->
                    <script type="text/javascript">
                        
                        $(document).ready(function() {
                            
                            $('#btnless').on('click', function () {
                                lessorplus=$('#btnless').html();
                                $('[name=operacionInvent]').val('resta');
                                $('#btnless').css('background', 'blue');
                                $('#btnplus').css('background', 'green');


                                
                            });

                           $('#btnplus').on('click', function () {
                                lessorplus=$('#btnplus').html();
                                $('[name=operacionInvent]').val('suma');
                                $('#btnplus').css('background', 'blue');
                                $('#btnless').css('background', 'red');

                            });
                            
                            $('#btnWard_modifInv').on('click', function () {
                            
                            if($('[name=itemsInventario]').val() && $('[name=cantidad]').val() 
                            && lessorplus){

                                if(lessorplus=='Restar'){
                                    if ($('[name=cantidad]').val()>controlInventario['cantidad']){
                                    alert("La cantidad a restar es mayor que la cantidad en existencia");
                                    }
                                    else{
                                        index++;        
                                        $('.col1-'+index).html(index);
                                        $('.col2-'+index).html("Modificar inventario");
                                        $('.col3-'+index).html(aux['nombre']);
                                        $('.col4-'+index).html(lessorplus);
                                
                                            if ($('#tbactividades').css('display')=='none'){

                                                $("#tbactividades").show();
                                                $('.btnAñadir').show();
                                            }

                                        $('#ModalInventario').modal('hide');
                                        $('.btnAddInv').css({'background-color':'grey'});
                                        $('.btnAddInv').html('Actividad registrada');
                                        $('.btnAddInv').attr('data-target','');
                                    }
                                }
                                else{
                                index++;        
                                $('.col1-'+index).html(index);
                                $('.col2-'+index).html("Modificar inventario");
                                $('.col3-'+index).html(aux['nombre']);
                                $('.col4-'+index).html(lessorplus);
                                
                                if ($('#tbactividades').css('display')=='none'){

                                    $("#tbactividades").show();
                                    $('.btnAñadir').show();
                                }

                                $('#ModalInventario').modal('hide');
                                $('.btnAddInv').css({'background-color':'grey'});
                                $('.btnAddInv').html('Actividad registrada');
                                $('.btnAddInv').attr('data-target','');
                                }    
                            }
                            else{
                                alert("Llena los campos de manera correcta");
                                }        
                            });
                        });
                    </script>
                </div>
              </div>
            </div>
        </div>
        
        <!--fin de modal modif inventario -->


        <!--modal trucha enferma-->
        <div class="modal" id="ModalEnferma" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Registrar trucha enferma</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    
                        <p class="txtDatosNR">Enfermedad</p>
                        <select class="selectProductoNR camposNR" name="enfermedad">
                            @foreach ($enfermedades as $enfermedad)
                            <option>
                            {{$enfermedad->nombre}}
                            </option>    
                            @endforeach
                        <option disable selected="selected" hidden value=""> &nbsp; Seleccione la enfermedad</option>
                        </select>
                <p></p>
                </div>
                <div class="modal-footer">
                  <button id="btnWard_truchaEnf" type="button" class="btn btn-primary">Guardar</button>
                    <!--script para tabla actividades-->
                    <script type="text/javascript">
                        
                        $(document).ready(function() {
                            $('#btnWard_truchaEnf').on('click', function () {

                                if($('[name=enfermedad]').val()){
                                    index++;        
                                    $('.col1-'+index).html(index);
                                    $('.col2-'+index).html("Registro de trucha enferma");
                                    $('.col3-'+index).html($('[name=enfermedad]').val());

                                    if ($('#tbactividades').css('display')=='none'){

                                        $("#tbactividades").show();
                                        $('.btnAñadir').show();
                                    }

                                    
                                    $('#ModalEnferma').modal('hide');
                                    $('.btnEnfermedad').css({'background-color':'grey'});
                                    $('.btnEnfermedad').html('Actividad registrada');
                                    $('.btnEnfermedad').attr('data-target','');
                                }
                                else{
                                    alert("Llene los campos de manera correcta");
                                }
                                    
                            });
                        });
                    </script>
                
                </div>
              </div>
            </div>
        </div>
        <!--fin modal trucha enferma -->

            <!--FIN DE MODALES -->
          
            
            <a class="btnCancelar " href="/sgtepetate/gestionBitacora" style="text-decoration: none; text-align: center;">Cancelar</a>
            <input class="btnAñadir" type="submit" value="Guardar cambios" style="display : none">

        </div>
    </form>
</div>
</div>
@endsection