@extends('layouts.menuGestor')

@section('importOwl')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection

@section('menu')
<a href="/sgtepetate/gestionPagina" class="textoTitulosSeccion">
    Ofertas
</a>/
<a href="#" class="textoTitulosSeccion">
    Editar oferta
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
    @foreach($ofertas as $oferta)
        
        <div class="containerNR shadow">	
            <form class="formNR" action="/sgtepetate/gestionPagina/{{$oferta->idOferta}}/patchOferta" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div style="display: flex; width:100%;">
                    <p class="txtDatosNR txt-large" style="width: 95%">Título del anuncio:</p>
                    <a class="txtDatosNR deleteGestionP"  href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="far fa-trash-alt " style="color: #e02c1b; font-size:20px; "></i>
                    </a>
                </div>
                <input class="camposNR" type="text" name="titulo" placeholder="Titulo del anuncio" value="{{$oferta->titulo}}" style="width:100%; margin-bottom:10px" required autofocus>
                <p class="txtDatosNR" style="width: 100%">Contenido del anuncio</p>
                <input class="camposNR" type="text" name="texto" placeholder="Texto de la oferta" value="{{$oferta->texto}}" style="width:100%; margin-bottom:10px" required autofocus> <br><br><br><br>
                <div style="width: 100%;margin-top:10px;">
                    <p class="txtDatosNR" style="width: 100%">Seleccione el tipo</p>
                    @if($oferta->oferta == 1)
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
                <p class="txtDatosNR" style="width: 100%">Botón (opcional)</p>
                <input class="camposNR" type="text" name="boton" placeholder="Texto del botón" value="{{$oferta->boton}}" style="width:100%; margin-bottom:10px" autofocus>
                <input class="camposNR" type="text" name="link" placeholder="Dirección del enlace del botón" value="{{$oferta->link}}" style="width:100%; margin-bottom:10px" autofocus>
                <p class="txtDatosNR" style="width: 100%">Imagen de la oferta</p>
                <input class="camposNR imagenNR"  type="file" name="imagen"> <br>
                <div class="divBotonesNR">
                    <a class="btnCancelar " href="/sgtepetate/gestionPagina" style="text-decoration: none; text-align: center;">Cancelar</a>
                    <input class="btnAñadir" type="submit" value="Guardar cambios">	
                </div>
            </form>
        </div>
     @endforeach   
    </div>

    @foreach ($ofertas as $oferta)
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar oferta</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">¿Estás seguro de que deseas eliminar esta oferta?</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form action="/sgtepetate/gestionPagina/{{$oferta->idOferta}}/deleteOferta" method="POST">
                    {{csrf_field()}}
                    @method('DELETE')
                    <button class="btn bg-danger text-white">Eliminar</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach
@endsection