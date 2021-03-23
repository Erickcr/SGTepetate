<!DOCTYPE html>
<html lang="en">

<head>
    <title>Granja El Tepetate - Solictud de Pedido</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('/img/logo.png')}}" type="image/icon type">

    <!-- Custom styles for this template-->
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

<body style="background-color: #fafafa; font-family: Roboto;">
    <div class="headerSP">
        <a href="/"><img src="/img/logo1.png"></a>
    </div>
<section>
    <div class="container">
        <div class="row">
            <form action="/solicitar-pedido" method="POST">
                @csrf
                <div class="spTable">
                    <div class="spRow p602">
                        <div class="containerPedido">
                            @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif
                            <h2 style="font-weight: 400;">Información del pedido:</h2>
                            <ul class="informacion">
                                <li>Su solicitud será enviada a nuestro personal correspondiente y nos comunicaremos a la brevedad para concretar su pedido.</li>
                                <li>Es posible que se aplquen cargos extras del envío.</li>
                            </ul>
                            <h2 style="font-weight: 400;">Datos del pedido:</h2>	
                            <div class="form__reg">
                                <input class="inputW" type="text" name="nombre" placeholder="&#128100;  Nombre" required autofocus>
                                <input class="inputW" type="text" name="telefono" placeholder="&#128222;  Telefono" required>
                                <input class="inputW" type="text" name="direccion" placeholder="&#127968;   Dirección" required>
                                <input class="inputW" type="email" name="email" placeholder="&#128231;  Email" required>
                                <textarea class="input" type="text"  name="descripcion" placeholder="Notas del pedido"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="spRow p402 pad50">
                        <div style="background-color: #fff; width: 100%; height:fit-content; padding: 15px; -webkit-box-shadow: 1px 1px 24px -11px rgba(0,0,0,0.75);
                        -moz-box-shadow: 1px 1px 24px -11px rgba(0,0,0,0.75);
                        box-shadow: 1px 1px 24px -11px rgba(0,0,0,0.75);">
                            @if(session('cart'))

                                <h2 style="font-weight: 400;">Detalles del pedido</h2>
                            

                                @php

                                    $total = 0;

                                @endphp

                                <div class="spTable" style="font-size: 15px;">
                                    <div class="spPedidoRow">
                                        <div class="spRow2">
                                            Producto
                                        </div>
                                        <div class="spRow2">
                                            Precio
                                        </div>
                                        <div class="spRow2">
                                            Cantidad
                                        </div>
                                        <div class="spRow2">
                                            Total
                                        </div>
                                    </div>
                                    
                                    <!--PRODUCTOS DEL CARRITO-->
                                    @foreach(session('cart') as $id => $details)
                                        @foreach($productos as $productoCarrito)
                                            @if($productoCarrito['idProducto'] == $details['id'])
                                                <div class="spPedidoRow">

                                                    <!--PRODUCTO-->
                                                    <div style="width: 50%;" class="spPedidoCell">
                                                        <div style="width: 75%; height: fit-content;">
                                                            {{$productoCarrito->nombre}}
                                                        </div>
                                                    </div>
                                    
                                                    <!--PRECIO-->
                                                    <div class="spPedidoCell" style="text-align: center">
                                                        @php
                                                            $nuevoPrecio = $productoCarrito->precioMenudeo - ($productoCarrito->precioMenudeo * $productoCarrito->descuentoMenudeo/100)
                                                        @endphp
                                                        ${{$nuevoPrecio}}
                                                    </div>

                                                    <!--CANTIDAD-->
                                                    <div class="spPedidoCell" style="text-align: center">
                                                        {{ $details['quantity'] }}
                                                    </div>
                                                        
                                                    <!--Subtotal-->
                                                    <div class="spPedidoCell" style="text-align: right; padding-right: 20px;">
                                                        @php
                                                            $precioFinal = $nuevoPrecio * $details['quantity'];
                                                            
                                                            $total += $precioFinal
                                                        @endphp
                                                        ${{ $precioFinal }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>

                                <div style="border-top: 1px solid black; border-color: rgb(238, 238, 238); margin-top:0.5px; padding-top: 10px; display: flex; border-bottom: double;
                                border-color: rgb(238, 238, 238);">
                                    <h2 style="font-weight: 400;">
                                    Total del pedido
                                    </h2>
                                    <div class="totals-value" id="cart-subtotal" style="margin-left:auto; margin-right: 20px;">
                                        @php
                                            $totalFormat = number_format($total, 2, '.', ',');
                                        @endphp
                                        {{ $totalFormat }}
                                    </div>
                                </div>

                                <div class="btn__form">
                                <a class="btn__submit" href="{{ url()->previous() }}" style="text-decoration: none; text-align: center;">CANCELAR </a>
                                    <input class="btn__reset" type="submit" value="ENVIAR">	
                                </div>
                            @else

                                <h1 style="text-align: center; margin-top: 50px;">Tu carrito está vacío</h1>
                                    
                                    <div class="table-carrito">
                                        <div class="carrito-contenedor carrito-abajo">
                                            <button type="button" class="botonProductosCarrito" data-dismiss="modal">Cerrar</button>
                                        </div>
                                        <div class="carrito-contenedor carrito-arriba">
                                            <a class="botonProductosCarrito" href="/productos">Ver productos</a>
                                        </div>
                                    </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

    <script>
        function CommaFormatted(amount) {
	var delimiter = ","; // replace comma if desired
	var a = amount.split('.',2)
	var d = a[1];
	var i = parseInt(a[0]);
	if(isNaN(i)) { return ''; }
	var minus = '';
	if(i < 0) { minus = '-'; }
	i = Math.abs(i);
	var n = new String(i);
	var a = [];
	while(n.length > 3) {
		var nn = n.substr(n.length-3);
		a.unshift(nn);
		n = n.substr(0,n.length-3);
	}
	if(n.length > 0) { a.unshift(n); }
	n = a.join(delimiter);
	if(d.length < 1) { amount = n; }
	else { amount = n + '.' + d; }
	amount = minus + amount;
	return amount;
}
    </script>
</body>

</html>