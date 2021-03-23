@extends('layouts.menuGestor')

@section('importOwl')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection

@section('menu')
<a href="/sgtepetate/gestionPagina" class="textoTitulosSeccion">
    Productos
</a>/
<a href="#" class="textoTitulosSeccion">
    Editar producto
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
    @foreach($productos as $producto)
        {{-- <div class="div_eliminarGP">
            <a class="" href="#" data-toggle="modal" data-target="#logoutModal">
                <button class="btn text-white shadhow-sm mb-4 bg-danger" >
                    Eliminar
                </button> 
            </a>
        </div> --}}
        <div class="containerNR shadow">
            <form class="formNR" action="/sgtepetate/gestionPagina/{{$producto->idProducto}}/patchProducto" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div style="display: flex; width:100%;">
                    <p class="txtDatosNR txt-large" style="width: 95%">Nombre del producto</p>
                    <a class="txtDatosNR deleteGestionP"  href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="far fa-trash-alt " style="color: #e02c1b; font-size:20px; "></i>
                    </a>
                </div>
                <input class="camposNR" type="text"  name="nombre" placeholder="Nombre del producto" value="{{$producto->nombre}}" style="width:100%; margin-bottom:10px" required autofocus><br>
                <p class="txtDatosNR " style="width: 100%">Descripción del producto</p>
                <input class="camposNR" type="text" name="descripcion" placeholder="Descripción" value="{{$producto->descripcion}}" style="width:100%; margin-bottom:10px" autofocus><br>
                <p class="txtDatosNR">Precio: $</p>
                <input class="camposNR" type="number" min="1" step="any" name="precioMenudeo" placeholder="Precio de menudeo: $" value="{{$producto->precioMenudeo}}" style="margin-bottom:10px" required autofocus><br>
                <p class="txtDatosNR">Descuento: %</p>
                <input class="camposNR" type="number" min="0" step="any" name="descuentoMenudeo" placeholder="Descuento de menudeo: %" value="{{$producto->descuentoMenudeo}}" style="margin-bottom:10px" required autofocus><br>
                <p class="txtDatosNR" style="width: 100%">Imagen del producto</p>
                <input class="camposNR imagenNR"  type="file" name="imagen"> <br>
                <div class="divBotonesNR">
                    <a class="btnCancelar " href="/sgtepetate/gestionPagina" style="text-decoration: none; text-align: center;">Cancelar</a>
                    <input class="btnAñadir" type="submit" value="Guardar cambios">	
                </div>

            </form>
        </div>

        
        
     @endforeach   
    </div>
    @foreach ($productos as $producto)
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">¿Estás seguro de que deseas eliminar este producto?</div>
            <div class="modal-footer">
              <button class="btn btn-secondary " type="button" data-dismiss="modal">Cancelar</button>
                <form action="/sgtepetate/gestionPagina/{{$producto->idProducto}}/deleteProducto" method="POST">
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