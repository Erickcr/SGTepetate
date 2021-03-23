@extends('layouts.menuGestor')

@section('importOwl')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection

@section('menu')
    <a href="/sgtepetate/gestionBitacora" class="textoTitulosSeccion">
    Bitácora
</a>/
<a href="#" class="textoTitulosSeccion">
    Tareas pendientes
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
        </div>
      <div class="card shadow mb-4"><!--se cambió, ambos para que la tabla fuera de todo lo ancho-->
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tareas pendientes</h6>
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
                    <th class="num_tablaBitacora" id="id">#</th>
                    <th class="usuario_tablaBitacora">Nombre</th>
                    <th class="fecha_tablaBitacora">Fecha de registro de tarea</th>
                    <th class="descripcion_tablaBitacora">Descripción</th>
                    <th class="editar_tablaBitacora"></i>Eliminar</th>
                    <th class="editar_tablaBitacora"></i>Marcar como completada</th>
                    {{--  --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($bitacoras as $bitacora)
                  
                  <tr>
                    <td>{{$bitacora->idBitacora}}</td>
                    <td>{{$bitacora->relacionBitacoraUsuario['nombre']}}</td>
                    <td>{{$bitacora->fecha}}</td>
    
                    <td>{{$bitacora->descripcion}}</td>
                    <td style="text-align: center"><a href="" data-toggle="modal" data-target="#deleteModal" data-tmid="{{$bitacora->idBitacora}}" class="btn_editar_EI" style="color: red">
                            <i class="far fa-trash-alt" style="font-size:18px;"></i>
                        </a></td>
                        <td style="text-align: center"><a href="" data-toggle="modal" data-target="#editModal" data-tmid="{{$bitacora->idBitacora}}" class="btn_editar_EI">
                            <i class="fas fa-calendar-check"></i>
                        </a></td>
                  </tr>
                 
                    
                  @endforeach       
                </tbody>
              </table>
            </div>
          </div>
         
      </div>

      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar tarea</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ¿Estás seguro de que deseas eliminar esta tarea?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <form action="/sgtepetate/gestionTareasPendientes/1" method="post">
                @method('DELETE')
                @csrf
                <input type="hidden" id="tmid" name="tmid" value="">
                <button class="btn btn-primary btn-danger" style="margin-top:17px;">Eliminar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Completar tarea</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ¿Estás seguro de que deseas marcar esta tarea como completada?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" style=" width:60px;">No</button>
              <form action="/sgtepetate/gestionTareasPendientes/1" method="post">
                @method('PATCH')
                @csrf
                <input type="hidden" id="tmid" name="tmid" value="">
                <button class="btn btn-primary" style="margin-top:17px; width:60px;">Si</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    
  </div>

  <script>
        $(document).ready(function(){
          $('#deleteModal').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var tm_id = button.data('tmid') 
            console.log(tm_id)
            var modal = $(this)
            modal.find('.modal-footer #tmid').val(tm_id)
          })
          $('#editModal').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var tm_id = button.data('tmid') 
            console.log(tm_id)
            var modal = $(this)
            modal.find('.modal-footer #tmid').val(tm_id)
          })
        });
  </script>
  

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