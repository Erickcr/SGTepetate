@extends('layouts.menuGestor')

@section('importOwl')
<!-- Importando owl carousel -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    localStorage.setItem('index','0')
   var index=0;    
</script>

@endsection

@section('menu')
    <a href="#" class="textoTitulosSeccion">
        Gestión Truchas
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
<script>
    var click2;
    var aux; //sirve para guardar valores de los scripts que se usan luego de cliquear guardar en cada modal
</script>
<div class="row">
    {{--Botones y referencias a páginas--}}
    <div class="btnGT" style="width: 100%; margin-left:auto; margin-right:auto">
        <div class="botonesPagGT" style="width: 90%; margin-left:auto; margin-right:auto">
            <div><a class="abtnGT" href="/sgtepetate/gestionTruchas/Mortalidad"><img src="/img/gestor/gestionTruchas/mortalidad.png">Mortalidad</a></div>
            <div><a class="abtnGT" href="/sgtepetate/gestionTruchas/Enfermedades"><img src="/img/gestor/gestionTruchas/enfermedad.png">Enfermedades</a></div>
        </div>
    </div>

    {{-- INICIO FOREACH, COMIENZAN ESTANQUES --}}
    <div class="div_estanquesGT">

        {{-- Estanque principal --}}
        @foreach($estanques as $estanque)

        @if($estanque->idEstanque==9)
            
            <a class="card shadow mb-4 estanqueMayor"  style="text-decoration: none; color:#5a5c69;" >
                <div class="card-header py-3 headerGT" >
                    <h6 class="txt_headerGT" >Estanque:&nbsp;{{$estanque->idEstanque}}</h6>
                    <h6 class="txt_headerGT" >¡{{$estanque->nombre}}!</h6>
                    <i class="fas fa-ellipsis-v kebab"  href="#modalOpciones" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="opciones('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo9->numeroDePeces}}','{{$conteo9->numeroDePeces}}','{{$conteo9->longitud}}','{{$conteo9->peso}}')"></i>
                    
                </div>
                <div class="card-body body_estanqueMayor  img-fluid" href="#modalEstanque" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="enviarId('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo9->numeroDePeces}}','{{$conteo9->longitud}}','{{$conteo9->peso}}')">
                    <p>Tamaño promedio:&nbsp;{{$conteo9->longitud}}&nbsp;cm</p>
                    <p>Peso promedio:&nbsp;{{$conteo9->peso}}&nbsp;gramos</p>
                    <p>Truchas actuales:&nbsp;{{$conteo9->numeroDePeces}}&nbsp;</p>
                </div>
            </a>
        @endif
            {{-- Estanques pequeños --}}
        @if($estanque->idEstanque==8)
            <a class="card shadow mb-4 estanqueMenor"  style="text-decoration: none; color:#5a5c69;"  >
                <div class="card-header py-3 headerGT" >
                    <h6 class="txt_headerGT">Estanque:&nbsp;{{$estanque->idEstanque}}</h6>
                    <i class="fas fa-ellipsis-v kebab" href="#modalOpciones" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="opciones('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo8->numeroDePeces}}','{{$conteo8->numeroDePeces}}','{{$conteo8->longitud}}','{{$conteo8->peso}}')"></i>
                </div>
                <div class="card-body body_estanqueMenor img-fluid" href="#modalEstanque" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="enviarId('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo8->numeroDePeces}}','{{$conteo8->longitud}}','{{$conteo8->peso}}')">
                    <p>Truchas actuales:&nbsp;{{$conteo8->numeroDePeces}}&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </a>
        @endif
        @if($estanque->idEstanque==7)
            <a class="card shadow mb-4 estanqueMenor"  style="text-decoration: none; color:#5a5c69;"  >
                <div class="card-header py-3 headerGT" >
                    <h6 class="txt_headerGT">Estanque:&nbsp;{{$estanque->idEstanque}}</h6>
                    <i class="fas fa-ellipsis-v kebab" href="#modalOpciones" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="opciones('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo7->numeroDePeces}}','{{$conteo7->numeroDePeces}}','{{$conteo7->longitud}}','{{$conteo7->peso}}')"></i>
                </div>
                <div class="card-body body_estanqueMenor img-fluid" href="#modalEstanque" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="enviarId('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo7->numeroDePeces}}','{{$conteo7->longitud}}','{{$conteo7->peso}}')">
                    <p>Truchas actuales:&nbsp;{{$conteo7->numeroDePeces}}&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </a>
        @endif
        @if($estanque->idEstanque==6)
            <a class="card shadow mb-4 estanqueMenor"  style="text-decoration: none; color:#5a5c69;"  >
                <div class="card-header py-3 headerGT">
                    <h6 class="txt_headerGT">Estanque:&nbsp;{{$estanque->idEstanque}}</h6>
                    <i class="fas fa-ellipsis-v kebab" href="#modalOpciones" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="opciones('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo6->numeroDePeces}}','{{$conteo6->numeroDePeces}}','{{$conteo6->longitud}}','{{$conteo6->peso}}')"></i>
                </div>
                <div class="card-body body_estanqueMenor img-fluid" href="#modalEstanque" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="enviarId('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo6->numeroDePeces}}','{{$conteo6->longitud}}','{{$conteo6->peso}}')">
                    <p>Truchas actuales:&nbsp;{{$conteo6->numeroDePeces}}&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </a>
        @endif
        @if($estanque->idEstanque==5)
            <a class="card shadow mb-4 estanqueMenor"  style="text-decoration: none; color:#5a5c69;"  >
                <div class="card-header py-3 headerGT">
                    <h6 class="txt_headerGT">Estanque:&nbsp;{{$estanque->idEstanque}}</h6>
                    <i class="fas fa-ellipsis-v kebab" href="#modalOpciones" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="opciones('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo5->numeroDePeces}}','{{$conteo5->numeroDePeces}}','{{$conteo5->longitud}}','{{$conteo5->peso}}')"></i>
                </div>
                <div class="card-body body_estanqueMenor img-fluid" href="#modalEstanque" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="enviarId('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo5->numeroDePeces}}','{{$conteo5->longitud}}','{{$conteo5->peso}}')">
                    <p>Truchas actuales:&nbsp;{{$conteo5->numeroDePeces}}&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </a>
        @endif
        @if($estanque->idEstanque==4)
            <a class="card shadow mb-4 estanqueMenor"  style="text-decoration: none; color:#5a5c69;"  >
                <div class="card-header py-3 headerGT" >
                    <h6 class="txt_headerGT">Estanque:&nbsp;{{$estanque->idEstanque}}</h6>
                    <i class="fas fa-ellipsis-v kebab" href="#modalOpciones" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="opciones('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo4->numeroDePeces}}','{{$conteo4->numeroDePeces}}','{{$conteo4->longitud}}','{{$conteo4->peso}}')"></i>
                </div>
                <div class="card-body body_estanqueMenor img-fluid" href="#modalEstanque" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="enviarId('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo4->numeroDePeces}}','{{$conteo4->longitud}}','{{$conteo4->peso}}')">
                    <p>Truchas actuales:&nbsp;{{$conteo4->numeroDePeces}}&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </a>
        @endif
        @if($estanque->idEstanque==3)
            <a class="card shadow mb-4 estanqueMenor"  style="text-decoration: none; color:#5a5c69;"  >
                <div class="card-header py-3 headerGT">
                    <h6 class="txt_headerGT">Estanque:&nbsp;{{$estanque->idEstanque}}</h6>
                    <i class="fas fa-ellipsis-v kebab" href="#modalOpciones" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="opciones('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo3->numeroDePeces}}','{{$conteo3->numeroDePeces}}','{{$conteo3->longitud}}','{{$conteo3->peso}}')"></i>
                </div>
                <div class="card-body body_estanqueMenor img-fluid" href="#modalEstanque" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="enviarId('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo3->numeroDePeces}}','{{$conteo3->longitud}}','{{$conteo3->peso}}')">
                    <p>Truchas actuales:&nbsp;{{$conteo3->numeroDePeces}}&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </a>
        @endif
        @if($estanque->idEstanque==2)
            <a class="card shadow mb-4 estanqueMenor"  style="text-decoration: none; color:#5a5c69;"  >
                <div class="card-header py-3 headerGT">
                    <h6 class="txt_headerGT">Estanque:&nbsp;{{$estanque->idEstanque}}</h6>
                    <i class="fas fa-ellipsis-v kebab" href="#modalOpciones" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="opciones('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo2->numeroDePeces}}','{{$conteo2->numeroDePeces}}','{{$conteo2->longitud}}','{{$conteo2->peso}}')"></i>
                </div>
                <div class="card-body body_estanqueMenor img-fluid" href="#modalEstanque" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="enviarId('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo2->numeroDePeces}}','{{$conteo2->longitud}}','{{$conteo2->peso}}')">
                    <p>Truchas actuales:&nbsp;{{$conteo2->numeroDePeces}}&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </a>
        @endif
        @if($estanque->idEstanque==1)
            <a class="card shadow mb-4 estanqueMenor"  style="text-decoration: none; color:#5a5c69;" >
                <div class="card-header py-3 headerGT">
                    <h6 class="txt_headerGT">Estanque:&nbsp;{{$estanque->idEstanque}}</h6>
                    <i class="fas fa-ellipsis-v kebab" href="#modalOpciones" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="opciones('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo1->numeroDePeces}}','{{$conteo1->numeroDePeces}}','{{$conteo1->longitud}}','{{$conteo1->peso}}')"></i>
                    
                </div>
                <div class="card-body body_estanqueMenor img-fluid" href="#modalEstanque"  data-toggle="modal" data-target=".bd-example-modal-lg" onclick="enviarId('{{$estanque->idEstanque}}','{{$estanque->nombre}}','{{$estanque->descripcion}}','{{$estanque->volumen}}','{{$conteo1->numeroDePeces}}','{{$conteo1->longitud}}','{{$conteo1->peso}}')">
                    <p>Truchas actuales:&nbsp;{{$conteo1->numeroDePeces}}&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </a>
        @endif
        @endforeach
    </div>


    <script>
        function enviarId($idSeleccionado, $nombre , $descripcion, $volumen, $numTruchas, $tamaño, $peso){ 
            $('#idSeleccionado').val($idSeleccionado);
            $('#nombre').val($nombre);
            $('#descripcion').val($descripcion);
            $('#volumen').val($volumen);
            $('#numTruchas').val($numTruchas);
            $('#tamaño').val($tamaño);
            $('#peso').val($peso);
            var $biomasa=parseFloat($peso)*parseFloat($numTruchas);
            $('#biomasa').val($biomasa);
        }
        function opciones($idSeleccionado){ 
            $('#idSeleccionado1').val($idSeleccionado);
            $('#idSeleccionado2').val($idSeleccionado);
            $('#idSeleccionado3').val($idSeleccionado);
        }
        function cerrarModal(){
            $("#modalOpciones .close").click()
        }
    </script>
  
    <!-- Modal de información sobre el estanque seleccionado-->
    <div class="modal fade bd-example-modal-lg" id="modalEstanque" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 9999999999">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #207558"><b>Estanque:&nbsp;</b></h5>
                    <input id="idSeleccionado" style="font-size:20px; color: #207558; font-weight:bold" class="inputModalE" readonly>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body modalEstanque">
                    <div> 
                        <p class="pModalE"><b>Nombre de estanque: </b></p> <input id="nombre" class="inputModalE" readonly>
                    </div>
                    <div> 
                        <p class="pModalE"><b>Descripción: </b></p> <input id="descripcion" class="inputModalE" style="width:100%;" readonly>
                    </div>
                    <div> 
                        <p class="pModalE"><b>Volumen de estanque: </b></p> <input id="volumen" class="inputModalE" readonly>
                    </div>
                    <div> 
                        <p class="pModalE"><b>Número de truchas: </b></p> <input id="numTruchas" class="inputModalE" readonly>
                    </div>
                    <div> 
                        <p class="pModalE"><b>Tamaño promedio: </b></p> <input id="tamaño" class="inputModalE" readonly>
                    </div>
                    <div> 
                        <p class="pModalE"><b>Peso promedio: </b></p> <input id="peso" class="inputModalE" readonly>
                    </div>
                    <div style="width: 100%"> 
                        <p class="pModalE"><b>Biomasa: </b></p> <input id="biomasa" class="inputModalE" readonly>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary btn-log btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
          </div>

        </div>
    </div>

    {{-- MODAL DE OPCIONES DE ACTIVIDADES EN ESTANQUEA --}}
    <div class="modal fade bd-example-modal-sm" id="modalOpciones" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 9999999999">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #207558"><b>Estanque:&nbsp;</b></h5>
                    <input id="idSeleccionado1" style="font-size:20px; color: #207558; font-weight:bold" class="inputModalE" readonly>
                </div>

                <div class="modal-body" style="margin-left: auto; margin-right:auto; width:100%;">
                        <div ><p style="width: 100%; text-align:center; ">Seleciona una opción</p></div>
                        {{-- href="#ModalTrucha" data-toggle="modal" data-target=".modal-dialog" --}}
                        <div class="seleccionop" data-dismiss="modal" data-toggle="modal" data-target="#ModalTrucha"><p class="opcionesEstanque" >&nbsp;<i class="fas fa-utensils"></i>&nbsp;&nbsp;Alimentar truchas</p></div>
                        <div class="seleccionop" data-dismiss="modal" data-toggle="modal" data-target="#ModalConteo"><p class="opcionesEstanque">&nbsp;<i class="fas fa-calculator"></i>&nbsp;&nbsp;Conteo</p></div>
                        {{-- <div class="seleccionop" data-dismiss="modal"><p class="opcionesEstanque">&nbsp;<i class="fas fa-water"></i>&nbsp;&nbsp;Siembra</p></div> --}}
                </div>

                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary btn-log btn-danger" data-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div> 
    </div>   


    {{-- --------------ACTIVIDADES---------------- --}}
    <!--MODAL ALIMENTAR TRUCHAS-->
    <form method="POST" action="/sgtepetate/gestionTruchas/Alimentacion" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    <div class="modal" id="ModalTrucha" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="color: #207558"><b>Alimentar truchas</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="display: flex; justify-content:center; vertical-align:middle; flex-wrap:wrap">
                <p class="txtDatosNU PNUE" style="margin-bottom: 0%">Estanque</p> 
                <input name="estanqueID2" id="idSeleccionado2" class="camposNU CNUE" readonly>
                <p class="txtDatosNU PNUE">Fecha</p>
                    <input id="fechaAlimentacion" class="camposNU CNUE" type="datetime-local" name="fechaAlimentacion"  value="{{old('fechaAlimentacion')}}" required>
                <p class="txtDatosNU PNUE" >Tipo de alimento</p>
                    <select id="selectAlimento" class="camposNU tipoUsuarioNU CNUE selectTipoEDIT " name="tipoAlimento" required>
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
                        <p id="txtCantInv" class="txtDatosNR txtDatosNU PNUE" style="float: left;"></p>
                        <p id="txtUnidadMed" class="txtDatosNR txtDatosNU PNUE" style= "float: right"></p>
                        <input id="unidAlim " style="width:100%" class="camposNU CNUE" type="number" min="1" step="any" oninput="this.value = Math.abs(this.value)" name="cantidadAlimento" placeholder="Cantidad" value="{{old('cantidadAlimento')}}">
                </div>

                <button type="button" id="btnProgramar" class="btn btn-primary" style="background-color: transparent; border:solid #207558 .1rem; color:#207558">Programar alimentación</button>
                
                <div id="datosProgramacion" style="display:none; width:100%">
                    <div style="display: flex; width:100%; vertical-align:middle; flex-wrap:wrap; border:solid #207558 .1rem; margin-top:10px">
                        <p class="txtDatosNR txtDatosNU PNUE" style="width: 50%">Número de días:</p>
                        <input id="cantDiasProg"  style="width: 50%" class="camposNU CNUE" type="number" min="1" max="7" step="any" oninput="this.value = Math.abs(this.value)" name="cantDiasProg" placeholder="Número" value="{{old('cantidadAlimento')}}">
                    </div>
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
                             $('#txtCantInv').html("Cantidad: " + obj['cantidad']);
                             $('#txtUnidadMed').html("Unidad de medida: "+ obj2['abreviatura']);
                             $("#CantAlim").show();

                             aux=obj;
                         });

                         
                     });

                 </script>

                <script type="text/javascript">
                                        
                    $(document).ready(function() {
                        $('#btnValidate2').on('click', function () {
                            
                            if($('[name=tipoAlimento]').val()
                            && ($('[name=cantidadAlimento]').val() )&&
                            $('#fechaAlimentacion').val() 
                            ){
                                if(click2){
                                    if($('[name=cantDiasProg]').val() && $('#cantDiasProg').val() 
                                    && $('#cantDiasProg').val()>0){

                                        $("#btnValidate2").hide();
                                        $("#btnWard2").show();   
                                    }
                                    else{
                                        alert("Llene los campos de programación")
                                    }
                                }
                                else if ($('[name=cantidadAlimento]').val()<aux['cantidad']+1){
                                    $("#btnValidate2").hide();
                                    $("#btnWard2").show();   
                                }
                                else{
                                    alert("Llene los campos de manera correcta");
                                }

                            }
                            else {
                                alert("Llene los campos de manera correcta");
                            }
                                    
                        });
                    });
                </script>

            
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#btnProgramar').on('click', function () {
                            
                            if ($("#datosProgramacion").css('display')=='none'){
                                click2=true;
                                $("#datosProgramacion").show();    
                            }
                            else{
                                click2=false;
                                $("#datosProgramacion").hide();
                            }
                                    
                        });
                    });

                </script> 
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btnValidate2" type="button" style="background-color: gray; border:none; ">Validar</button>
                <input type="submit" style="display: none" class="btn btn-primary"  id="btnWard2" value="Guardar">             
            </div>
          </div>
        </div>
    </div>
    </form>
    <!--fin modal alimentar truchas -->
    <form method="POST" action="/sgtepetate/gestionTruchas/Conteo" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="modal" id="ModalConteo" tabindex="-1" role="dialog" style="overflow-y:scroll ">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #207558"><b>Conteo</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="display: flex; justify-content:center; vertical-align:middle; flex-wrap:wrap">
                    <p class="txtDatosNU PNUE" style="margin-bottom: 0%">Estanque</p> 
                    <input name="estanqueID" id="idSeleccionado3" class="camposNU CNUE" readonly>
                    <p class="txtDatosNU PNUE">Indique la fecha (aaaa-mm-ddT24:00)</p>
                    <input id="Fecha" class="camposNU CNUE" type="datetime-local" name="Fecha"  value="{{old('Fecha')}}" required>
                    <p class="txtDatosNU PNUE">Número de peces</p>
                    <input id="numpeces1" class="camposNU CNUE" type="number" min="1" max="999" step="any" oninput="this.value = Math.abs(this.value)" name="numpeces1" placeholder="Peces" value="{{old('numpeces1')}}" required>
                    <p class="txtDatosNU PNUE">Longitud (cm)</p>
                    <input class="camposNU CNUE" id="longpeces1" type="number" min="0.01" max="100" step="any" oninput="this.value = Math.abs(this.value)" name="longpeces1" placeholder="Longitud" value="{{old('longpeces1')}}" required>
                    <p class="txtDatosNU PNUE">Peso (gramos)</p>
                    <input class="camposNU CNUE" id="pesopeces1" type="number" min="0.01" max="500" step="any" oninput="this.value = Math.abs(this.value)" name="pesopeces1" placeholder="Peso" value="{{old('pesopeces1')}}" required>
                    <input class="camposNU CNUE" type="text" name="observaciones1" placeholder="Observaciones" style="width:100%; margin-bottom:10px" autofocus> <br>
                    
                    <button type="button" id="btnMortalidad" class="btn btn-primary" style="background-color: transparent; border:solid #207558 .1rem; color:#207558">Registrar mortalidad</button>
                    
                    <div id="divMortalidad" style="display:none">
                        <div style="display: flex; justify-content:center; vertical-align:middle; flex-wrap:wrap; border:solid #207558 .1rem; margin-top:10px">
                            <p class="txtDatosNU PNUE">Cantidad</p>
                            <input class="camposNU CNUE" type="number" min="1" max="999" step="any" oninput="this.value = Math.abs(this.value)" id="numPecesMuertos1" name="numPecesMuertos1" placeholder="Peces muertos" value="{{old('numPecesMuertos1')}}">
                            <p class="txtDatosNU PNUE">Causa de muerte</p>
                            <datalist class="camposNU tipoUsuarioNU CNUE selectTipoEDIT" id="datalistMuertes" required style="background-color: #207558">
                                @foreach ($enfermedades as $enfermedad)
                                    <option>
                                    {{$enfermedad->causaMuerte}}
                                    </option>    
                                @endforeach
                                    <option disable selected="selected"  hidden value=""> &nbsp; Seleccionar causa de muerte</option>
                            </datalist>
                            <input class="camposNU CNUE" list="datalistMuertes" name="CausaMuerte1" type="text">
                        </div>
                    </div> 
                    {{-- VALIDACION --}}
                    <script type="text/javascript">
                        
                        $(document).ready(function() {
                            $(document).ready(function() {
                                $('#btnMortalidad').on('click', function () {
                                    
                                    if ($("#divMortalidad").css('display')=='none'){
                                        click2=true;
                                        $("#divMortalidad").show();    
                                    }
                                    else{
                                        click2=false;
                                        $("#divMortalidad").hide();
                                    }
                                            
                            });
                        });

                        $('#btnValidate').on('click', function () {
                            if($('#numpeces1').val() && $('#numpeces1').val()>0 && $('#numpeces1').val()<10000 && 
                            $('#longpeces1').val() && $('#longpeces1').val()>0 && $('#longpeces1').val()<500 &&
                            $('#Fecha').val() && 
                            $('#pesopeces1').val() && $('#pesopeces1').val()>0 && $('#pesopeces1').val()<10000){
                                    
                                if(click2){
                                    if($('[name=CausaMuerte1]').val() && $('#numPecesMuertos1').val() 
                                    && $('#numPecesMuertos1').val()>0){
                                        $("#btnValidate").hide();
                                        $("#btnWard").show();
                                    }
                                    else{
                                        alert("Llene los campos de mortalidad")
                                    }
                                }
                                else{
                                        
                                        $("#btnWard").show();
                                        $("#btnValidate").hide();
                                    }
                            }          
                            else {
                                alert("Llene los campos de manera correcta");    
                            }    
                            });
                        });
                    </script>

    
                </div>
                <div class="modal-footer" >
                    <button class="btn btn-primary" id="btnValidate" type="button" style="background-color: gray; border:none; ">Validar</button>
                    <input type="submit" style="display: none" class="btn btn-primary"  id="btnWard" value="Guardar">               
                </div>
              </div>
            </div>
        </div>
        <!--fin modal conteo -->

    </form>
    
    
    
    
    

</div>
@endsection