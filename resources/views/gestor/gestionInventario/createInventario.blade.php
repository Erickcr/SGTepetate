@extends('layouts.menuGestor')

@section('menu')
<a href="/sgtepetate/inventario/categoria/{{$id }}" class="textoTitulosSeccion">
    {{$categoria->nombre}}
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
    <form class="formNR" action="/sgtepetate/inventario/addInventario/{{$id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p class="txtDatosNR" style="width: 100%">Nombre del elemento del nuevo inventario</p>
        <input class="camposNR" type="text" name="nombre" placeholder="Nombre del elemento" value="{{old('nombre')}}" style="width:100%; margin-bottom:10px" required autofocus> <br>
        <p class="txtDatosNR">Seleccionar unidad de medida</p>
        <button type="button" class="txtDatosNR" style="color:#207558; background-color:transparent; border:none" data-toggle="modal" data-target="#exampleModalCenter">
            Agregar nueva unidad de medida
        </button>
        <select class="selectProductoNR camposNR" style="width:100%;" name="unidadmedida" required >
            <option disable selected="selected" value="" hidden> &nbsp; Seleccionar unidad de medida</option>
            @foreach ($unidades as $unidad)
                <option>{{$unidad->abreviatura}}</option>
            @endforeach
        </select>
        <p class="txtDatosNR" style="width: 100%">Descripción del nuevo elemento del inventario</p>
        <input class="camposNR" type="text" name="descripcion" placeholder="Descripción del elemento" value="{{old('descripcion')}}"  style="width:100%; margin-bottom:10px" autofocus> <br>
        <div class="divBotonesNR">
            <a class="btnCancelar " href="/sgtepetate/inventario/categoria/{{$id }}" style="text-decoration: none; text-align: center;">Cancelar</a>
            <input class="btnAñadir" type="submit" value="Registrar elemento">	
        </div>
    </form>
</div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle" Style="color:#207558;">Agregar nueva unidad de medida</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <form action="/sgtepetate/inventario/addUnidad/{{$id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <p class="txtDatosNR" style="width:100%;">Nombre de la nueva unidad de medida</p>
                <input class="camposNR" type="text" name="nombre" placeholder="Nombre"  style="width:100%; margin-bottom:10px" autofocus> <br>
                <p class="txtDatosNR" style="width:100%;">Abreviatura</p>
                <input class="camposNR" type="text" name="abreviatura" placeholder="Abreviatura"  style="width:100%; margin-bottom:10px" required autofocus> <br>
                <p class="txtDatosNR" style="width:100%;">Tipo de unidad de medida (entero/decimal)</p>
                <select class="selectProductoNR camposNR" style="width:100%;" name="tipo" required >
                        <option selected="selected">Decimal</option>
                        <option>Entero</option>
                </select>
            </div>
            <br>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a href="/sgtepetate/inventario/addUnidad"><input type="submit"  value="Registrar" class="btn btn-primary"></a>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection