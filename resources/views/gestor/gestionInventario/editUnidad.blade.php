@extends('layouts.menuGestor')

@section('menu')
    <a href="/sgtepetate/inventario">Inventario</a> / <a href="/sgtepetate/inventario/editarUnidades">Unidades de medida</a> /
    Editar
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
        <form class="formNR" action="/sgtepetate/inventario/editarUnidad/{{$unidad->idUnidadMedida}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-body">
                <p class="txtDatosNR" style="width:100%;">Nombre de la nueva unidad de medida</p>
                <input class="camposNR" type="text" value="{{$unidad->nombre}}" name="nombre" placeholder="Nombre"  style="width:100%; margin-bottom:10px" autofocus> <br>
                <p class="txtDatosNR" style="width:100%;">Abreviatura</p>
                <input class="camposNR" type="text" value="{{$unidad->abreviatura}}" name="abreviatura" placeholder="Abreviatura"  style="width:100%; margin-bottom:10px" required autofocus> <br>
                <p class="txtDatosNR" style="width:100%;">Tipo de unidad de medida (entero/decimal)</p>
                <select class="selectProductoNR camposNR" style="width:100%;" name="tipo" required >
                        @if ($unidad->tipo=='Decimal')
                            <option selected="selected">Decimal</option>
                            <option>Entero</option>
                        @endif
                        @if ($unidad->tipo=='Entero')
                            <option>Decimal</option>
                            <option selected="selected">Entero</option>
                        @endif
                </select>
            </div>
            <br>
            <div class="divBotonesNR">
                <a class="btnCancelar " href="/sgtepetate/inventario/editarUnidades" style="text-decoration: none; text-align: center;">Cancelar</a>
                <input class="btnAñadir" type="submit" value="Guardar cambios">	
            </div>
        </form>
    </div>
 </div>
@endsection