@extends('layouts.menuGestor')

@section('importOwl')
<link rel="stylesheet" href="{{asset('css/estilosIE.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection

@section('menu')
<a href="/sgtepetate/ingresos-egresos" class="textoTitulosSeccion">
    Ingresos y Egresos
</a>/
<a href="#" class="textoTitulosSeccion">
    Conceptos
</a>
@endsection

@section('contenido')
<a href="/sgtepetate/ingresos-egresos/conceptos/create" class="btn btn-primary btn-icon-split btn-secundarioIE3" style="background-color: #207558">
    <span class="icon text-white-50">
        <i class="fas fa-plus-circle"></i>
    </span>
    <span class="text textBotonIE">Nuevo Concepto</span>
  </a>
<a href="{{ url()->previous() }}" class="linksIE" style="float: right">Regresar</a>
  <div class="card shadow mb-4" style="margin-top: 20px">
    <div class="card-body bodyIE">
      <div class="table-responsive bodyTablaIE">
        <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="num_tablaPedidos">#</th>
              <th class="cliente_tablaPedidos">Tipo</th>
              <th class="fecha_tablaPedidos">Nombre</th>
              <th class="tel_tablaPedidos">Descripción</th>
              <th class="estado_tablaPedidos" style="background-color: #207558"></i>Editar</th>
              <th class="estado_tablaPedidos" style="background-color: #e81003"></i>Eliminar</th> 
            </tr>
          </thead>
          <tbody>
              @foreach ($tipomov as $tm)
                <tr>
                    <td>{{$tm->idTipoMovimiento}}</td>
                    <td>{{$tm->egresoIngreso}}</td>
                    <td>{{$tm->nombre}}</td>
                    <td>{{$tm->descripcion}}</td>
                    <td style="text-align: center">
                        <a href="/sgtepetate/ingresos-egresos/conceptos/edit/{{$tm->idTipoMovimiento}}" class="btn_editar_EI">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td style="text-align: center">
                        @if ($tm->idTipoMovimiento>6)
                        <a href="" data-toggle="modal" data-target="#deleteModal" data-tmid="{{$tm->idTipoMovimiento}}" style="color: red">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        @else
                        <i class="fas fa-ban"></i>
                        @endif
                    </td>
                </tr> 
              @endforeach
          </tbody>
        </table>
      </div>
      <div style="width: 100%;height:10px;"></div>
    </div>
  </div>


  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar concepto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Estás seguro de que deseas eliminar este concepto? <br>
          Si eliminas esté concepto, todos los registros de ingresos, egresos y bitacora asociados a éste concepto también serán eliminados
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form action="/sgtepetate/ingresos-egresos/conceptos/{{$tm->idTipoMovimiento}}" method="post" 
            onsubmit="return confirm('¿Seguro que desas borrar este concepto? Se eliminarán TODOS los registros de ingresos, egresos y bitácora asociados a éste concepto')">
            @method('DELETE')
            @csrf
            <input type="hidden" id="tmid" name="tmid" value="">
            <button class="btn btn-primary btn-danger">Eliminar</button>
          </form>
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
        });
  </script>
@endsection