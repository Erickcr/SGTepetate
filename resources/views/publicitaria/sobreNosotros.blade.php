@extends('layouts.menuPublicitaria')

@section('titulo')
- Sobre Nosotros
@endsection

@section('header')
<header class="masthead" style="background-image: url('img/sobreNosotrosBanner.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Sobre Nosotros</h1>
            <span class="subheading">Conoce quiénes somos</span>
          </div>
        </div>
      </div>
    </div>
</header>
@endsection

@section('contenido')
<div class="sobreNosotrosDivPrincipal">
    <div id="presentacionContainer">
        <p class="txt_Titulo">
            Empresa orgullosamente Michoacana
        </p>
        
        <hr class="hrMediano"> 

        <p class="txt_TituloGrande">
            GRANJA EL TEPETATE
        </p>

        <div class="div_contenido">
            <p class="txt_contenido">
                Somos una empresa certificada por el cumplimiento de las <b>Buenas Prácticas Acuícolas en la Producción Primaria</b> bajo la Secretaría de Agricultura y Desarrollo Rural Clave: AC-PD-16-19-473
            </p>
        </div>

        <div id="imgPresentacionContainer">
            <div id="imgPresentacion"></div>
        </div>

        <!--<img  id="img_SENASICA" src="/img/SENASICA.png" width="25%" height="100%">-->

    </div>

    <!-- MISIÓN Y VISIÓN -->
    <div id="div_mision"> 
        <div class="div_misionTransparente" >
            <div id="txtMissionContainer">
                <p class="txt_mision">
                    <b>Misión</b>
                </p>
            </div>
            <div id="txtMissionContenidoContainer">
                <p class="txt_misionContenido">
                    Ofrecer productos de la mayor calidad, sanos y seguros para una beneficiosa alimentación de nuestros consumidores.
                </p>
            </div>
        </div>

        <div class="div_misionTransparente" >
            <p class="txt_mision">
                <b>Visión</b>
            </p>

            <div id="txtMissionContenidoContainer">
                <p class="txt_misionContenido">
                    Ser una empresa distribuidora de excelencia, reconocida por sus productos de alta calidad y confiabilidad.
                </p>
            </div>
        </div>
    </div> 

    <!-- HISTORIA Y VALORES -->
    <div id="historiaContainer">
        <div id="div_historia">
            <div id="imgHistoria"></div>
            <!--<img id="img_historia" src="/img/historia.jpg">-->
        </div>

        <div id="div_historiaPII">
            <div id="txtMissionContainer">
                <p class="txt_mision">
                    <b>Historia</b>
                </p>
            </div>
            
            <div id="txtHistoriaContenidoContainer">
                <p class="txt_misionContenido">
                    La Granja Truticola El tepetate es una empresa familiar
                    que produce trucha arcoíris en estanques de concreto bajo
                    un sistema semi intensivo de cultivo, desde sus inicios 
                    hace 20 años ha contribuido a ofrecer un producto de alto 
                    valor nutrimental como es la trucha y de proporcionar fuente 
                    de empleo a las personas en la ciudad de Agostitlan. 
                </p>
            </div>

            <p class="txt_mision">
                <b>Valores</b>
            </p>

            <div id="txtHistoriaContenidoContainer">
                <p class="txt_valores">
                    Calidad; Confiabilidad; Calidez; Transparencia y Pasión.
                </p>
            </div>
        </div>
    </div>

    <!-- CERTIFICACIÓN -->
    <div id="certificacionContainer">
        <div id="div_certificacionII" >
            <p id="txt_certificacion">
                <b>Productos Certificados</b>
            </p> 
    
            <img id="img_certificacion" src="/img/imgPromocional/diploma.png">
    
            <div id="txtCertificacion">
                <p id="txt_certificacionContenido">
                    Nuestros productos cumplen con estrictos requisitos de limpieza y calidad bajo los más altos estándares de inspección.
                </p>
            </div>
    
            <a id="btn_certificacion" href="http://www.kosher.com.mx/consumidor/index.php?ver=productos_certificados" target="blank">LEER MÁS</a>
        </div>
        <div id="div_certificacion" >
            <div id="imgCertificacion"></div>
            <!--<img src="/img/certificacion.jpg">-->
        </div>
    </div>

    <!-- UBICANOS -->
    <div id="div_ubicanos">
        <div id="txtUbicanos">
            <p class="txt_mision">
                <b>Ubícanos</b>
            </p>
        </div>
        <div id="txtUbicanosContenido">
            <p class="txt_Ubicanos">
            <b>Domicilio conocido:</b> Agostitlán
            S/N, C.P. 61241, Municipio de 
            Hidalgo, Michoacán
            </p>
        </div>
        <div id="mapaContainer">
            <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7520.134092233439!2d-100.62490305199165!3d19.538734912903173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d2b354e3f18161%3A0xbd1f8764331094f8!2sAgostitl%C3%A1n%2C%20Mich.!5e0!3m2!1ses-419!2smx!4v1585697877883!5m2!1ses-419!2smx" 
                width="600" height="450" frameborder="" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
            </iframe>
        </div>
    </div>

    <!-- galeria de fotos -->
        <div class="photo-gallery">
            <div class="container">
                <div class="intro">
                    <h2 class="text-center">Galeria</h2>
                    <hr class="hrMediano">
                </div>
                <div class="row photos">
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria2.jpg"  data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria2.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria8.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria8.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria7.jpeg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria7.jpeg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria11.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria11.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria3.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria3.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria5.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria5.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria6.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria6.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria9.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria9.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria10.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria10.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria12.jpeg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria12.jpeg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria13.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria13.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria14.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria14.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria15.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria15.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria16.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria16.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria17.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria17.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria18.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover;  margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria18.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria19.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover; margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria19.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria20.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover; margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria20.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria21.jpg" data-lightbox="photos"><img style="height: 200px; width:100%;  Object-fit:cover; margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria21.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria22.jpg" data-lightbox="photos"><img style="height: 200px; width:100%; Object-fit:cover; margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria22.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/galeria4.jpg" data-lightbox="photos"><img style="height: 200px; width:100%;  Object-fit:cover; margin-bottom: 20px;" class="img-fluid" src="img/galeria/galeria4.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/granja.jpg" data-lightbox="photos"><img style="height: 200px; width:100%;  Object-fit:cover; margin-bottom: 20px;" class="img-fluid" src="img/galeria/granja.jpg"></a></div>
                    <div style="height: 200px; margin-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/galeria/instalaciones2.jpg" data-lightbox="photos"><img style="height: 200px; width:100%;  Object-fit:cover; margin-bottom: 20px;" class="img-fluid" src="img/galeria/instalaciones2.jpg"></a></div>                
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
@endsection

@section('carritoURL')
    '/sobre-nosotros?modal=1'
@endsection

@section('url')
    '/sobre-nosotros'
@endsection