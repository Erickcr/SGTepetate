@extends('layouts.menuGestor')

@section('importOwl')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection

@section('menu')
<a href="/sgtepetate/gestionPagina" class="textoTitulosSeccion">
    Ofertas
</a>/
<a href="#" class="textoTitulosSeccion">
    Agregar oferta
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
            <form class="formNR" action="/sgtepetate/gestionPagina/createOferta" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="txtDatosNR" style="width: 100%">Titulo del anuncio</p>
                <input class="camposNR" type="text" name="titulo" placeholder="Titulo del anuncio" value="{{old('titulo')}}" style="width:100%; margin-bottom:10px" required autofocus>
                <p class="txtDatosNR "style="width: 100%">Contenido del anuncio</p>
                <input class="camposNR" type="text" name="texto" placeholder="Texto del anuncio" value="{{old('texto')}}" style="width:100%; margin-bottom:10px" required autofocus> <br><br><br><br>
                <div style="width: 100%;margin-top:10px">
                    <p class="txtDatosNR" style="width: 100%">Seleccione el tipo</p>
                    @if(old('oferta') == 1)
                        <input style=" margin-left:10px" type="radio" id="anuncio" name="oferta" value="0">
                        <label for="anuncio">Anuncio</label><br>
                        <input style=" margin-left:10px" type="radio" id="oferta" name="oferta" value="1" checked>
                        <label for="oferta">Oferta</label><br>
                    @else
                        <input style=" margin-left:10px" type="radio" id="anuncio" name="oferta" value="0" checked>
                        <label for="anuncio">Anuncio</label><br>
                        <input style=" margin-left:10px" type="radio" id="oferta" name="oferta" value="1">
                        <label for="oferta">Oferta</label><br>
                    @endif
                </div>
                <p class="txtDatosNR" style="width: 100%">Botón (opcional):</p>
                <input class="camposNR" type="text" name="boton" placeholder="Texto del botón" value="{{old('boton')}}" style="width:100%; margin-bottom:10px" autofocus>
                <input class="camposNR" type="text" name="link" placeholder="Dirección del enlace del botón" value="{{old('link')}}" style="width:100%; margin-bottom:10px" autofocus>
                <p class="txtDatosNR" style="width: 100%">Imagen deL anuncio</p>
                <input class="camposNR imagenNR"  type="file" name="imagen" required=""> <br>
                <div class="divBotonesNR">
                    <a class="btnCancelar " href="/sgtepetate/gestionPagina" style="text-decoration: none; text-align: center;">Cancelar</a>
                    <input class="btnAñadir" type="submit" value="Añadir">	
                </div>

            </form>
        </div>
    </div>
@endsection