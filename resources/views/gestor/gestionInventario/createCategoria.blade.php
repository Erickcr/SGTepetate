@extends('layouts.menuGestor')

@section('menu')
<a href="/sgtepetate/inventario" class="textoTitulosSeccion">
    Gestión inventario
  </a> /
<a href="#" class="textoTitulosSeccion">
    Agregar categoría
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
            <form class="formNR" action="/sgtepetate/inventario/addCategoria" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="camposNR" type="text" name="nombre" placeholder="Nombre de la categoría" value="{{old('nombre')}}" style="width:100%; margin-bottom:10px" required autofocus> <br>
                <input class="camposNR" type="text" name="descripcion" placeholder="Descripción de la categoría" value="{{old('descripcion')}}"  style="width:100%; margin-bottom:10px" autofocus> <br>
                <p class="txtDatosNR" style="width: 100%">Imagen de la categoría</p>
                <input class="camposNR imagenNR"  type="file" name="foto" required=""> <br>
                <div class="divBotonesNR">
                    <a class="btnCancelar " href="/sgtepetate/inventario" style="text-decoration: none; text-align: center;">Cancelar</a>
                    <input class="btnAñadir" type="submit" value="Añadir">	
                </div>

            </form>
        </div>
    </div>
@endsection