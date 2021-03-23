@extends('layouts.menuGestor')

@section('importOwl')
<link rel="stylesheet" href="{{asset('css/estilosIE.css')}}">
<!-- Importando owl carousel -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection

@section('menu')
<a href="/sgtepetate/ingresos-egresos" class="textoTitulosSeccion">
    Ingresos y Egresos
</a>/
<a href="/sgtepetate/ingresos-egresos/conceptos" class="textoTitulosSeccion">
    Conceptos
</a>/
<a href="#" class="textoTitulosSeccion">
    Agregar Concepto
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
<div class="containerIE shadow">
    <form class="formIE" action="/sgtepetate/ingresos-egresos/conceptos/create" method="POST" enctype="multipart/form-data">
        @csrf
        <p class="txtDatosNR">Tipo de movimiento</p>
        <select class="selectProductoNR camposNR" name="tipoMovimiento" required>
            <option value="Ingreso">Ingreso</option>
            <option value="Egreso">Egreso</option>
            <option disable selected="selected" hidden value=""> &nbsp; Seleccionar movimiento</option>
        </select>
        <p class="txtDatosNR">Nombre</p>
        <input class="camposNR" type="text" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
        <textarea class="camposNR" placeholder="&#x1F5CA; &nbsp; Descripcion" type="text" name="descripcion" required style="width:100%; resize:none">{{old('descripcion')}}</textarea><br>
        <div class="divBotonesNR">
            <a class="btnCancelar " href="/sgtepetate/ingresos-egresos" style="text-decoration: none; text-align: center;">Cancelar</a>
            <input class="btnAñadir" type="submit" value="Añadir">	
        </div>
    </form>
</div>
</div>
    
@endsection