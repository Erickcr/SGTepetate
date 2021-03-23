<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Granja El Tepetate @yield('titulo')</title>
  <link rel="icon" href="{{asset('img/logo.png')}}" type="image/icon type">

  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

  <!-- Custom fonts for this template -->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <link href = "https://fonts.googleapis.com/css?family=Roboto+Mono|Roboto+Slab|Roboto:100,300,400,500,700" rel = "stylesheet" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="/css/app.css">

  <script src="{{asset('/js/carrito.min.js')}}"></script>

  @yield('importOwl')

</head>

<body>

  @php
      $cantidadCarrito = 0;
  @endphp

  @if(session('cart'))
    @foreach(session('cart') as $id => $details)
      @php
          $cantidadCarrito += $details['quantity']
      @endphp    
    @endforeach
  @endif

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="/">GRANJA EL TEPETATE</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menú
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/sobre-nosotros">Sobre Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contacto">Contáctanos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/productos">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/recetas">Recetas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/noticias">Noticias</a>
          </li>
          <li class="nav-item" style="display: inline;">
            <a class="nav-link" data-toggle="modal" data-target="#modalCart" style="cursor: pointer;"><i class="fas fa-shopping-cart fa-2x"></i>
            @if ($cantidadCarrito > 0)
            <div style="background-color: #f9c56a; color: black; font-weight:bold; width: 25px; height:25px; border-radius: 50%; text-align:center; vertical-align:middle; position: relative; bottom: 20px; left: 30px;"><div style="width: 100%; height: 100%; padding-top: 3px">{{ $cantidadCarrito }}</div></div>
            @endif
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  @yield('header')

  <!-- Main Content -->
  @yield('contenido')

  <!-- Carrito -->
  @include('subviews.carrito')

  <!-- Footer -->
  @include('subviews.footerPublicitaria')

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/js/clean-blog.min.js"></script>

  @yield('scripts')

  <script>
    $(".update-cart-modal").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        var quan = parseInt(ele.parent("div").find(".quantity").val());
        var sum = quan + 1;

        if(sum > 50){
            sum = 50;
        }

        $.ajaxSetup({ cache: false });

            $.ajax({
            url: '/actualizar-carrito',
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: JSON.stringify(sum)},
            async: false,
                cache: false,
            success: $(document).ready(function (response) {
                window.location.href = @yield('carritoURL');
            })
        });
    });

    $(".restar-cart-modal").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        var quan = parseInt(ele.parent("div").find(".quantity").val());
        var sum = quan - 1;

            if(sum <= 0){
                if(confirm("Está seguro que desea eliminar el producto del carrito?")) {
                    $.ajax({
                        url: '{{ url('eliminar-del-carrito') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                        async: false,
                        cache: false,
                        success: function (response) {
                            window.location.href = @yield("carritoURL");
                        }
                    });
                }
                else{
                  sum = 1;
                }
            }
            else if(sum > 50){
              sum = 50;
            }

            $.ajaxSetup({ cache: false });

                $.ajax({
                    url: '/actualizar-carrito',
                    method: "patch",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: JSON.stringify(sum)},
                    async: false,
                    cache: false,
                    success: $(document).ready(function (response) {
                      window.location.href = @yield("carritoURL");
                    })
                });
        });

        $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Está seguro que desea eliminar el producto del carrito?")) {
            $.ajax({
                url: '{{ url('eliminar-del-carrito') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                  window.location.href = @yield("carritoURL");
                }
            });
        }
    });
</script>

<script> 
  function onlyNumberKey(evt, ele) { 
      // Only ASCII charactar in that range allowed 
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
          return false; 

      //si se presiona enter
      if(evt.keyCode === 13) {
          // Cancel the default action, if needed
          event.preventDefault();
          // Se ejecuta la acción

          var quan = parseInt(ele.value);

          
          if(quan <= 0){
              if(confirm("Está seguro que desea eliminar el producto del carrito?")) {
                  $.ajax({
                      url: '{{ url('eliminar-del-carrito') }}',
                      method: "DELETE",
                      data: {_token: '{{ csrf_token() }}', id: $(ele).attr('data-id')},
                      success: function (response) {
                          window.location.reload();
                          return;
                      }
                  });
              }
              else{
                  quan = 1;
              }
          }
          else if(quan > 50){
              quan = 50;
          }

          $.ajaxSetup({ cache: false });

          $.ajax({
          url: '/actualizar-carrito',
          method: "patch",
          data: {_token: '{{ csrf_token() }}', id: $(ele).attr('data-id'), quantity: JSON.stringify(quan)},
          async: false,
              cache: false,
          success: $(document).ready(function (response) {
              window.location.reload();
          })
          });
      }
      return true; 
  } 
</script>

<script> 
  function onlyNumberKeyCart(evt, ele) { 
      // Only ASCII charactar in that range allowed 
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
          return false; 

      //si se presiona enter
      if(evt.keyCode === 13) {
          // Cancel the default action, if needed
          event.preventDefault();
          // Se ejecuta la acción

          var quan = parseInt(ele.value);

          
          if(quan <= 0){
              if(confirm("Está seguro que desea eliminar el producto del carrito?")) {
                  $.ajax({
                      url: '{{ url('eliminar-del-carrito') }}',
                      method: "DELETE",
                      data: {_token: '{{ csrf_token() }}', id: $(ele).attr('data-id')},
                      success: function (response) {
                          window.location.href = @yield("carritoURL");
                          return;
                      }
                  });
              }
              else{
                  quan = 1;
              }
          }
          else if(quan > 50){
              quan = 50;
          }

          $.ajaxSetup({ cache: false });

          $.ajax({
          url: '/actualizar-carrito',
          method: "patch",
          data: {_token: '{{ csrf_token() }}', id: $(ele).attr('data-id'), quantity: JSON.stringify(quan)},
          async: false,
          cache: false,
          success: $(document).ready(function (response) {
              window.location.href = @yield("carritoURL");
          })
          });
      }
      return true; 
  } 
</script>

<?php 

    try{
        $modal = $_GET['modal'];
        if ($modal == 1) { ?>
            <script type='text/javascript'>
            $('#modalCart').modal('show');
            history.pushState(null, null, @yield('url'));
            </script>";
            <?php
        }
    }
    catch(Exception $e){

    }

    ?>
</body>

</html>
