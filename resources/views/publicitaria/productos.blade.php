@extends('layouts.menuPublicitaria')

@section('titulo')
Productos
@endsection

@section('header')
<header class="masthead" style="background-image: url('img/galeria/galeria13.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Productos</h1>
            <span class="subheading">Disfrute de los productos más frescos del mercado</span>
          </div>
        </div>
      </div>
    </div>
</header>
@endsection

@section('contenido')
    @if (is_null($mensaje) && !is_null($ofertas))
        <div class="heading-productos" style="margin-bottom:20px">
            <h2>CONOCE NUESTRAS ÚLTIMAS OFERTAS</h2>
            <hr class="hrMediano">
        </div>

        <div class="slider" style="margin-bottom: 100px;">
            <div class="arrows">
                <a class="previous" style="color:white; cursor:pointer;">&#xf053;</a>
                <a class="next" style="color:white; cursor:pointer;">&#xf054;</a>
            </div>
        <div class="slides">
            @php
                $cont = 0;
            @endphp
            @foreach($ofertas as $oferta)
                @if($oferta->oferta == 1)
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
                        @if($oferta->oferta == 0 && $oferta->boton && $oferta->link)
                            <a target="_blank" href="{{ $oferta->link }}">{{$oferta->boton}}</a>
                        @endif
                    </div>
                @endif
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

      </script>

<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- DIVS para productos, por lo pronto están vacíos -->
    <section class="featured-food">
        <div class="container">
            <div class="row">
                <div class="heading-productos" style="margin-bottom:20px">
                    <h2>PRODUCTOS</h2>
                    <hr class="hrMediano">
                </div>
            </div>
            <div class="row">
                @if (is_null($mensaje))
                    @foreach ($productosPaginado as $producto)
                        <div class="col-md-6 col-md-4 col-lg-4" style="margin-bottom:20px">
                            <a name="{{ 'producto'.$producto->idProducto }}"></a>
                            <div class="food-item">
                                <img class="img-descuento" src="{{asset('/storage/images/productos_img/'.$producto->imagen)}}" alt="Imagen no disponible">
                                @if(!($producto->descuentoMenudeo==0))
                                    <div class="discount"><p>{{ $producto->descuentoMenudeo }}%</p></div>                          
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
                                </div>

                                @php

                                    $carritoCheck = true;

                                @endphp

                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @if($details['id'] == $producto->idProducto)
                                            <div class="contadorProductos">
                                                <a data-id="{{ $id }}" class="restar-cart">
                                                    <i class="fas fa-minus"></i>
                                                </a>

                                                <input data-id="{{ $id }}" type="number" value="{{ $details['quantity'] }}" min="0" max="50" onkeypress="return onlyNumberKey(event, this)" class="quantity">
                                                
                                                <a data-id="{{ $id }}" class="update-cart">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                            </div>

                                            @php

                                                $carritoCheck = false;

                                            @endphp
                                        @endif
                                    @endforeach
                                @endif

                                @if($carritoCheck)
                                    <div class="btn_agregar_carrito">
                                        <button onclick="window.location.href ='{{ url('agregar-al-carrito/'.$producto->idProducto) }}';"><i class="fas fa-shopping-cart"></i>Agregar al carrito</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                <div style="text-align: center; width:100%;">
                    <h1>{{ $mensaje }}</h1>
                </div>
                @endif
            </div>
            @if (!is_null($productosPaginado))
                {{ $productosPaginado->links() }}
            @endif
        </div>
    </section>
    <br><br><br>
    <!-- Certificación Kosher  -->
    {{-- <div id="certificacionContainer">
        <div id="div_certificacionII" >
            <p id="txt_certificacion">
                <b>Productos Certificados</b>
            </p> 
    
            <img id="img_certificacion" src="/img/KosherLogo.png">
    
            <div id="txtCertificacion">
                <p id="txt_certificacionContenido">
                    Nuestros productos cumplen con estrictos requisitos de limpieza y calidad bajo los más altos estándares de inspección.
                </p>
            </div>
    
            <a id="btn_certificacion" href="http://www.kosher.com.mx/consumidor/index.php?ver=productos_certificados">LEER MÁS</a>
        </div>
        <div id="div_certificacion" >
            <div id="imgCertificacion"></div>
            <!--<img src="/img/certificacion.jpg">-->
        </div>
    </div> --}}

    <script src="{{asset('owl/docs/assets/vendors/jquery.min.js')}}"
    type="text/javascript"></script>
    <script src="{{asset('owl/dist/owl.carousel.js')}}"
    type="text/javascript"></script>

@endsection

@section('carritoURL')
    '/productos?modal=1'
@endsection

@section('url')
    '/productos'
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop:true,
            autoplay:true,
            dots:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            navText:["Anterior","Siguiente"],
            nav:true,
            autoHeight:true,
            responsive:{
                0:{
                    items:1,
                    margin:0
                },
                600:{
                    items:1,
                    margin:0
                },
                1000:{
                    items:1,
                    margin:0
                }
                ,
                2000:{
                    items:1,
                    margin:0
                }
            }
        })
    </script>

<script type="text/javascript">
 
    $(".update-cart").click(function (e) {
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
                window.location.reload();
            })
        });
    });

    $(".restar-cart").click(function (e) {
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
                        window.location.reload();
                    }
                });
            }
            else{
                  sum = 1;
                }
        }
        $.ajaxSetup({ cache: false });

            $.ajax({
                url: '/actualizar-carrito',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: JSON.stringify(sum)},
                async: false,
                    cache: false,
                success: $(document).ready(function (response) {
                    window.location.reload();
                })
            });
    });

</script>
@endsection