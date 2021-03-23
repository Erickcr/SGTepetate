@extends('layouts.menuGestor')

@section('menu')
<a href="/sgtepetate/inventario" class="textoTitulosSeccion">
  Gestión inventario
</a> /
<a href="#" class="textoTitulosSeccion">
  Inventario total
</a>
@endsection 

@section('contenido')
  <div class="container-fluid"> <!--se cambió-->
      <div class="card shadow mb-4"><!--se cambió, ambos para que la tabla fuera de todo lo ancho-->
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Inventario</h6>
          </div>
          <div class="card-body">
              <!--Aquí copié lo de tablas-->
              <div class="table-responsive">
              <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" width="100%" cellspacing="0">
                <thead > 
                  <tr>
                    <th style="text-align:center; vertical-align:middle" class="num_tablaInventario ">#</th>
                    <th style="text-align:center; vertical-align:middle" class="nombre_tablaInventario ">Nombre</th>
                    <th style="text-align:center; vertical-align:middle" class="cantidad_tablaInventario ">Cantidad</th>
                    <th style="text-align:center; vertical-align:middle" class="unidad_tablaInventario ">Unidad de medida</th>
                    <th style="text-align:center; vertical-align:middle" class="descripcion_tablaInventario ">Descripción</th>
                    <th style="text-align:center; vertical-align:middle" class="categoria_tablaInventario ">Categoría</th>
                    <th style="text-align:center; vertical-align:middle" class="editar_tablaInventario "></i>Editar</th>
                    <th style="text-align:center; vertical-align:middle" class="restar_tablaInventario "></i>Disminuir</th>
                    <th style="text-align:center; vertical-align:middle" class="sumar_tablaInventario "></i>Aumentar</th>
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