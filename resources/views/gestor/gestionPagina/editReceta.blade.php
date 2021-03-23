@extends('layouts.menuGestor')

@section('importOwl')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection

@section('menu')
<a href="/sgtepetate/gestionPagina" class="textoTitulosSeccion">
    Recetas
</a>/
<a href="#" class="textoTitulosSeccion">
    Editar receta
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
        @foreach($recetas as $receta)
        
        <div class="containerNR shadow">	
            <form class="formNR" action="/sgtepetate/gestionPagina/{{$receta->idReceta}}/patchReceta" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div style="display: flex; width:100%;">
                    <p class="txtDatosNR txt-large" style="width: 95%">Nombre de la receta</p>
                    <a class="txtDatosNR deleteGestionP"  href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="far fa-trash-alt " style="color: #e02c1b; font-size:20px; "></i>
                    </a>
                </div>
                <input class="camposNR" style="width:100%;"type="text" name="nombre" placeholder="&#x1F37D; Nombre de la receta" value="{{$receta->nombre}}" required autofocus> <br>
                <p class="txtDatosNR">Producto</p>
                <select class="selectProductoNR camposNR" style="width:100%;" name="producto" required >
                    @foreach ($productos as $producto)
                        @if ($producto->nombre==$receta->rel_producto['nombre'])
                        <option selected="selected">{{$producto->nombre}}</option>
                        @else 
                        <option>{{$producto->nombre}}</option>
                        @endif
                    @endforeach
                </select>
                <p class="txtDatosNR">Descripción</p>
                <input class="camposNR" type="text" name="descripcion" placeholder="&#x270F; &nbsp; Descripción" value="{{$receta->descripcion}}"style="width:100%;"> <br>
                <p class="txtDatosNR">Ingredientes</p>
                <textarea class="camposNR" type="text" name="ingredientes" required style="width:100%;">{{$receta->ingredientes}} </textarea><br>
                <script>
                        CKEDITOR.replace( 'ingredientes' );
                </script>
                <p class="txtDatosNR" style="width:100%">Pasos</p>
                <textarea class="camposNR" type="text" name="pasos" required style="width:100%;">{{$receta->pasos}}</textarea><br>
                <script>
                        CKEDITOR.replace( 'pasos' );
                </script>
                <p class="txtDatosNR" style="width:100%">Enlace de video (link)</p>
                <input class="camposNR" type="url" name="url"  value="{{$receta->videoURL}}" placeholder="&#x1F3AC; &nbsp; Url del video" style="width:100%;"><br>
                <p class="txtDatosNR" style="width: 100%">Imagen de la receta</p>
                <input class="camposNR imagenNR"  type="file" name="imagen" placeholder="&#x40; Foto perfil" > <br>
                <div class="divBotonesNR">
                    <a class="btnCancelar " href="/sgtepetate/gestionPagina" style="text-decoration: none; text-align: center;">Cancelar</a>
                    <input class="btnAñadir" type="submit" value="Guardar cambios">	
                </div>
            </form>
        </div>
        @endforeach
</div>
@foreach ($recetas as $recetas)
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar receta</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">¿Estás seguro de que deseas eliminar esta receta?</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form action="/sgtepetate/gestionPagina/{{$receta->idReceta}}/deleteReceta" method="POST">
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