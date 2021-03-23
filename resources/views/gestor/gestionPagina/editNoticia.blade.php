@extends('layouts.menuGestor')

@section('importOwl')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection

@section('menu')
<a href="/sgtepetate/gestionPagina" class="textoTitulosSeccion">
  Noticias
</a>/
<a href="#" class="textoTitulosSeccion">
  Editar noticia
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
    @foreach ($noticias as $noticia)
        
        <div class="containerNR shadow">	
            <form class="formNR" action="/sgtepetate/gestionPagina/{{$noticia->idNoticia}}/patchNoticia" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div style="display: flex; width:100%;">
                  <p class="txtDatosNR txt-large" style="width: 95%">Título de la noticia</p>
                  <a class="txtDatosNR deleteGestionP"  href="#" data-toggle="modal" data-target="#logoutModal">
                      <i class="far fa-trash-alt " style="color: #e02c1b; font-size:20px; "></i>
                  </a>
              </div>
                <input class="camposNR" style="width:100%;"type="text" name="titulo" placeholder="Nombre de la noticia" value="{{$noticia->titulo}}" required autofocus>
                <p class="txtDatosNR" style="width: 100%">Contenido de la noticia</p>
                <textarea class="camposNR" type="text" name="texto" required style="width:100%;">{{$noticia->texto}}</textarea><br>
                <script>
                        CKEDITOR.replace( 'texto' );
                </script>
                <p class="txtDatosNR" style="width:100%">Botón (opcional):</p>
                <input class="camposNR" style="width:100%;"type="text" name="boton" placeholder="Texto de botón" value="{{$noticia->boton}}" autofocus>
                <input class="camposNR" type="text" name="link" placeholder="Dirección del enlace del botón" value="{{$noticia->link}}"  style="width:100%; margin-bottom:10px" autofocus> <br>
                <p class="txtDatosNR" style="width: 100%">Indique la fecha de publicación</p>
                <input class="camposNR" type="date" name="fecha" placeholder="Fecha" style="width:100%; margin bottom:10px" value="{{$noticia->fecha}}" required autofocus><br>
                <p class="txtDatosNR" style="width: 100%">Imagen de la noticia</p>
                <input class="camposNR imagenNR"  type="file" name="imagen" > <br>
                <div class="divBotonesNR">
                    <a class="btnCancelar " href="/sgtepetate/gestionPagina" style="text-decoration: none; text-align: center;">Cancelar</a>
                    <input class="btnAñadir" type="submit" value="Guardar cambios">	
                </div>

            </form>
        </div>
    @endforeach
    </div>

    @foreach ($noticias as $noticia)
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar noticia</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">¿Estás seguro de que deseas eliminar esta noticia?</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form action="/sgtepetate/gestionPagina/{{$noticia->idNoticia}}/deleteNoticia" method="POST">
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