@extends('layouts.menuGestor')


@section('importOwl')
 <!-- Importando owl carousel -->
 <link href="{{asset('owl/dist/assets/owl.carousel.css')}}" 
  rel="stylesheet" type ="text/css">
  <link href="{{asset('owl/dist/assets/owl.theme.default.min.css')}}"
  rel="stylesheet" type="text/css">
@endsection

@section('menu')
<a href="#" class="textoTitulosSeccion">
    Página publicitaria
</a>
@endsection

@section('contenido')

    <!-- ---------------------------------Productos------------------------------- -->
    <div class="row">
        <div class="titulo_gestionPag"><p>PRODUCTOS</p><a  href="gestionPagina/createProducto">Agregar Producto</a></div> 
        <div class="div_boxCarousel">
            <div class="owl-carousel owl-theme">
                @foreach($productos as $p)
                <div class="item_decoracionPG" style="text-decoration: none; ">
                    <div class="carouselItem ">
                        <div class="img-fluid carouselItem_image">
                            <img style="width:100%; height:100%; position: relative;" src="{{asset('/storage/images/productos_img/'.$p->imagen)}}" 
                            alt="Imagen no disponible">
                            @if(!($p->descuentoMenudeo==0))
                                    <div class="discount"><p>{{ $p->descuentoMenudeo }}%</p></div>                          
                                @endif
                        </div>
                        <a href="/sgtepetate/gestionPagina/{{$p->idProducto}}/editProducto">
                        <div class="carouselItem_info">
                            <div class="carouselInfo_izq"> 
                                <p style="margin: 0px; display: -webkit-box;
                                -webkit-line-clamp: 3;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis;">{{$p->nombre}}</p>
                            </div>
                            <div class="carouselInfo_der" style="display: flex; flex-wrap:wrap;">
                                @if($p->descuentoMenudeo==0)
                                <div>
                                    <p style="margin: 0px;">${{$p->precioMenudeo}}</p>
                                </div>
                                @else
                                <div>
                                    <p style="margin: 0px; margin-right:10px; text-decoration: line-through;">${{$p->precioMenudeo}}</p>
                                    @php
                                        $nuevoPrecio=$p->precioMenudeo-($p->precioMenudeo*$p->descuentoMenudeo/100)
                                    @endphp
                                    <p style="margin: 0px; color:rgb(180, 132, 0)">${{$nuevoPrecio}}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- ---------------------------------RECETAS----------------------------------- -->
        <div class="titulo_gestionPag"><p>RECETAS</p><a href="gestionPagina/createReceta">Agregar Receta</a></div> 
        <div class="div_boxCarousel">
            <div class="owl-carousel owl-theme">
                @foreach($recetas as $r)
                <div class="item_decoracionPG">
                    <div class="item carouselItem shadow">
                        <div class="img-fluid carouselItem_image">
                            <img style="width:100%; height:100%" src="{{asset('/storage/images/recetas_img/'.$r->imagen)}}" 
                            alt="Imagen no disponible">
                        </div>
                        <a href="/sgtepetate/gestionPagina/{{$r->idReceta}}/editReceta">
                            <div class="carouselItem_info">
                                <div class="carouselInfo_izq2"> 
                                    <p style="margin: 0px; display: -webkit-box;
                                -webkit-line-clamp: 3;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis;">{{$r->nombre}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- --------------------------------------Noticias----------------------------------- -->
        <div class="titulo_gestionPag"><p>NOTICIAS</p><a href="gestionPagina/createNoticia">Agregar Noticia</a></div> 
        <div class="div_boxCarousel">
            <div class="owl-carousel owl-theme">
                @foreach($noticias as $n)
                <div class="item_decoracionPG">
                    <div class="item carouselItem shadow">
                        <div class="img-fluid carouselItem_image">
                            <img style="width:100%; height:100%" src="{{asset('/storage/images/noticias_img/'.$n->imagen)}}" 
                            alt="Imagen no disponible">
                        </div>
                        <a href="/sgtepetate/gestionPagina/{{$n->idNoticia}}/editNoticia">
                            <div class="carouselItem_info">
                                <div class="carouselInfo_izq2"> 
                                    <p style="margin: 0px; display: -webkit-box;
                                -webkit-line-clamp: 3;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis;">
                                    {{$n->titulo}}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- --------------------------------End Noticias-------------------------------- -->
        <!-- -----------------------------------Ofertas---------------------------------- -->
        <div class="titulo_gestionPag"><p>ANUNCIOS</p><a href="gestionPagina/createOferta">Agregar Anuncio</a></div> 
        <div class="div_boxCarousel">
            <div class="owl-carousel owl-theme">
                @foreach($ofertas as $o)
                <div class="item_decoracionPG">
                    <div class="item carouselItem shadow">
                        <div class="img-fluid carouselItem_image">
                            <img style="width:100%; height:100%" src="{{asset('/storage/images/ofertas_img/'.$o->imagen)}}" 
                            alt="Imagen no disponible">
                        </div>
                        <a href="/sgtepetate/gestionPagina/{{$o->idOferta}}/editOferta">
                            <div class="carouselItem_info">
                                <div class="carouselInfo_izq2"> 
                                    <p style="margin: 0px; display: -webkit-box;
                                -webkit-line-clamp: 3;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis;">
                                    {{$o->titulo}}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- --------------------------------End Ofertas-------------------------------- -->
    </div>

    <script src="{{asset('owl/docs/assets/vendors/jquery.min.js')}}"
    type="text/javascript"></script>
    <script src="{{asset('owl/dist/owl.carousel.js')}}"
    type="text/javascript"></script>

    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop:false,
            
            autoHeight:true,
            responsive:{
                0:{
                    items:1,
                    margin:100
                },
                700:{
                    items:2,
                    margin:10
                },
                1200:{
                    items:3,
                    margin:10
                },
                1600:{
                    items:4,
                    margin:10
                },
                2000:{
                    items:5,
                    margin:10
                },
                2400:{
                    items:6,
                    margin:10
                },
                2800:{
                    items:7,
                    margin:10
                },
                3200:{
                    items:8,
                    margin:10
                },
                3600:{
                    items:9,
                    margin:10
                },
                4000:{
                    items:10,
                    margin:10
                },
            }
        });
        window.dispatchEvent(new Event('resize'));

    </script>
@endsection