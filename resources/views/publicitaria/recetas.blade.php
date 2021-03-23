@extends('layouts.menuPublicitaria')

@section('titulo')
    Recetas
@endsection

@section('importOwl')
 <!-- Importando owl carousel -->
 <link href="{{asset('owl/dist/assets/owl.carousel.css')}}" 
  rel="stylesheet" type ="text/css">
  <link href="{{asset('owl/dist/assets/owl.theme.default.min.css')}}"
  rel="stylesheet" type="text/css">
@endsection

@section('css')
<link href="/css/styleRecetas.css" rel="stylesheet" type="text/css">
@endsection

@section('header')
<header class="masthead" style="background-image: url('/img/imgNoticias/banner_producto.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Recetas</h1>
            <span class="subheading">Amor y sabor en su plato</span>
          </div>
        </div>
      </div>
    </div>
</header>
@endsection

@section('contenido')
<section class="our-blog" style="margin-bottom: 0px;">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="heading">
                  <h2 style="margin-bottom: 0px;">VEA NUESTRAS ÚLTIMAS RECETAS</h2>
              </div>
          </div>
      </div>
  </div>
</section>

@if(is_null($mensaje))
<div class="div_boxCarousel">
  <div class="owl-carousel owl-theme">
      @php
        $contador = 1;
      @endphp
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
  </div>
</div>
@else
  <h1 style="text-align: center">{{ $mensaje }}</h1>
@endif


<section class="our-blog">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="heading">
                  <h2>Recetario</h2>
              </div>
          </div>
      </div>
      <div class="row">
        @if(is_null($mensaje))
          @foreach ($recetasCompletas as $r)
            <div class="col-md-6">
              <div class="blog-post">
                  <img src="{{asset('/storage/images/recetas_img/'.$r->imagen)}}" alt="" style="height: 237px;Object-fit: cover" >
                  <div class="right-content">
                      <div style="height: 80px;">
                        <h4 style="display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        height: 80px;">{{$r->nombre}}</h4>
                      </div>
                      <div style="height: 70px; text-align: justify;">
                        <p class="pReceta" style="
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;">{{$r->descripcion}}</p>
                      </div>
                      <div class="text-button">
                          <a href="{{"/recetas/".$r->idReceta}}">Ver receta</a>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
        @else
        <div style="width: 100%; text-align: center">
          <h1>{{ $mensaje }}</h1>
        </div>
        @endif
      </div>
      @if(is_null($mensaje))
        {{$recetasCompletas->links()}}
      @endif
  </div>
</section>  


<div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="blog-post">
          <a id="beneficios"></a>
          <img src="{{asset('/img/imgNoticias/omega32.jpg')}}" class="imgomega" alt="" >
          <div class="right-content">
              <h4 class="infoh4receta">Beneficios de incluir la trucha en tu alimentación</h4>
              <p class="infopreceta">
                La trucha posee importantes propiedades nutricionales 
                  que son beneficiosas para una buena salud. <br><br>
                  Se trata de un pescado rico en ácidos grasos omega 3, 
                  los cuales ayudan a prevenir enfermedades 
                  cardiovasculares al reducir la hipertensión y el colesterol.
                  100 gramos de trucha aportan 90 calorías y sólo 
                  3 gramos de grasa.
              </p>
          </div>
        </div>
    </div>
  </div>
</div>
{{-- <div id="receta">
  <br>
  <br>
  <table>
      <tr>
          <td id="receta_izq" style="opacity:0.7">
              
          </td>
          <td id="receta_der">
              <!-- aquí debe ir información sacada de la base de datos -->
              <p class="receta_titulo">Beneficios de incluir la trucha en tu alimentación <br><br></p>
              <p class="receta_pasos">
                  La trucha posee importantes propiedades nutricionales 
                  que son beneficiosas para una buena salud. 
                  <br><br>
                  Se trata de un pescado rico en ácidos grasos omega 3, 
                  los cuales ayudan a prevenir enfermedades 
                  cardiovasculares al reducir la hipertensión y el colesterol.
                  100 gramos de trucha aportan 90 calorías y sólo 
                  3 gramos de grasa.
              </p>
          </td>
      </tr>
  </table>
  <br><br>
</div> --}}

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
    '/recetas?modal=1'
@endsection

@section('url')
    '/recetas'
@endsection