@extends('layouts.menuPublicitaria')

@section('titulo')
    Solicitar Pedido
@endsection

@section('header')
<header class="masthead" style="background-image: url('img/imgPedido/CarritoBanner.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Solicitar Pedido</h1>
            <span class="subheading">Su solicitud será atendida lo más pronto posible. Agradacemos su preferencia.</span>
          </div>
        </div>
      </div>
    </div>
</header>
@endsection

@section('contenido')
    <div class="div_SmallSeparacion"></div>

    <br>
    
    <div class="mensaje">	
        <div class="encabezadoG"></div>
        <br>
        <p class="informacion">¡Los datos fueron enviados correctamente! </p>
        <br>
        <img class="img_icon" src="img/imgPedido/good.png">
        <br>
        <br>
        <a class="btn__submit" href="/" style="text-decoration: none;">PÁGINA DE INICIO </a>
	</div>

@endsection