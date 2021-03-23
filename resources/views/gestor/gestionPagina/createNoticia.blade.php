@extends('layouts.menuGestor')

@section('importOwl')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection

@section('menu')
<a href="/sgtepetate/gestionPagina" class="textoTitulosSeccion">
    Noticias
</a>/
<a href="#" class="textoTitulosSeccion">
    Agregar noticia
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
            <form class="formNR" action="/sgtepetate/gestionPagina/createNoticia" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="txtDatosNR" style="width: 100%">Título de la noticia</p>
                <input class="camposNR" style="width:100%;"type="text" name="titulo" placeholder="Nombre de la noticia" value="{{old('titulo')}}" required autofocus>
                <p class="txtDatosNR" style="width: 100%">Contenido de la noticia</p>
                <textarea class="camposNR" type="text" name="texto" required style="width:100%;">{{old('texto')}} </textarea><br>
                <script>
                        CKEDITOR.replace( 'texto' );
                </script>
                <p class="txtDatosNR" style="width: 100%">Botón (opcional):</p>
                <input class="camposNR" style="width:100%;"type="text" name="boton" placeholder="Texto de botón" value="{{old('boton')}}" autofocus>
                <input class="camposNR" type="text" name="link" placeholder="Dirección del enlace del botón" value="{{old('link')}}"  style="width:100%; margin-bottom:10px" autofocus> <br>
                <p class="txtDatosNR" style="width: 100%">Indique la fecha de publicación</p>
                <input class="camposNR" type="date" name="fecha" placeholder="Fecha" style="width:100%; margin bottom:10px"value="{{old('fecha')}}"  required autofocus><br>
                <p class="txtDatosNR" style="width: 100%">Imagen de la noticia</p>
                <input class="camposNR imagenNR"  type="file" name="imagen" required=""> <br>
                <div class="divBotonesNR">
                    <a class="btnCancelar " href="/sgtepetate/gestionPagina" style="text-decoration: none; text-align: center;">Cancelar</a>
                    <input class="btnAñadir" type="submit" value="Añadir">	
                </div>

            </form>
        </div>
    </div>
@endsection