<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tepetate - Inicio</title>
    <link rel="icon" href="img/logo.png" type="image/icon type">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="/css/styleInicio.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<body>
    @yield('facebook')
    <!-------------Header------------->
    <div class="header" >
        <div class="nav">
            <div id="headerLogos">
                <!-------------Llamanos------------->
                <div id="llamanosTabla" >
                    <table align="right" style="width: 80%;align-self: center;" >
                        <tr>
                            <td style="vertical-align:middle; text-align:right;">
                                <p><img src="img/logo.png" height="50" width="50"></p>
                            </td>
                            <td style="vertical-align: middle;">
                                <p style="font-family:Roboto; color: white;font: normal;font-size: 15px;">
                                    <b>Llámanos:</b> 443-228-0290
                                    <br>
                                    <b>Correo:</b> arturoalcocermolina@gmail.com
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-------------Logo------------->
                <div align="center" id="logoHeader">
                    <a href="/"><img align="center" src="img/logo2.png" height="104px" width="235px"> </a>
                </div>

                <!-------------Carrito------------->
                <div  align="center" id="carritoHeader">
                    <a href="/carrito"><img align="center" src="img/carrito.png" height="45px" width="45px"> </a>
                </div>
            </div>
            <!-------------Menu------------->
            <div id="menuInicio">
                <ul class="menu-bar">
                    <a href="/sobre-nosotros"><li>SOBRE NOSOTROS</li></a>
                    <li>|</li>
                    <a href="/contacto"><li>CONTÁCTANOS</li></a>
                    <li>|</li>
                    <a href="/productos"><li>PRODUCTOS</li></a>
                    <li>|</li>
                    <a href="/recetas"><li>RECETAS</li></a>
                    <li>|</li>
                    <a href="/noticias"><li>NOTICIAS</li><a/>
                </ul>
            </div>
        </div>
        <div id="cuerpoInicio">
            <p class="title">LAS MÁS DELICIOSAS TRUCHAS</p>
            <p class="title">CRIADAS EN LA MEJOR GRANJA</p>
        </div>
        <div id="infoInicio">
            <p class="normal1" >Criamos y engordamos nuestras truchas en las mejores condiciones para brindar al cliente el producto más LIMPIO, SANO y NUTRITIVO.</p>
        </div>
        <div id="leerMasInicio">
            <p class="leermas" >    
                LEER MÁS <br> 
                <a href="#ancla"><img src="img/flechaAbajo1.png" width="26px" height="14px" align="center""></a>
            </p>
        </div>
    </div>
    
    <p class="title2">
        <a name="ancla"></a>
            <br><br>
            PRODUCTOS 
            <br><br>
            <hr style="width:30%;color:#707070;margin:auto;">
        </p>
        
        <p class="title3">
            LO QUE OFRECEMOS
        </p>
        <p class="normal2">
            Las truchas más frescas que podrá encontrar en el mercado, preparadas en diferentes presentaciones.
        </p>
        <br><br>
        
        <div class="productos" style="margin-left:18%">
            Producto1
        </div> 
        <div class="productos" style="margin-left:2%">
            Producto2
        </div>  
        <div class="productos" style="margin-left:2%">
            Producto3
        </div>
        <a href="/productos" class="link">
        <br><br>
        <p class="vermas">
            <u>VER MÁS</u>  <img src="img/icon-mostrar.png" width="10px" height="10px" >
        </p>
        <br> 
        </a>     
    <!--segunda pantalla-->
    <div class="divImagen">
        <P class="titleMF" style="font-weight:normal;opacity:.9;">MANTENTE INFORMADO</P>
        <hr style="color: #FAFAFA; width: 25%; margin:auto">
        <p id="btn_noticias"> <button onclick="window.location.href = '/noticias';" class="buttonNoticias">NOTICIAS</button> </p>
    </div> 
  
    <!--tercera pantalla-->
        <table width="76%" height="50%" style="margin:auto;">
            <tr>
                <td style="height:50%;width:25%; vertical-align:top">
                    <p class="parrafo">
                        <br><br>
                        PRODUCTOS CERTIFICADOS
                        <br>
                    </p>
                    <p class="parrafo2">
                        Nuestros productos cumplen con estrictos requisitos de limpieza y calidad bajo los más altos estándares de inspección.
                    </p>
                </td>
                <td class="celdaImagen1"> </td>
                <td class="celdaImagen2"> </td>
                <td class="celdaImagen3"> </td>
            </tr>
            <tr>
                <td class="celdaImagen4"> </td>
                <td class="celdaImagen5"> </td>
                <td class="celdaImagen6"> </td>
                <td style="height:50%;width:25%">
                    <a href="/productos">  <p class="parrafoCP" >CONOCE NUESTRO PRODUCTO</p> </a>
                    <p class="parrafo2" style="width:80%">
                        <br>
                        Contamos con acreditación por la aplicación de buenas prácticas de producción.
                    </p>
                </td>
            </tr>
        </table>
        
    <!--cuarta pantalla-->
    <div class="pantalla5">
        <div class="separacion">
        </div>
        <div id="informacion">
            <p id="txt_mejoraCalidad">
                MEJORA TU CALIDAD DE VIDA
            </p>
            <br>
            <p class="parrafo3">
             El consumo de la trucha puede traer consigo muchos beneficios para tu cuerpo
            . Se trata de un pescado rico en ácidos grasos omega 3,
            los cuales ayudan a prevenir enfermedades cardiovasculares al reducir la hipertensión y el colesterol.
            </p>
            <button onclick="window.location.href = '/recetas';" class="buttonConocerMas">CONOCER MÁS</button>
        </div>
    </div>

    <!--quinta pantalla-->            
        <!-- <table width=80% height="100%" style="margin:auto;border: 0.5px solid grey;vertical-align:top"> -->
    <div class="div_sobreN">
        <p class="title2">
            <br>
            SOBRE NOSOTROS
        </p>
        <br>
        <p class="title4" style="width:83%;margin:auto">
            SOMOS UNA GRANJA COMPROMETIDA A BRINDARLE AL CLIENTE PRODUCTOS DE CALIDAD LLEVANDO A CABO PROCESOS CERTIFICADOS
        </p>
        <br> <br>
        <p class="parrafo4" style="width:70%;margin:auto">
            Nuestra granja se dedica al cultivo de organismos acuáticos, más específicamente a la <b>trucha arcoíris</b>
            y <b>salmonada</b>, que cosechamos  con las más <b>exigentes estándares de inspección</b>, pues nos definimos 
            por nuestro compromiso con el consumidor.<br><br>
        </p>
        <hr width="20%" height="4px" style="opacity:0.6;margin:auto">
        
        <br><br>
        <div class="div_btnC">
            <button onclick="window.location.href = '/sobre-nosotros';" class="buttonConocenos">CONÓCENOS</button>
        </div>
    </div>
                    
    <!--sexta pantalla-->
    <div class="pantalla6">
        <br><br>
        <p class="title2" style="opacity:1;">RECETAS</p>
        <br>
        <hr width="25%" height="4px" style="opacity:0.6;margin:auto">
        <br>
        <p class="title4"> CONOCE NUEVAS FORMAS DE DISFRUTAR NUESTROS PRODUCTOS</p>
        

        <div class="div_recetasR">
            <div class="div_receta">
                <div class="div_imgReceta"></div>
                <br>
                <p class="title2" style="color:white">NOMBRE RECETA #1</p> 
                <br>
                <p class="normal3">Descripción de la receta #1. 
                Para provocar ssssssssssssssssssssssssssssssssssasdasdASdasdasdasdasdasdsadadsadasdasdadasdasdasdasdasdahambre a los visitantes de la página y sientan más ganas de comprar truchas.
                </p>
                <br>
                <button onclick="window.location.href = '/recetas';" class="buttonRecetas">Ver receta</button>
            </div>
            <p>&nbsp &nbsp &nbsp &nbsp</p>

            <div class="div_receta">
                <div class="div_imgReceta1"></div>
                <br>
                <p class="title2" style="color:white">NOMBRE RECETA #2</p> 
                <br>
                <p class="normal3">Descripción de la receta #2. 
                Para provocar hambre a los visitantes de la página y sientan más ganas de comprar truchas.
                </p>
                <br>
                <button onclick="window.location.href = '/recetas';" class="buttonRecetas">Ver receta</button>
            </div>
        </div>
        <br>
        <p class="vermas" style="color:black;font-size:110%">
            <a href="/recetas"><u>VER MÁS</u><img src="{{asset('images/icon-mostrar.png')}}" width="10px" height="10px" ></a>
        </p>
    </div>

    <!--septima pantalla-->
    <div class="pantalla7">
        <p class="title">
            <br>
            ¿TIENES PREGUNTAS?
            <br><br>
        </p>
        <hr style="width:25%;margin:auto;height:1.5px:color:#FAFAFA">
        <p class="title2" style="color:white;opacity:0.5">
            <br><br>
            CONTÁCTANOS
            <br><br><br>
        </p>
        <a href='https://www.facebook.com/Granja-de-Trucha-Tepetates-1125220357665723' target="blank" style="text-decoration: none;" >
            <div class="divBoton" >
                <br>
                <img src="/img/icon/facebook.png" width="100px" height="100px" style="opacity:.6" >
                <p class="normal4" style="color:white;opacity:0.9;">Visita nuestro facebook</p>
            </div>
        </a>
        <a href="mailto:arturoalcocermolina@gmail.com?Subject=Interesado:%20visitante%20de%20página%20publicitaria" style="text-decoration: none;">
            <div class="divBoton" style="margin-left:5%" >
                <br>
                <img src="/img/icon/email.png" width="100px" height="100px" style="opacity:.6" >
                <p class="normal4" style="color:white;opacity:0.9;">Envíanos un mensaje</p>
            </div>
        </a>
        <a href='/contacto' style="text-decoration: none;" >
            <div class="divBoton" style="margin-left:5%" >
                <br>
                <img src="/img/icon/phone.png" width="100px" height="100px" style="opacity:.6" >
                <p class="normal4" style="color:white;opacity:0.9;">Llámanos</p>
            </div>
        </a>
    </div>

    @include('subviews.footerPublicitaria')
</body>
</html>