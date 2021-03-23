<!-- Carrito -->
<div class="modal right fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog carritoModal" role="document">
        <div class="modal-content">
            <!--Header-->
            <!--Body-->
            <div class="modal-body">
                @if(session('cart') && is_null($mensaje))
                    <h1>Carrito de Compras</h1>
                    <div class="shopping-cart">

                        <div class="column-labels">
                            <label class="product-image">Imagen</label>
                            <label class="product-details">Producto</label>
                            <label class="product-price">Precio</label>
                            <label class="product-quantity">Cantidad</label>
                            <label class="product-removal">Eliminar</label>
                            <label class="product-line-price">Total</label>
                        </div>

                        @php

                            $total = 0;

                        @endphp


                        <!--PRODUCTOS DEL CARRITO-->
                        @foreach(session('cart') as $id => $details)
                            @foreach($productos as $productoCarrito)
                                @if($productoCarrito['idProducto'] == $details['id'])
                                    <div class="product">

                                        <!--IMAGEN DEL PRODUCTO-->
                                        <div class="product-image">
                                            <img src="{{asset('/storage/images/productos_img/'.$productoCarrito->imagen)}}">
                                        </div>

                                        <!--DETALLES DEL PRODUCTO-->
                                        <div class="product-details">
                                            <div class="product-title">
                                                {{$productoCarrito->nombre}}
                                            </div>
                                            <p class="product-description">
                                                {{$productoCarrito->descripcion}}
                                            </p>
                                        </div>
                        
                                        <!--PRECIO-->
                                        <div class="product-price">
                                            @php
                                                $nuevoPrecio = $productoCarrito->precioMenudeo - ($productoCarrito->precioMenudeo * $productoCarrito->descuentoMenudeo/100)
                                            @endphp
                                            {{$nuevoPrecio}}
                                        </div>

                                        <!--CANTIDAD-->
                                        <div class="product-quantity">
                                            <a data-id="{{ $id }}" class="restar-cart-modal">
                                                <i class="fas fa-minus"></i>
                                            </a>

                                            <input data-id="{{ $id }}" type="number" value="{{ $details['quantity'] }}" min="0" max="50" onkeypress="return onlyNumberKeyCart(event, this)" class="quantity">
                                            
                                            <a data-id="{{ $id }}" class="update-cart-modal">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>

                                        <div class="product-removal">
                                            <button class="remove-product remove-from-cart" data-id="{{ $id }}">
                                                Eliminar
                                            </button>
                                        </div>
                                            

                                        <div class="product-line-price">
                                            @php
                                                $precioFinal = $nuevoPrecio * $details['quantity'];
                                                
                                                $total += $precioFinal
                                            @endphp
                                            {{ $precioFinal }}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                        </div>
                        <div class="totals">
                            <div class="totals-item">
                                <label>
                                    Total
                                </label>
                                <div class="totals-value" id="cart-subtotal">
                                    @php
                                        $totalFormat = number_format($total, 2, '.', ',');
                                    @endphp
                                    {{ $totalFormat }}
                                </div>
                            </div>
                        </div>

                        <div class="table-carrito">
                            <div class="carrito-contenedor carrito-abajo">
                                <button type="button" class="btn-cerrar-carrito" style="outline:none" data-dismiss="modal">Cerrar</button>
                            </div>
                            <div class="carrito-contenedor carrito-arriba">
                                <button class="checkout" onclick="window.location.href = '/solicitar-pedido';" style="background-color: #009f8a; outline:none">Solicitar Pedido</button>
                            </div>
                        </div>
                @elseif(is_null($mensaje))

                        <h1 style="text-align: center; margin-top: 50px;">Tu carrito está vacío</h1>
                            
                            <div class="table-carrito">
                                <div class="carrito-contenedor carrito-abajo">
                                    <button type="button" class="botonProductosCarrito" data-dismiss="modal">Cerrar</button>
                                </div>
                                <div class="carrito-contenedor carrito-arriba">
                                    <a class="botonProductosCarrito" href="/productos">Ver productos</a>
                                </div>
                            </div>
                @else
                    <div style="text-align: center; width:100%;">
                        <h1>{{ $mensaje }}</h1>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
