@extends('layouts.menuGestor')

@section('importOwl')
<link rel="stylesheet" href="{{asset('css/estilosIE.css')}}">
@endsection

@section('menu')
<a href="/sgtepetate/pedidos" class="textoTitulosSeccion">
    Pedidos
</a>/
<a href="#" class="textoTitulosSeccion">
    Orden: #{{ str_pad($pedido->idPedido,6,'0',STR_PAD_LEFT) }}
</a>
           
@endsection

@section('generarReporte')
    
@endsection

@section('contenido')
<!--FIN DE SCRIPT-->
<div class="contenedor">
    <div class="container-fluid_datosl">
        <div class="card shadow mb-4">   
            <div class="card-header py-3"> 
                <h6 id="from" class="m-0 font-weight-bold text-primary"> Orden de: {{$pedido->nombre}}</h6>
            </div>
            <div class="card-body">
                <div class="formIE" style="justify-content:left" >
                    <p><h6 style="font-size:18px; padding:1%; border-bottom: solid #aba8ac .1rem">Estatus: </h6> <h6 style="font-size: 18px;  padding:1%; border-bottom: solid #aba8ac .1rem"><b>&nbsp;{{$pedido->estatus}}</b></h6></p>
                </div>
                <div style="display: flex;
                    justify-content: space-around;
                    flex-wrap: wrap;" >
                    <div class="tablePedidoDiv1" >
                        <div class="table-responsive" style="padding-right: 50px; ">
                            <h1 class="txt-DetallesPedido">Detalles del pedido</h1>
                            <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                <th class="num_tablaPedidos" id="idPedido">Producto</th>
                                <th class="cliente_tablaPedidos">Precio</th>
                                <th class="fecha_tablaPedidos">Descuento</th>
                                <th class="tel_tablaPedidos">Precio con descuento</th>
                                <th class="monto_tablaPedidos">Cantidad</th>
                                <th class="estado_tablaPedidos">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                            
                                <tr>
                                <td>{{$producto['nombre']}}</td>
                                <td style="padding-left:30px">{{$producto['precio']}}</td>
                                <td style="padding-left:30px">{{$producto['descuento']}}</td>

                                @php

                                    $precioParcial = $producto['precio'] - ($producto['precio'] * $producto['descuento']/100);
                                    
                                @endphp

                                <td style="padding-left:30px">{{$precioParcial}}</td>

                                <td style="padding-left:30px"> {{$producto->cantidad}}</td>

                                @php

                                    $precioParcial = ($producto['precio'] - ($producto['precio'] * $producto['descuento']/100))*$producto->cantidad;
                                    
                                @endphp

                                <td style="padding-left:30px"> {{$precioParcial}}</td>

                                </tr>
                            
                            @endforeach
                                
                            </tbody>
                            </table>
                            @php
                            $i=0;    
                            @endphp
                            @foreach ($productos as $producto)
                                @if ($i==0)
                                    <h4 style="float: right; Margin-right:10px;">
                                        Precio total: $ {{$pedido->total}}
                                    </h4>
                                @endif    
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="tablePedidoDiv2">
                        <h1 class="txt-DetallesPedido">Datos del pedido</h1>
                        <div class="datGePerfil">
                            <div class="izPerfil">
                                <p><b>Nombre:</b></p>
                            </div>
                            <div class="derPerfil">
                                <p>
                                    {{ $pedido->nombre }}
                                </p>
                            </div>
                        </div>
                        <div class="datGePerfil">
                            <div class="izPerfil">
                                <p><b>Teléfono:</b></p>
                            </div>
                            <div class="derPerfil">
                                <p>
                                    {{ $pedido->telefono }}
                                </p>
                            </div>
                        </div>
                        <div class="datGePerfil">
                            <div class="izPerfil">
                                <p><b>Dirección:</b></p>
                            </div>
                            <div class="derPerfil">
                                <p>
                                    {{ $pedido->direccion }}
                                </p>
                            </div>
                        </div>
                        <div class="datGePerfil">
                            <div class="izPerfil">
                                <p><b>Correo:</b></p>
                            </div>
                            <div class="derPerfil">
                                <p>
                                    {{ $pedido->correo }}
                                </p>
                            </div>
                        </div>
                        <div class="datGePerfil">
                            <div class="izPerfil">
                                <p><b>Notas del pedido:</b></p>
                            </div>
                            <div class="derPerfil">
                                <p>
                                    {{ $pedido->descripcion }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="containerIE" style="margin: 0 0;border: 0">
                <form method="POST" action="/sgtepetate/revisarpedido/{{$pedido->idPedido}}
                " class="formIE" style="">
                    @csrf
                    @method('PATCH')
                    <p class="estatusPedido-txt"><b>Estatus:&nbsp;</b></p>
                    <select class="selectProductoNR camposNR camposIE" name="estatus" required style="color: gray;  ">
                            @if ($pedido->estatus == 'Disponible')
                            <option value="Disponible" selected>Disponible</option>
                            <option value="En contacto">En contacto</option>
                            <option value="Terminado">Terminado</option>
                            <option value="Completado">Completado</option>
                            @elseif($pedido->estatus == 'En contacto')
                            <option value="Disponible">Disponible</option>
                            <option value="En contacto" selected>En contacto</option>
                            <option value="Terminado">Terminado</option>
                            <option value="Completado">Completado</option>
                            @elseif($pedido->estatus == 'Terminado')
                            <option value="Disponible">Disponible</option>
                            <option value="En contacto">En contacto</option>
                            <option value="Terminado" selected>Terminado</option>
                            <option value="Completado">Completado</option>
                            @elseif($pedido->estatus == 'Completado')
                            <option value="Disponible">Disponible</option>
                            <option value="En contacto">En contacto</option>
                            <option value="Terminado">Terminado</option>
                            <option value="Completado" selected>Completado</option>
                            @endif
                    </select> 

                    {{-- <a href="/sgtepetate/ingresos-egresos/nuevo-registro" class="btn btn-primary btn-icon-split btn-secundarioIE" style="background-color: #207558; margin-right:5px; margin-top:5px">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text textBotonIE">Ingresar Registro</span>
                    </a> --}}
                    <input type="submit" class="btn btn-primary btn-icon-split btn-secundarioIE" style="padding:1.5%; margin-top:20px" value="Actualizar estatus">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
