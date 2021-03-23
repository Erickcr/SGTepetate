@extends('layouts.menuGestor')

@section('menu')
<a href="#" class="textoTitulosSeccion">
    Pedidos
</a>
@endsection

@section('generarReporte')
    
@endsection

@section('contenido')

@if (session('alert'))
    <div class="alert alert-success" id="contenedorInfo">
        {{ session('alert') }}
    </div>
@endif

<!--script para seleccionar fila-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        var table= $('#dataTable').DataTable();   

        setTimeout(function(){
                document.getElementById('idPedido').click();
            },10);
   
    $('#dataTable tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        $("#from").html("Pedido de: "+data[1]);
        $(".city").html("Ciudad: "+data[5]);
        $(".phone").html("Teléfono: "+data[3]);
        $(".mail").html("Correo: "+data[4]);
        $(".status").html("Precio: "+data[6]);
        $(".date").html("Fecha: "+data[2] +"<a href='/sgtepetate/revisarpedido/"+data[0]+"'>"+
                                            "<input type='button' value='&#x2713; &nbsp;&nbsp;&nbsp;Revisar&nbsp;' class='btn-pedidoRevisado' style='background-color:#207558; border:none; color:white; float:right; width:130px; height:35px; border-radius:4%'';></a>");

    $(".container-fluid_datosl").show();  
    $('html, body').animate({ scrollTop: 0 }, 500);
    });
} );
</script>

<script>
function myFunction() {
  location.href = "#contenedorInfo";
}
</script>
<!--FIN DE SCRIPT-->

    <div class="contenedor">
        <div class="container-fluid_datosl" style="display: none">
            <div class="card shadow mb-4">   
                <div class="card-header py-3"> 
                    <h6 id="from" class="m-0 font-weight-bold text-primary">Pedido de: 
                    </h6>
                </div>
                <div class="card-body">
                    <p class="city">Ciudad: </p>
                    <p class= "phone">Teléfono:</p>
                    <p class= "mail">correo:</p>
                    <p class= "date">Fecha: </p>
                    <p class= "status">Precio: </p>
                </div>
            </div>
        </div>
         <!--NO LO BORRES, OE    
        <div class="container-fluid_datosr">
            <div class="card shadow mb-4">   
                <div class="card-header py-3"> 
                    <h6 class="m-0 font-weight-bold text-primary">Orden: </h6>
                </div>
                <div class="card-body">
                    
                        <p>Producto 1</p>
                        <p>Producto 2</p>
                        <p>Producto 3</p>
                        <p>Total:  <input type="button" value="Revisado" class="boton_pedidoRevisado"></p>
                    
               
                </div>
            </div>
        </div>
    </div>
            -->
    <div class="container-fluid"> <!--se cambió-->
        <div class="card shadow mb-4"><!--se cambió, ambos para que la tabla fuera de todo lo ancho-->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de pedidos</h6>
            </div>
            <div class="card-body">
               <!--Aquí copié lo de tablas-->
               <div class="table-responsive">
                <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="margin-top:auto; margin_bottom:auto">
                      <th class="num_tablaPedidos" id="idPedido">Número de pedido</th>
                      <th class="cliente_tablaPedidos">Cliente</th>
                      <th class="fecha_tablaPedidos">Fecha</th>
                      <th class="tel_tablaPedidos">Teléfono</th>
                      <th class="monto_tablaPedidos">e-mail</th>
                      <th class="cliente_tablaPedidos">Dirección</th>
                      <th class="estado_tablaPedidos">Total</th>
                      <th class="fecha_tablaPedidos" >Estatus</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pedidos as $pedido) 
                            <tr >
                                <td>{{$pedido->idPedido}}</td>
                                <td>{{$pedido->nombre}}</td>
                                <td>{{$pedido->fecha}}</td>
                                <td>{{$pedido->telefono}}</td>
                                <td>{{$pedido->correo}}</td>
                                <td>{{$pedido->direccion}}</td>
                                <td>{{$pedido->total}}</td>
                                <td>{{$pedido->estatus}}</td>
                                </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>


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