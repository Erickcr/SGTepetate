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

    <p class="informacion">Su solicitud será enviada a nuestro personal correspondiente y nos comunicaremos a la brevedad para concretar su pedido.
        <br>*En caso de que el envío aplique, podrían agregarse costos extras.
    </p>
    <br>
    
    <div class="containerPedido">	
		<form class="form__reg" action="/enviarPedido" method="POST">
			<input class="inputW" type="text" name="nombre" placeholder="&#128100;  Nombre" required autofocus> <br>
            <input class="inputW" type="text" name="telefono" placeholder="&#128222;  Telefono" required> <br>
            <input class="inputW" type="text" name="direccion" placeholder="&#127968;   Dirección" required> <br>
            <input class="inputW" type="email" name="email" placeholder="&#128231;  Email" > <br>
            <textarea class="input" type="text"  name="descripcion" readonly=»readonly»> Descripción del pedido</textarea>
            <div class="btn__form">
                <a class="btn__submit" href="/carrito" style="text-decoration: none; text-align: center;">CANCELAR </a>
            	<input class="btn__reset" type="submit" value="ENVIAR">	
            </div>
		</form>
    </div>

@endsection