@extends('layouts.menuGestor')

@section('menu')
<a href="/sgtepetate/inventario/categoria/{{$categoria->idCategoria}}" class="textoTitulosSeccion">
    {{$categoria->nombre}}
</a> /
<a href="#" class="textoTitulosSeccion">
    Editar categoría
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
            <form class="formNR" action="/sgtepetate/inventario/patchCategoria/{{$categoria->idCategoria}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <p class="txtDatosNR" style="width: 100%">Nombre de la categoría</p>
                <input class="camposNR" type="text" name="nombre" placeholder="Nombre de la categoría" value="{{$categoria->nombre}}" style="width:100%; margin-bottom:10px" required autofocus> <br>
                <p class="txtDatosNR" style="width: 100%">Descripción de la categoría</p>
                <input class="camposNR" type="text" name="descripcion" placeholder="Descripción de la categoría" value="{{$categoria->descripcion}}"  style="width:100%; margin-bottom:10px" autofocus> <br>
                <p class="txtDatosNR" style="width: 100%">Imagen de la categoría</p>
                <input class="camposNR imagenNR"  type="file" name="foto"> <br>
                <div class="divBotonesNR">
                    <a class="btnCancelar " href="/sgtepetate/inventario/categoria/{{$categoria->idCategoria}}" style="text-decoration: none; text-align: center;">Cancelar</a>
                    <input class="btnAñadir" type="submit" value="Guardar cambios">	
                </div>
            </form>
        </div>
    </div>
@endsection