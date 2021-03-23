@extends('layouts.menuGestor')

@section('menu')
    <a href="/sgtepetate/gestionBitacora" class="textoTitulosSeccion">
    Bitácora
</a>
@endsection

@section('contenido')
<script>
  window.onload = function(){
            setTimeout(function(){
                document.getElementById('#id').click();
            },10);
        }
  </script>
  <div class="container-fluid"> <!--se cambió-->
  <div class="botones_editar_eliminar_categoria" style="justify-content: space-between; margin-bottom:30px">
  <a href="/sgtepetate/gestionBitacora/nuevaBitacora" class="btn btn-primary btn-icon-split btn-secundarioIE" style="background-color: #207558; float:rigth;">
        <span class="icon text-white-50">
            <i style="margin-top:30%"  class="fas fa-plus-circle"></i>
        </span>
        <span class="text textBotonIE">Nueva bitácora</span>
    </a>
    <a href='/sgtepetate/gestionTareasPendientes/' class="btn btn-primary btn-icon-split btn-secundarioIE" style="background-color: #3e95cd; margin-left:5px; margin-top:5px; display:flex; justify-content:center; vertical-align:middle; border:none">
            <span class="icon text-white-50">
                <i style="margin-top:30%"  class="fas fa-clock"></i>
            </span>
            <span class="text textBotonIE" >Ver tareas pendientes</span>
        </a>
        </div>
      <div class="card shadow mb-4"><!--se cambió, ambos para que la tabla fuera de todo lo ancho-->
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Bitácora completa</h6>
          </div>
          <div class="card-body">
          @if($errors->any())
              <div class="alert alert-danger" role="alert">
                  <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
              <!--Aquí copié lo de tablas-->
              <div class="table-responsive" style="padding-right:12px;">
              <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="num_tablaBitacora" id="#id">#</th>
                    <th class="usuario_tablaBitacora">Nombre</th>
                    <th class="fecha_tablaBitacora">Fecha</th>
                    <th class="actividad_tablaBitacora">Actividad</th>
                    <th class="descripcion_tablaBitacora">Descripción</th>
                    <th class="editar_tablaBitacora"></i>Editar</th>
                    {{--  --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($bitacoras as $bitacora)
                  
                  <tr>
                    <td>{{$bitacora->idBitacora}}</td>
                    <td>{{$bitacora->relacionBitacoraUsuario['nombre']}}</td>
                    <td>{{$bitacora->fecha}}</td>

                    <td>
                    @foreach ($bitacora->relacionBitacoraActividad as $bitacorita)
                    {{$bitacorita['nombre']}} <br>
                    @endforeach
                    </td>
                    
                    <td>{{$bitacora->descripcion}}</td>
                    <td style="text-align: center"><a href="/sgtepetate/gestionBitacora/editBitacora/{{$bitacora->idBitacora}}" class="btn_editar_EI"><i class="fas fa-edit"></i></a></td>
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