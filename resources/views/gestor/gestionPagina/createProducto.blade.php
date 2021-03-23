@extends('layouts.menuGestor')

@section('importOwl')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection

@section('menu')
<a href="/sgtepetate/gestionPagina" class="textoTitulosSeccion">
    Productos
</a>/
<a href="#" class="textoTitulosSeccion">
    Agregar producto
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
            <form class="formNR" action="/sgtepetate/gestionPagina/createProducto" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="camposNR" type="text" name="nombre" placeholder="Nombre del producto" value="{{old('nombre')}}" style="width:100%; margin-bottom:10px" required autofocus><br>
                <input class="camposNR" type="text" name="descripcion" placeholder="Descripción" value="{{old('descripcion')}}" style="width:100%; margin-bottom:10px" autofocus><br>
                <input class="camposNR" type="number" min="1" step="any" name="precioMenudeo" placeholder="Precio: $" value="{{old('precioMenudeo')}}" style="margin-bottom:10px" required autofocus><br>
                <input class="camposNR" type="number" min="0" step="any" name="descuentoMenudeo" placeholder="Descuento: %" value="{{old('descuentoMenudeo')}}" style="margin-bottom:10px" required autofocus><br>
                <p class="txtDatosNR">Imagen del producto</p>
                <input class="camposNR imagenNR"  type="file" name="imagen"> <br>
                <div class="divBotonesNR">
                    <a class="btnCancelar " href="/sgtepetate/gestionPagina" style="text-decoration: none; text-align: center;">Cancelar</a>
                    <input class="btnAñadir" type="submit" value="Agregar">	
                </div>
            </form>
        </div> 
    </div>
@endsection