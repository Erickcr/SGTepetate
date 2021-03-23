@extends('layouts.menuGestor')

@section('menu')
@endsection

@section('generarReporte')
    
@endsection

@section('contenido')
<div class="text-center">
    <img src="{{asset('img/logo1-black.png')}}" alt="" style="width: 400px;height:200px">
    <div class="error mx-auto" data-text="403">403</div>
    <p class="lead text-gray-800 mb-5">No estás autorizado para estar aquí</p>
    <a href="/sgtepetate">&larr; Volver a Inicio</a>
  </div>
@endsection
