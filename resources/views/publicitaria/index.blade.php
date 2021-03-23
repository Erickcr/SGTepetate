<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Granja El Tepetate</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="icon" href="{{asset('img/logo.png')}}" type="image/icon type">

        <link rel="stylesheet" href="/template/css/bootstrap.min.css">
        <link rel="stylesheet" href="/template/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/template/css/fontAwesome.css">
        <link rel="stylesheet" href="/template/css/hero-slider.css">
        <link rel="stylesheet" href="/template/css/owl-carousel.css">
        <link rel="stylesheet" href="/template/css/templatemo-style.css">
        <link rel="stylesheet" href="/css/index.css">
        <link href="{{asset('temaGestor/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

        <script src="/template/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="/js/carrito.min.js"></script>
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
    
  <div class="encabezadoIndex">
    <div class="header">
        <div id="arribaHeader">
            <div id="headerInside">
                <div id="tablaHeader">
                    <div id="logoIndexHeader">
                        <img id="imgHeader" src="img/logo.png">
                    </div>
                    <div id="infoHeader">
                        <p style="font-family:Roboto; color: white;font: normal;font-size: 13px;">
                        <b>Llámanos:</b> 443-228-0290
                        <br>
                        <b>Correo:</b> arturoalcocermolina@gmail.com
                        </p>
                    </div>
                </div>
            </div>
            <div id="headerInsideA">
                <img align="center" src="img/logo1.png" height="104px" width="235px">
            </div>
            <div id="headerInside">
                <!-- Button trigger modal-->
                <button type="button" class="btn-carrito" data-toggle="modal" data-target="#modalCart"><img align="center" src="img/carrito.png" height="45px" width="45px" class="carritoImg">
                    @if ($cantidadCarrito > 0)
                    <div style="background-color: #f9c56a; color: black; font-weight:600; width: 25px; height:25px; border-radius: 50%; text-align:center; vertical-align:middle; position: relative; bottom: 20px; left: 35px;"><div style="width: 100%; height: 100%; padding-top: 3px">{{ $cantidadCarrito }}</div></div>
                    @endif
                </button>
            </div>
        </div>
            <!--<a href="#" class="navbar-brand scroll-top">Victory</a>-->
            <hr class="hrMediano">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <div class="navbar-izq">
                    </div>
                    <div class="navbar-der">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    </div>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/sobre-nosotros">SOBRE NOSOTROS</a></li>
                        <li><a href="/contacto">CONTÁCTANOS</a></li>
                        <li><a href="/productos">PRODUCTOS</a></li>
                        <li><a href="/recetas">RECETAS</a></li>
                        <li><a href="/noticias">NOTICIAS</a></li>
                        <li><a data-toggle="modal" data-target="#modalCart"><p class="carritoIndex"><i class="fas fa-shopping-cart"></i>Carrito
                            @if ($cantidadCarrito > 0)
                            {{ $cantidadCarrito }}
                            @endif
                        </p></a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <hr class="hrMediano">
            <!--/.navbar-->
        <!--/.container-->
    </div>
    <!--/.header-->


    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2>LAS MÁS DELICIOSAS TRUCHAS CRIADAS EN LA MEJOR GRANJA</h2>
                    <p>Criamos y engordamos nuestras truchas en las mejores condiciones para brindar al cliente el producto más LIMPIO, SANO y NUTRITIVO.</p>
                    <div class="primary-button">
                        <a href="#" class="scroll-link" data-id="book-table">LEER MÁS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
    <script>
        /* Set rates + misc */
        var taxRate = 0.05;
        var shippingRate = 15.00; 
        var fadeTime = 300;


        /* Recalculate cart */
        function recalculateCart()
        {
            var subtotal = 0;
            
            /* Sum up row totals */
            $('.product').each(function () {
                subtotal += parseFloat($(this).children('.product-line-price').text());
            });
            
            /* Calculate totals */
            var tax = subtotal * taxRate;
            var shipping = (subtotal > 0 ? shippingRate : 0);
            var total = subtotal + tax + shipping;
            
            /* Update totals display */
            $('.totals-value').fadeOut(fadeTime, function() {
                $('#cart-subtotal').html(subtotal.toFixed(2));
                $('#cart-tax').html(tax.toFixed(2));
                $('#cart-shipping').html(shipping.toFixed(2));
                $('#cart-total').html(total.toFixed(2));
                if(total == 0){
                $('.checkout').fadeOut(fadeTime);
                }else{
                $('.checkout').fadeIn(fadeTime);
                }
                $('.totals-value').fadeIn(fadeTime);
            });
        }
    </script>

    <!------------------------------------------------PRODUCTOS------------------------------------------------>
    <section class="featured-food">
        <div class="container">
            <div class="row">
                <div class="headingIndex">
                    <h2>PRODUCTOS</h2>
                    <hr class="hrMediano">
                    <h1>LO QUE OFRECEMOS</h1>
                    <p>Las truchas más frescas que podrá encontrar en el mercado, preparadas en diferentes presentaciones.</p>
                </div>
            </div>
            <div class="row">
                @php
                    $nproductos=0;
                    $j=0;
                @endphp
                @if(is_null($mensaje) && !$productos->isEmpty())
                    @foreach ($productos as $producto)
                        @php
                            $nproductos++;
                        @endphp
                    @endforeach
                    @php
                        $randPro1=mt_rand(1,$nproductos);
                        $randPro2=mt_rand(1,$nproductos);
                        $randPro3=mt_rand(1,$nproductos);
                        $cont=0;
                        while($randPro1==$randPro2){
                            $randPro2=mt_rand(1,$nproductos);
                        }
                        while($randPro1==$randPro3 || $randPro3==$randPro2){
                            $randPro3=mt_rand(1,$nproductos);
                        }
                    @endphp

                    @php

                        $contadorPagina = 0;
                        $pagina = 1;

                    @endphp

                    @foreach ($productos as $producto)
                        @php
                            $j++;
                            $contadorPagina++;
                        @endphp

                        @if($contadorPagina == 10)
                            @php
                                $contadorPagina == 1;
                                $pagina++;
                            @endphp
                        @endif
                        @if ($j==$randPro1 || $j==$randPro2 || $j==$randPro3)
                        <div class="col-md-6 col-md-4 col-lg-4" style="margin-bottom:20px">
                            <a name="{{ 'producto'.$producto->idProducto }}"></a>
                            <div class="food-item">
                                <img class="img-descuento" src="{{asset('/storage/images/productos_img/'.$producto->imagen)}}" alt="Imagen no disponible">
                                @if(!($producto->descuentoMenudeo==0))
                                    <div class="discount"><p style="padding-top: 10px;">{{ $producto->descuentoMenudeo }}%</p></div>                          
                                @endif
                                <div class="text-content">
                                    <div class="producto-nombre">
                                        <h4>{{$producto->nombre}}</h4>
                                    </div>
                                    <hr>
                                    <div class="producto-descripcion">
                                        <p>{{$producto->descripcion}}</p>
                                    </div>
                                    <div class="producto-precio">
                                        @if($producto->descuentoMenudeo==0)
                                            <div class="producto-precio-nuevo">${{$producto->precioMenudeo}}</div>
                                        @else
                                            <div class="producto-precio-viejo">${{$producto->precioMenudeo}}</div>
                                            @php
                                                $nuevoPrecio=$producto->precioMenudeo-($producto->precioMenudeo*$producto->descuentoMenudeo/100)
                                            @endphp
                                            <div class="producto-precio-nuevo">${{$nuevoPrecio}}</div>
                                        @endif
                                    </div>

                                    <div class="btn_agregar_carrito">
                                        <button onclick="window.location.href ='{{ url('/productos?page='.$pagina.'#producto'.$producto->idProducto) }}';"></i>Ver Producto</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @else
                    <h1 style="text-align: center">{{ $mensaje }}</h1>
                @endif      
            </div>
            <div class="row">
                <div class="verMasProductos">
                    <a href="/productos"><p><u>VER MÁS</u>  <img src="img/icon-mostrar.png" width="10px" height="10px" ></p></a>
                </div>
            </div>
        </div>
    </section>

    <!------------------------------------------------SLIDER------------------------------------------------>
    @if (is_null($mensaje) && !is_null($ofertas))
        <div class="slider" style="margin-bottom: 150px; margin-top:50px;">
            <div class="arrows">
            <a class="previous" style="color:white; cursor:pointer;">&#xf053;</a>
            <a class="next" style="color:white; cursor:pointer;">&#xf054;</a>
            </div>
            <div class="slides">
                @php
                $cont = 0;
                @endphp
                    @foreach($ofertas as $oferta)
                        @if($cont == 0)
                            <div class="slide active white" style="background: linear-gradient( rgba(0, 0, 0, 0.6) 100%, rgba(0, 0, 0, 0.5)100%),url('{{asset('/storage/images/ofertas_img/'.$oferta->imagen)}}');
                                background-position: center center !important;
                                background-size: cover;
                                -moz-background-size: cover;
                                -o-background-size: cover;
                                -webkit-background-size: cover;
                                height:500px;">
                        @else
                            <div class="slide white" style="background: linear-gradient( rgba(0, 0, 0, 0.6) 100%, rgba(0, 0, 0, 0.5)100%),url('{{asset('/storage/images/ofertas_img/'.$oferta->imagen)}}');
                                background-position: center center !important;
                                background-size: cover;
                                -moz-background-size: cover;
                                -o-background-size: cover;
                                -webkit-background-size: cover;
                                height:500px;">
                        @endif
                        @php
                            $cont++;
                        @endphp
                                <h2 style="font-size: 36px">{{$oferta->titulo}}</h2>
                                <p style="color:rgb(255, 255, 255); font-size:22px; font-weight:200;">{{$oferta->texto}}</p>
                                @if($oferta->boton && $oferta->link)
                                    <a target="_blank" href="{{ $oferta->link }}">{{$oferta->boton}}</a>
                                @endif
                        </div>
                    @endforeach
            </div>
            <div class="bullets">
            </div>
        </div>
      @endif
      <script>
        var $slider = $(".slider"), $bullets = $(".bullets");
          function calculateHeight(){
              var height = $(".slide.active").outerHeight();
              $slider.height(height);
          }
  
          $(window).resize(function() {
              calculateHeight();
              clearTimeout($.data(this, 'resizeTimer'));
          });
          
          function resetSlides(){
              $(".slide.inactive").removeClass("inactiveRight").removeClass("inactiveLeft");
          }
  
          function gotoSlide($activeSlide, $slide, className){
               $activeSlide.removeClass("active").addClass("inactive "+className);
               $slide.removeClass("inactive").addClass("active");
               calculateHeight();
               resetBullets();
               setTimeout(resetSlides, 300);
          }
  
          $(".next").on("click", function(){
               var $activeSlide = $(".slide.active"),
                   $nextSlide = $activeSlide.next(".slide").length != 0 ? $activeSlide.next(".slide") : $(".slide:first-child");
                   console.log($nextSlide);
                   gotoSlide($activeSlide, $nextSlide, "inactiveLeft");
          });
          $(".previous").on("click",  function(){
               var $activeSlide = $(".slide.active"),
                   $prevSlide = $activeSlide.prev(".slide").length != 0 ? $activeSlide.prev(".slide") : $(".slide:last-child");
  
                   gotoSlide($activeSlide, $prevSlide, "inactiveRight");
          });
          $(document).on("click", ".bullet", function(){
              if($(this).hasClass("active")){
                  return;
              }
              var $activeSlide = $(".slide.active");
              var currentIndex = $activeSlide.index();
              var targetIndex = $(this).index();
              console.log(currentIndex, targetIndex);
              var $theSlide = $(".slide:nth-child("+(targetIndex+1)+")");
              gotoSlide($activeSlide, $theSlide, currentIndex > targetIndex ? "inactiveRight" : "inactiveLeft");
          })
          function addBullets(){
              var total = $(".slide").length, index = $(".slide.active").index();
              for (var i=0; i < total; i++){
                  var $bullet = $("<div>").addClass("bullet");
                  if(i==index){
                      $bullet.addClass("active");	
                  }
                  $bullets.append($bullet);
              }
          }
          function resetBullets(){
              $(".bullet.active").removeClass("active");
              var index = $(".slide.active").index()+1;
              console.log(index);
              $(".bullet:nth-child("+index+")").addClass("active");
          }
          addBullets();
          calculateHeight();

          setInterval(timerAnuncios, 10000);

        function timerAnuncios()
        {
            $(".next").click();
        }
        </script>

    
    <!------------------------------------------------RECETAS------------------------------------------------>
    <section class="recetasIndex">
        <div class="container">
            <div class="row">
                <div class="titulosReceta">
                    <h2>
                        RECETAS
                    </h2>
                    <hr class="hrMediano">
                    <h1 style="font-weight: 300; font-size:33px;">
                        CONOCE NUEVAS FORMAS DE DISFRUTAR DE NUESTROS PRODUCTOS
                    </h1>
                </div>
                @php
                    $nrecetas=0;
                    $i=0;
                @endphp
                @if(is_null($mensaje) && !$recetas->isEmpty())
                    @foreach ($recetas as $receta)
                        @php
                            $nrecetas++;
                        @endphp
                    @endforeach
                    @php
                        $r1=mt_rand(1,$nrecetas);
                        $r2=mt_rand(1,$nrecetas);
                        $cont=0;
                        while($r1==$r2){
                            $r2=mt_rand(1,$nrecetas);
                            $cont++;
                            if ($cont==10) {
                                break;
                            }
                        }
                    @endphp
                    <div class="tableRecetas">
                        @foreach ($recetas as $receta)
                        @php
                            $i++;
                        @endphp
                        @if ($i==$r1 || $i==$r2)
                            <div class="recetaIndex">
                                <div class="recetaContenido">
                                    <div class="recetaImg" style="
                                    background: url('/storage/images/recetas_img/{{$receta->imagen}}')center center; -webkit-background-size: cover;
                                    -moz-background-size: cover;
                                    -o-background-size: cover;
                                    background-size: cover;">
                                    </div>
                                    <div class="recetaContainer">
                                        <div class="tituloReceta">
                                            <h1 style="display: -webkit-box;
                                            -webkit-line-clamp: 1;
                                            -webkit-box-orient: vertical;
                                            overflow: hidden;
                                            text-overflow: ellipsis;">{{$receta->nombre}}</h1>
                                        </div>
                                        <div class="descReceta">
                                            <p style="display: -webkit-box;
                                            -webkit-line-clamp: 3;
                                            -webkit-box-orient: vertical;
                                            overflow: hidden;
                                            text-overflow: ellipsis;">{{$receta->descripcion}}</p>
                                        </div>
                                        <button onclick="window.location.href = '/recetas/{{$receta->idReceta}}';" class="verReceta">VER RECETA</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <h1 style="text-align: center">{{ $mensaje }}</h1>
                @endif
                </div>
                <a href="/recetas"><p><u>VER MÁS RECETAS</u>  <img src="img/icon-mostrar.png" width="10px" height="10px" ></p></a>
            </div>
        </div>
    </section>
    <!------------------------------------------------NOTICIAS------------------------------------------------>
    <section id="book-table">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <div class="heading">
                            <div class="noticiasDiv">
                                <div class="noticiasContainer">
                                    <h2>MANTENTE INFORMADO</h2>
                                    <hr class="hrMediano">
                                    <a href="/noticias">
                                        <button class="botonNoticiasIndex">
                                            NOTICIAS
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------GALERIA------------------------------------------------>
    <section class="get-app">
        <div class="container">
            <div class="row">
                <div class="tableIndex">
                    <div class="row-1 textoGaleriaIndex showIndexTable">
                        <h2>PRODUCTOS CERTIFICADOS</h2>
                        <hr class="hrMediano">
                        <p>Nuestros productos cumplen con estrictos requisitos de limpieza y calidad bajo los más altos estándares de inspección.</p>
                    </div>
                    <div class="row-1">
                        <div class="row-2 showIndexTable">
                            <div class="galeriaIndex" style="
                            background: url('/img/imgGranja/photo1.jpeg')center center; -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;">
                            </div>
                            <div class="galeriaIndex" style="
                            background: url('/img/imgGranja/photo6.jpeg')center center; -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;">
                            </div>
                        </div>
                        <div class="row-2 hiddeIndex">
                            <div class="textoGaleriaIndex">
                                <h2>PRODUCTOS CERTIFICADOS</h2>
                                <hr class="hrMediano">
                                <p>Nuestros productos cumplen con estrictos requisitos de limpieza y calidad bajo los más altos estándares de inspección.</p>
                            </div>
                            <div class="galeriaIndex hiddeIndex" style="
                            background: url('/img/imgGranja/photo1.jpeg')center center; -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;">
                            </div>
                        </div>
                        <div class="row-2">
                            <div class="galeriaIndex" style="
                            background: url('/img/imgGranja/photo2.jpg')center center; -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;">
                            </div>
                            <div class="galeriaIndex" style="
                            background: url('/img/imgGranja/photo3.jpg')center center; -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;">
                            </div>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="row-2">
                            <div class="galeriaIndex" style="
                            background: url('/img/imgGranja/photo4.jpg')center center; -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;">
                            </div>
                            <div class="galeriaIndex" style="
                            background: url('/img/imgGranja/photo5.jpg')center center; -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;">
                            </div>
                        </div>
                        <div class="row-2 hiddeIndex">
                            <div class="galeriaIndex" style="
                            background: url('/img/imgGranja/photo6.jpeg')center center; -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;">
                            </div>
                            <div class="textoGaleriaIndex">
                                <button class="botonGaleria" onclick="window.location.href='/productos'">CONOCE NUESTRO PRODUCTO</button>
                                <hr class="hrMediano">
                                <p>Contamos con acreditación por la aplicación de buenas prácticas de producción.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row-1 textoGaleriaIndex showIndexTable">
                        <h2>PRODUCTOS CERTIFICADOS</h2>
                        <hr class="hrMediano">
                        <p>Nuestros productos cumplen con estrictos requisitos de limpieza y calidad bajo los más altos estándares de inspección.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------SOBRE NOSOTROS------------------------------------------------>
    <section class="SectionsobreNosotros">
        <div class="container">
            <div class="row">
                <div class="div_sobreN shadow">
                    <div class="sobreNosotros">
                        <h2>
                            SOBRE NOSOTROS
                        </h2>
                        <hr class="hrMediano">
                        <h1>
                            SOMOS UNA GRANJA COMPROMETIDA A BRINDARLE AL CLIENTE PRODUCTOS DE CALIDAD LLEVANDO A CABO PROCESOS CERTIFICADOS
                        </h1>
                        <div class="sobreNosotrosTexto">
                            <p>
                                Nuestra granja se dedica al cultivo de organismos acuáticos, más específicamente a la <b>trucha arcoíris</b>
                                y <b>salmonada</b>, que cosechamos  con las más <b>exigentes estándares de inspección</b>, pues nos definimos 
                                por nuestro compromiso con el consumidor.
                            </p>
                        </div>
                        
                        <button onclick="window.location.href = '/sobre-nosotros';" class="botonSobreNosotrosIndex">CONÓCENOS</button>
                    </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------TRUCHA------------------------------------------------>
    <section class="truchaIndex">
        <div class="truchaDiv">
            <div class="informacionTrucha">
                <div class="truchaResponsiva">
                    <img src="/img/PEZ.png">
                </div>
                <h1>
                    MEJORA TU CALIDAD DE VIDA
                </h1>
                <div class="textoTrucha">
                    <p>
                    El consumo de la trucha puede traer consigo muchos beneficios para tu cuerpo
                    . Se trata de un pescado rico en ácidos grasos omega 3,
                    los cuales ayudan a prevenir enfermedades cardiovasculares al reducir la hipertensión y el colesterol.
                    </p>
                    <button onclick="window.location.href = '/recetas#beneficios';" class="botonTruchaIndex">CONOCER MÁS</button>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------CONTACTO------------------------------------------------>
    <section class="contacto">
        <div class="container">
            <div class="row">
                <div class="contactoTitle">
                    <h2>
                        ¿TIENES PREGUNTAS?
                    </h2>
                    <hr class="hrMediano">
                    <h1>
                        CONTÁCTANOS
                    </h1>
                </div>
                <div class="contactoTable">
                    <div class="contactoBoton">
                        <button class="contactoBotonContent" onclick="window.open('https://www.facebook.com/Granja-de-Trucha-Tepetates-1125220357665723/');" >
                            <i class="fab fa-facebook-f fa-10x"></i>
                            <p>Visita nuestro facebook</p>
                        </button>
                    </div>
                    <div class="contactoBoton">
                        <button class="contactoBotonContent" onclick="window.location.href = 'mailto:arturoalcocermolina@gmail.com'">
                            <i class="fas fa-envelope fa-10x"></i>
                            <p>Envíanos un correo</p>
                        </button>
                    </div>
                    <div class="contactoBoton">
                        <button class="contactoBotonContent" onclick="window.location.href = '/contacto'">
                            <i class="fas fa-phone-alt fa-10x"></i>
                            <p>Llámanos</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (!session()->has('cookie'))
        <script>
        setTimeout(function(){ alert("Esta página utiliza Cookies."); 
        }, 1000);
    </script>

    @php
    session()->put('cookie', 1);
    @endphp

    @endif 

    @include('subviews.footerPublicitaria')

    <!-- Modal: modalCart -->
    @include('subviews.carrito')

    <script src="{{asset('template/js/vendor/bootstrap.min.js')}}"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>

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
                success: process
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
                            success: process
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
                        success: process
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
                      window.location.href = '/?modal=1';
                    }
                });
            }
        });

        function process(jsondata) {
            window.location.href = '/?modal=1';
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
                            window.location.href = '/?modal=1';
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
            success: process
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
            history.pushState(null, null, '/');
            </script>";
            <?php
        }
    }
    catch(Exception $e){

    }

    ?>

@if($errors->any())
@error('msg')
<script>
    setTimeout(function(){ alert("Su pedido ha sido enviado con éxito."); }, 1000);
</script>
@enderror
@endif
</body>
</html>