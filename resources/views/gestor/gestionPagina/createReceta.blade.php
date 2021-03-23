@extends('layouts.menuGestor')

@section('importOwl')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection

@section('menu')
<a href="/sgtepetate/gestionPagina" class="textoTitulosSeccion">
    Recetas
</a>/
<a href="#" class="textoTitulosSeccion">
    Agregar receta
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
            <form class="formNR" action="/sgtepetate/gestionPagina/createReceta" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="camposNR" type="text" name="nombre" placeholder="Nombre de la receta" value="{{old('nombre')}}" required autofocus> <br>
                <select class="selectProductoNR camposNR" name="producto" required>
                    @foreach ($productos as $producto)
                        <option>{{$producto->nombre}}</option>
                    @endforeach
                    <option disable selected="selected" hidden value=""> &nbsp; Seleccionar producto</option>
                </select>
                <input class="camposNR" type="text" name="descripcion" placeholder="Descripción" value="{{old('descripcion')}}"style="width:100%;"> <br>
                <p class="txtDatosNR">Ingredientes</p>
                <textarea class="camposNR" type="text" name="ingredientes" value="" required style="width:100%;">{{old('ingredientes')}}</textarea><br>
                <script>
                        CKEDITOR.replace( 'ingredientes' );
                </script>
                <p class="txtDatosNR" style="width: 100%">Pasos</p>
                <textarea class="camposNR" type="text" name="pasos" value="" required style="width:100%;">{{old('pasos')}}</textarea><br>
                <script>
                        CKEDITOR.replace( 'pasos' );
                </script>
                <input class="camposNR" type="url" name="url" value="{{old('url')}}" placeholder="Url del video" style="width:100%;"><br>
                <p class="txtDatosNR" style="width: 100%"> 	&#x1F4F7; &nbsp;Imagen de la receta</p>
                <input class="camposNR imagenNR"  type="file" name="imagen"  required="" multiple> <br>
                <div class="divBotonesNR">
                    <a class="btnCancelar " href="/sgtepetate/gestionPagina" style="text-decoration: none; text-align: center;">Cancelar</a>
                    <input class="btnAñadir" type="submit" value="Añadir">	
                </div>
            </form>
        </div>
    </div>
@endsection