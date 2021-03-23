@extends('layouts.menuGestor')

@section('menu')
   <a href="/sgtepetate/inventario/categoria/{{$inventario->categoria}}" class="textoTitulosSeccion">
    Inventario
  </a> /
  <a href="#" class="textoTitulosSeccion">
    Disminuir {{$inventario->nombre}}
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
        <form class="formNR" action="/sgtepetate/inventario/minuspatchInventario/{{$inventario->idInventario}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <p class="txtDatosNR">Indique la cantidad que desea disminuir en: <b>{{$inventario->nombre}}</b></p>
            <p class="txtDatosNR">Cantidad actual: {{$inventario->cantidad}}</p>
            @if($inventario->rel_unidad->tipo=='Entero')
                <input class="camposNR" type="number"  max="{{$inventario->cantidad}}" min="0"  value="{{old('cantidad')}}" name="cantidad" placeholder="Cantidad" style="width:90%; margin-bottom:10px" required autofocus> <br>
            @else
                <input class="camposNR" type="number"  max="{{$inventario->cantidad}}" min="0" value="{{old('cantidad')}}" step="any" name="cantidad" placeholder="Cantidad" style="width:90%; margin-bottom:10px" required autofocus> <br>
            @endif
            <p class="txtDatosNR">Indique la fecha</p>
            <input class="camposNR" type="datetime-local" name="fecha" placeholder="Fecha" style="width:90%; margin bottom:10px" required autofocus><br>
            <p class="txtDatosNR">Descripción de actividad</p>
            <input class="camposNR" type="text" name="descripcion" placeholder="Descripción" style="width:90%; margin bottom:10px" vale="{{ old('descripcion') }}" required autofocus><br>
            <div class="divBotonesNR">
                <a class="btnCancelar " href="/sgtepetate/inventario/categoria/{{$inventario->categoria}}" style="text-decoration: none; text-align: center;">Cancelar</a>
                <input class="btnAñadir" type="submit" value="Guardar cambios">	
            </div>
        </form>
    </div>
</div>
@endsection