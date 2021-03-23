@extends('layouts.menuPublicitaria')

@section('titulo')
@if(is_null($mensaje))
    @foreach($receta as $newreceta)
        - {{$newreceta->nombre}}
    @endforeach
@else
  - receta
@endif
@endsection

@section('importOwl')
 <!-- Importando owl carousel -->
 <link href="{{asset('owl/dist/assets/owl.carousel.css')}}" 
  rel="stylesheet" type ="text/css">
  <link href="{{asset('owl/dist/assets/owl.theme.default.min.css')}}"
  rel="stylesheet" type="text/css">
@endsection

@section('header')
<header class="masthead" style="background-image: url('/img/imgNoticias/banner_producto.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>
              Recetas
            </h1>
            <span class="subheading">
              Amor y sabor en su plato
            </span>
          </div>
        </div>
      </div>
    </div>
</header>
@endsection

@section('contenido')
@php

  //este script de aqui es para transformar los links normales de youtube a embed
  function getYoutubeEmbedUrl($url){
      $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
      $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

      if (preg_match($longUrlRegex, $url, $matches)) {
          $youtube_id = $matches[count($matches) - 1];
      }

      if (preg_match($shortUrlRegex, $url, $matches)) {
          $youtube_id = $matches[count($matches) - 1];
      }
      return 'https://www.youtube.com/embed/' . $youtube_id ;
  }  

@endphp

<div class="container">
  <div class="row">
    @if(is_null($mensaje))
      @foreach($receta as $newreceta)

      @php

      $id = $newreceta->idReceta

      @endphp

      <div class="imgContainer">
        <img src="{{asset('/storage/images/recetas_img/'.$newreceta->imagen)}}" style="width:100%; height:auto; max-height:670px; object-fit: cover;">
      </div>

      <div class="nombreReceta">
        <i class="fas fa-utensils fa-2x"></i>
        <h4>{{$newreceta->nombre}}</h4>
        {!! $newreceta->descripcion !!}
      </div>

      <div class="recetaTable">
        <div class="recetaCell" style="width: 30%;">
          <div class="ingredientes">
            <h1>Ingredientes</h1>

            <ul class="recetaUL">
              {!! $newreceta->ingredientes !!}
            </ul>
          </div>

          @php

              $contadorPagina = 0;
              $pagina = 1;

          @endphp

          @foreach($productos as $producto)
          @php
              $contadorPagina++;
          @endphp

          @if($contadorPagina == 10)
              @php
                  $contadorPagina == 1;
                  $pagina++;
              @endphp
          @endif
            @if($newreceta->producto && $producto->idProducto == $newreceta->producto)
              <div style="padding-top:10px; width: 100%;">
                <h4 style="font: 900 24px Raleway; padding-left: 10px;">
                  Esta receta utiliza nuestro producto:
                </h4>
                <div style="display: table; width: 100%; border: 1px solid rgba(0, 0, 0, 0.24); padding: 10px;" class="margen-prod">
                  <div style="display: table-cell; width:50%; height:120px;">
                    <img src="{{asset('/storage/images/productos_img/'.$producto->imagen)}}" style="width:100%; height:100%; object-fit: cover;">
                  </div>
                  <div style="display: table-cell; width: 50%; vertical-align: middle; padding-left: 10px;">
                    <div style="height: 45px;">
                      <h5 style="margin: 0px; font: 900 12.5px Raleway; display: -webkit-box;
                      -webkit-line-clamp: 3;
                      -webkit-box-orient: vertical;
                      overflow: hidden;
                      text-overflow: ellipsis;">{{ $producto->nombre }}</h5>
                    </div>
                    <div style="height: 30px;">
                      <P style="margin: 0px; font: 100 11px Raleway; text-align: justify; margin-top: 10px; display: -webkit-box;
                      -webkit-line-clamp: 2;
                      -webkit-box-orient: vertical;
                      overflow: hidden;
                      text-overflow: ellipsis;">{{$producto->descripcion}}</P>
                    </div>
                  <button onclick="window.location.href = '{{ url('/productos?page='.$pagina.'#producto'.$producto->idProducto) }}'" style="width: 100%; background-color: transparent; font: 100 12px Raleway; padding: 5px; border: 1px solid rgb(156, 91, 0); color: rgb(70, 41, 0); border-radius: 10px; outline: none;">Ver producto</button>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
        <div class="recetaCell preparacion" style="width: 70%; padding: 50px; text-align:justify">

          <h1>Preparación</h1>
          <ol>
            {!! $newreceta->pasos !!}
          </ol>
        </div>
      </div>
      <div class="recetaRow" style="text-align: center;">
        <iframe height="472.5"
        src="{{getYoutubeEmbedUrl($newreceta->videoURL)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
        </iframe>
      </div>
      @endforeach
    @else
      <h1 style="text-align: center">{{ $mensaje }}</h1>
    @endif
    <p style="
    padding-bottom: 10px;
    margin-bottom: 10px;
    font: 900 36px Raleway;">
      ÚLTIMAS RECETAS
    </p>
  </div>
</div>

<div class="div_boxCarousel">
  <div class="owl-carousel owl-theme">
      @php
        $contador = 1;
      @endphp
      @if(is_null($mensaje))
        @foreach($recetas as $r)

          <div class="recetaListContainer">
            <div class="recetaListRow">
              <span class="card-number card-circle subtle">
                @php
                if($contador < 9)
                  echo "0$contador";
                else{
                echo "$contador";
                }

                $contador ++;
                @endphp
              </span>
              <div class="hReceta" style="height: 150px">
                <h1 style="display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;">{{$r->nombre}}</h1>
              </div>
              <div class="pReceta" style="height: 50px">
                <p style="display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;">{{$r->descripcion}}</p>
              </div>
              <div class="card-read"><a href="/recetas/{{$r->idReceta}}">LEER</a></div>
            </div>
            <div class="recetaListRow recetaIMG" style="
            background-image: url('{{asset('/storage/images/recetas_img/'.$r->imagen)}}');
            background-position: center center !important;
            background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            -webkit-background-size: cover;
            "> &nbsp;
            </div>
          </div>

        @endforeach
      @else
      <h1 style="text-align: center">{{ $mensaje }}</h1>
    @endif
  </div>
</div>

    <script src="{{asset('owl/docs/assets/vendors/jquery.min.js')}}"
    type="text/javascript"></script>
    <script src="{{asset('owl/dist/owl.carousel.js')}}"
    type="text/javascript"></script>

    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoHeight:false,
            responsive:{
                0:{
                    items:1,
                    margin:100
                }
                ,
                1400:{
                    items:2,
                    margin:100
                },
                2100:{
                    items:3,
                    margin:100
                }
                ,
                2800:{
                    items:4,
                    margin:100
                },
                3500:{
                    items:5,
                    margin:100
                },
                4200:{
                    items:6,
                    margin:100
                }
            }
        });

        $('.owl-stage').css('height', "500px" );
    </script>
@endsection

@section('carritoURL')
  '/recetas/{{ $id }}?modal=1'
@endsection

@section('url')
    '/recetas/{{ $id }}'
@endsection