@extends('layouts.menuGestor')

@section('menu')
<a href="/sgtepetate/inventario" class="textoTitulosSeccion">
    Gestión inventario
  </a> /
<a href="#" class="textoTitulosSeccion">
    {{$categoria->nombre}}
</a>
@endsection

@section('contenido')


    <div class="botones_editar_eliminar_categoria" style="justify-content: space-between; margin-bottom:30px">
        
        <a href="/sgtepetate/inventario/addInventario/{{$categoria->idCategoria}}" class="btn btn-primary btn-icon-split btn-secundarioIE3" style="background-color: #207558">
            <span  class="icon text-white-50">
                <i style="margin-top:30%" class="fas fa-plus"></i>
            </span>
            <span class="text textBotonIE newItemI">Agregar nuevo item</span>
        </a>

        <a href='/sgtepetate/inventario/editCategoria/{{$categoria->idCategoria}}' class="btn btn-primary btn-icon-split btn-secundarioIE" style="background-color: #3e95cd; margin-left:5px; margin-top:5px; display:flex; justify-content:center; vertical-align:middle; border:none">
            <span class="icon text-white-50">
                <i style="margin-top:30%" class="fas fa-pencil-alt"></i>
            </span>
            <span class="text textBotonIE" >Editar Categoría</span>
        </a>



    </div>
    <div class="container-fluid"> <!--se cambió-->
        <div class="card shadow mb-4"><!--se cambió, ambos para que la tabla fuera de todo lo ancho-->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Inventario: {{$categoria->nombre}}
                </h6>
            </div>
            <div class="card-body">
                <!--Aquí copié lo de tablas-->
                <div class="table-responsive">
                <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="num_tablaInventario">#</th>
                        <th class="nombre_tablaInventario">Nombre</th>
                        <th class="cantidad_tablaInventario">Cantidad</th>
                        <th class="unidad_tablaInventario">Unidad de medida</th>
                        <th class="descripcion_tablaInventario">Descripción</th>
                        <th class="categoria_tablaInventario">Categoría</th>
                        <th class="editar_tablaInventario"></i>Editar</th>
                        <th class="restar_tablaInventario"></i>Disminuir</th>
                        <th class="sumar_tablaInventario"></i>Aumentar</th>
                        
                        {{--  --}} 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inventarios as $inventario) 
                        <tr>
                        <td>{{$inventario->idInventario}}</td>
                        <td>{{$inventario->nombre}}</td>
                        <td>{{$inventario->cantidad}}</td>
                        <td>{{$inventario->rel_unidad->abreviatura}}</td>
                        <td>{{$inventario->descripcion}}</td>
                        <td>{{$inventario->rel_categoria->nombre}}</td>
                        <td style="text-align: center"><a href="/sgtepetate/inventario/editInventario/{{$inventario->idInventario}}" class="btn_editar_EI"><i class="fas fa-pencil-alt" style="font-size: 16px; color:#3e95cd"></i></a></td>
                        <td style="text-align: center"><a href="/sgtepetate/inventario/minusInventario/{{$inventario->idInventario}}" class="btn_restar_EI"><i class="fas fa-minus" style="font-size: 16px; color:#e42c1b"></i></a></td>
                        <td style="text-align: center"><a href="/sgtepetate/inventario/plusInventario/{{$inventario->idInventario}}" class="btn_sumar_EI"><i class="fas fa-plus" style="font-size: 16px; color:#207558"></a></i></td>
                        </tr> 
                    @endforeach
                    
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <a class="btn_editar_eliminar_categoria" href="#" data-toggle="modal" data-target="#logoutModal" style="float: right; margin-right:30px">
        <button class="btn text-white shadhow-sm mb-4 bg-danger" >
            Eliminar Categoría
        </button> 
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar categoría: {{$categoria->nombre}}</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body"><p style="align:center">¿Estás seguro de que deseas eliminar esta categoría?</p> 
                <br> Se eliminarán todos los elementos relacionados a esta categoría y no podrán recuperarse</div>
            <div class="modal-footer" >
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form action="/sgtepetate/inventario/deleteCategoria/{{$categoria->idCategoria}}" method="POST">
                    {{csrf_field()}}
                    @method('DELETE')
                    <button class="btn bg-danger text-white" style="margin-top:17px">Eliminar</button>
                </form>
            </div>
          </div>
        </div>
      </div>   
@endsection

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>