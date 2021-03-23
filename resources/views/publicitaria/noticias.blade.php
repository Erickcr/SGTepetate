@extends('layouts.menuPublicitaria')

@section('titulo')
    Noticias
@endsection

@section('facebook')

@endsection

@section('header')
<header class="masthead" style="background-image: url('img/galeria/galeria14.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Noticias</h1>
            <span class="subheading">Se el primero en enterarte sobre nuestras últimas actividades</span>
          </div>
        </div>
      </div>
    </div>
</header>
@endsection

@section('contenido')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="{{asset('/js/facebook-sdk.js')}}"></script>
    
    @php
        $noticiaId = 0;
    @endphp

    <section class="blog-page">
      <div class="container">
          <div class="row">
            @if(is_null($mensaje))
            @foreach ($noticias as $noticia)
              <div class="col-md-8 col-md-offset-2" style="margin: auto;">
                  <div class="blog-item">
                      <img src="{{asset('/storage/images/noticias_img/'.$noticia->imagen)}}" alt="">
                      <div class="date">
                        <?php
                          echo date("d/m/Y", strtotime("$noticia->fecha"));
                        ?>
                      </div>
                      <div class="down-content">
                          <h4>{{$noticia->titulo}}</h4>
                          <div style="line-height: 1.5em;
                          height: 8.3em; 
                          overflow: hidden;
                          font: 400 13px Roboto; color: rgb(154, 154, 154); text-align:justify; display:flex;">
                            <div>
                              {!! $noticia->texto !!}
                            </div>
                            <div style="margin-top: 13.3%">
                              ...
                            </div>
                          </div>
                          <div class="text-button">
                          <a class="select-noticia" data-toggle="modal" data-target="#modalNoticia{{ $noticia->idNoticia }}" style="cursor: pointer;">Seguir Leyendo</a>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Modal: modalNoticia -->
              <div class="modal fade" id="modalNoticia{{ $noticia->idNoticia }}" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                      <div style="width: 100%; text-align: center;">
                        <img src="{{asset('/storage/images/noticias_img/'.$noticia->imagen)}}" alt="" style="width: 95%; height: auto; margin:auto; margin-bottom:50px;">
                      </div>
                      <div class="textoNoticia">
                        <h4 class="modal-title" id="myModalLabel" style="font: 800 28px Roboto;">{{$noticia->titulo}}</h4>
                        {!! $noticia->texto !!}
                      </div>
                      <div style="text-align: center;">
                        @if($noticia->boton && $noticia->link)
                          <button onclick="window.open('{{ $noticia->link }}');" class="botonNoticia2">{{ $noticia->boton }}</button>
                        @endif
                      </div>

                    </div>
                    
                    <!--Footer-->
                    <div class="modal-footer">
                      <button type="button" class="botonNoticia" data-dismiss="modal">Cerrar</button>
                    </div>

                  </div>
                </div>
              </div>
              <!-- Modal: modalNoticia -->
            @endforeach
            @else
              <h1 style="text-align: center">{{ $mensaje }}</h1>
            @endif
            <div class="col-md-8 col-md-offset-2" style="margin: auto;">
              @if(is_null($mensaje))
                {{$noticias->links()}}
              @endif
            </div>

            <div class="recetaRow" style="text-align: center;">
              <h1 style="font: 600 36px Roboto; margin-top:50px; margin-bottom:50px;">Conoce más sobre nosotros navegando en nuestra página web</h1>
              <hr class="hrMediano" style="margin-bottom: 50px">
              <iframe height="472.5"
              src="https://www.youtube.com/embed/R5xbRUbXbTk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
              </iframe>
            </div>
            <div class="recetaRow" style="text-align: center;">
              <h1 style="font: 600 36px Roboto; margin-top:100px; margin-bottom:50px;">Entérate de otras noticias en nuestra página de Facebook</h1>
              <hr class="hrMediano" style="margin-bottom: 50px">
              <!--es script del api-->
              <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0"></script>
              <!-- aquí va la configuración de la appi de fb -->
              <div class="RDSAP">
                <div class="redessocialesAPPI">
                  <div id="fb">
                    <div class="col-sm-12 col-sm-6 col-md-12" style="height: 600px">
                      <div id="fb-container">
                    <div class="fb-page" data-href="https://www.facebook.com/Granja-de-Trucha-Tepetates-1125220357665723" data-tabs="timeline" data-width="500" data-height="600" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Granja-de-Trucha-Tepetates-1125220357665723" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Granja-de-Trucha-Tepetates-1125220357665723">Granja de Trucha Tepetates</a></blockquote></div>                  </div>
                    </div>
                  </div>
                </div> 
              </div>
              <!------------------------->
            </div>
          </div>
      </div>
  </section>

    <!-- scripts -->
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $(window).bind("load resize", function(){
        setTimeout(function() {
        var container_width = $('#fb-container').width();
          $('#fb-container').html('<div class="fb-page" ' +
          'data-href="https://www.facebook.com/Granja-de-Trucha-Tepetates-1125220357665723"' +
          ' data-width="' + container_width + '" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Granja-de-Trucha-Tepetates-1125220357665723"><a href="https://www.facebook.com/Granja-de-Trucha-Tepetates-1125220357665723">Granja de Trucha Tepetates</a></blockquote></div></div>');
          FB.XFBML.parse( );
        }, 100);
      });
      });
  </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
@endsection

@section('scripts')

@endsection

@section('carritoURL')
    '/noticias?modal=1'
@endsection

@section('url')
    '/noticias'
@endsection