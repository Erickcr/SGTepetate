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
    Historial
</a>
@endsection

@section('contenido')
<div style="width: 100%; display:flex; flex-wrap:wrap; justify-content:space-between">
  <a href="/sgtepetate/ingresos-egresos/nuevo-registro" class="btn btn-primary btn-icon-split btn-secundarioIE3" style="background-color: #207558">
    <span class="icon text-white-50">
        <i class="fas fa-plus-circle"></i>
    </span>
    <span class="text textBotonIE">Registrar Movimiento</span>
  </a>
  <a href="/sgtepetate/ingresos-egresos" class="linksIE" style="float: right">Regresar</a>
</div>
  
  <div class="card shadow mb-4" style="margin-top: 20px;">
    <div class="card-body bodyIE">
      <div class="table-responsive bodyTablaIE" style="padding-right: 12px;">
        <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="num_tablaPedidos">#</th>
              <th class="cliente_tablaPedidos">Nombre</th>
              <th class="estado_tablaPedidos" style="background-color: #11a171"></i>Tipo</th>
              <th class="fecha_tablaPedidos">Concepto</th>
              <th class="tel_tablaPedidos" id="fecha">Fecha</th>
              <th class="monto_tablaPedidos">Descripción</th>
              <th class="estado_tablaPedidos">Monto</th>
              <th class="estado_tablaPedidos" style="background-color: #a1a1a1"></i>Editar</th>
              <th class="estado_tablaPedidos" style="background-color: #a1a1a1"></i>Eliminar</th> 
            </tr>
          </thead>
          <tbody>
              @foreach ($movF as $mf)
                <tr>
                    <td>{{$mf->idMovFinanciero}}</td>
                    <td>{{$mf->rel_bitacora->rel_usuario->nombre}}</td>
                    <td>{{$mf->rel_tipomov->egresoIngreso}}</td>
                    <td>{{$mf->rel_tipomov->nombre}}</td>
                    <td>{{$mf->rel_bitacora->fecha}}</td>
                    <td>{{$mf->concepto}}</td>
                    <td>$ {{$mf->monto}}</td>
                    <td style="text-align: center">
                        <a href="/sgtepetate/ingresos-egresos/historial/editar/{{$mf->idMovFinanciero}}" class="btn_editar_EI">
                          <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td style="text-align: center; vertical-align:middle;">
                        <a href="" data-toggle="modal" data-target="#deleteModal" data-mfid="{{$mf->idMovFinanciero}}" style="color: red">
                          <i class="far fa-trash-alt deleteUser" style="color: #e02c1b; font-size:24px;"></i>
                        </a>
                    </td>
                </tr> 
              @endforeach
          </tbody>
        </table>
      </div>
      <div style="width: 100%;height:10px;"></div>
    </div>
    <div class="card-body">
      <p>*Registro histórico de ingresos y egresos</p>
    </div>
  </div>


  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Estás seguro de que deseas eliminar este registro?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form action="/sgtepetate/ingresos-egresos/historial/delete/1" method="post">
            @method('DELETE')
            @csrf
            <input type="hidden" id="movfid" name="movfid" value="">
            <button class="btn btn-primary btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
        window.onload = function(){
            setTimeout(function(){
                document.getElementById('fecha').click();
            },10);
        }

        $(document).ready(function(){
          $('#deleteModal').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var mf_id = button.data('mfid') 

            var modal = $(this)
            modal.find('.modal-footer #movfid').val(mf_id)
          })
        });
  </script>
@endsection