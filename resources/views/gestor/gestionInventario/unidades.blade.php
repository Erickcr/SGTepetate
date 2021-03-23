@extends('layouts.menuGestor')

@section('menu')
    <a href="/sgtepetate/inventario">Inventario</a> / Unidades de medida
@endsection

@section('contenido')
  <div class="container-fluid"> <!--se cambió-->
      <div class="card shadow mb-4"><!--se cambió, ambos para que la tabla fuera de todo lo ancho-->
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Unidades de medida</h6>
          </div>
          <div class="card-body">
              <!--Aquí copié lo de tablas-->
              <div class="table-responsive">
              <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="num_tablaInventario">#</th>
                    <th class="nombre_tablaInventario">Nombre</th>
                    <th class="cantidad_tablaInventario">Abreviatura</th>
                    <th class="descripcion_tablaInventario">Tipo</th>
                    <th class="editar_tablaInventario"></i>Editar</th>
                    {{--  --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach($unidades as $unidad) 
                        <tr>
                            <td>{{$unidad->idUnidadMedida}}</td>
                            <td>{{$unidad->nombre}}</td>
                            <td>{{$unidad->abreviatura}}</td>
                            <td>{{$unidad->tipo}}</td>
                            <td style="text-align: center"><a href="/sgtepetate/inventario/editarUnidad/{{$unidad->idUnidadMedida}}" class="btn_editar_EI"><i class="fas fa-edit"></i></a></td>
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