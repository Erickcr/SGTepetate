@extends('layouts.menuGestor')

@section('menu')
<a href="/sgtepetate/inventario/categoria/{{$inventario->categoria}}" class="textoTitulosSeccion">
  Inventario
</a> /
<a href="#" class="textoTitulosSeccion">
  Editar elemento
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
    <form class="formNR" action="/sgtepetate/inventario/patchInventario/{{$inventario->idInventario}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div style="display: flex; width:100%; margin-top:2%">
          <p class="txtDatosNR txt-large" style="width: 95%">Nombre del elemento del inventario</p>
          <a class="btn_eliminar_inventario"  href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="far fa-trash-alt " style="color: #e02c1b; font-size:20px; "></i>
          </a>
        </div>

        <input class="camposNR" type="text" name="nombre" placeholder="Nombre del elemento" value="{{$inventario->nombre}}" style="width:100%; margin-bottom:10px" required autofocus> <br>
        <p class="txtDatosNR">Seleccionar categoría</p>
        <select class="selectProductoNR camposNR" style="width:100%;" name="categoria" required >
            @foreach ($categorias as $categoria)
                @if ($categoria->nombre==$inventario->rel_categoria['nombre'])
                    <option selected="selected">{{$categoria->nombre}}</option>
                @else 
                    <option>{{$categoria->nombre}}</option>
                @endif
            @endforeach
        </select>
        <p class="txtDatosNR">Seleccionar unidad de medida</p>
        <button type="button" class="txtDatosNR" style="color:#207558; background-color:transparent; border:none" data-toggle="modal" data-target="#exampleModalCenter">
            Agregar nueva unidad de medida
        </button>
        <select class="selectProductoNR camposNR" style="width:100%;" name="unidadmedida" required >
            @foreach ($unidades as $unidad)
                @if ($unidad->abreviatura==$inventario->rel_unidad['abreviatura'])
                    <option selected="selected">{{$unidad->abreviatura}}</option>
                @else 
                    <option>{{$unidad->abreviatura}}</option>
                @endif
            @endforeach
        </select>
        <p class="txtDatosNR" style="width: 100%">Descripción del elemento del inventario</p>
        <input class="camposNR" type="text" name="descripcion" placeholder="Descripción del elemento" value="{{$inventario->descripcion}}"  style="width:100%; margin-bottom:10px" autofocus> <br>
        <div class="divBotonesNR">
            <a class="btnCancelar " href="/sgtepetate/inventario/categoria/{{$inventario->categoria}}" style="text-decoration: none; text-align: center;">Cancelar</a>
            <input class="btnAñadir" type="submit" value="Guardar cambios">	
        </div>
    </form>
</div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar inventario: {{$inventario->nombre}}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><p align="center">¿Estás seguro de que deseas eliminar este inventario?</p> 
            <br> Se eliminarán todos los elementos relacionados a este inventario y no podrán recuperarse</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <form action="/sgtepetate/inventario/deleteInventario/{{$inventario->idInventario}}" method="POST">
                {{csrf_field()}}
                @method('DELETE')
                <button class="btn bg-danger text-white">Eliminar</button>
            </form>
        </div>
      </div>
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
        
        <form action="/sgtepetate/inventario/addUnidad/{{$inventario->idInventario}}" method="POST" enctype="multipart/form-data">
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
            <a href="/sgtepetate/inventario/addUnidad"><input type="submit"  value="Guardar cambios" class="btn btn-primary"></a>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection