@extends('layouts.menuPublicitaria')

@section('titulo')
- Contáctanos    
@endsection

@section('header')
<header class="masthead" style="background-image: url('img/imgPromocional/contactanos.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Contáctanos</h1>
            <span class="subheading">Estamos listos para atender sus necesidades</span>
          </div>
        </div>
      </div>
    </div>
</header>
@endsection

@section('contenido')
<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          <div class="div_SmallSeparacion"></div>
          
          <div id="div_negro" >


              <p id="titulo">GRANJA <br>EL TEPETATE</p>
              

              <p id="contenido">

                <i class="fa fa-map-marker"></i> <span> Domicilio </span>
                <br>
                
                Agostitlán

                <br>

                S/N, C.P. 61241,
                Municipio de

                <br>

                Hidalgo, Michoacán.

                <br>
                <br>

                <i class="fa fa-phone"></i> <span> Teléfono </span>

                <br>

                +1 443-228-0290

                <br>
                <br>

                <i class="fa fa-envelope"></i>
                <span> Correo </span>

                <br>

                <a href="mailto:arturoalcocermolina@gmail.com">arturoalcocermolina@gmail.com</a>
              </p>

              <p id="siguenos">Síguenos</p>
              
              <div id="logosContacto">
                <a href="https://www.youtube.com/channel/UCh58-HAMHfTWHDWWaaYXmIQ" target="blank">
                  <i class="fab fa-youtube fa-3x" id="fbIcono"></i>
                </a>
                <a href="https://www.facebook.com/Granja-de-Trucha-Tepetates-1125220357665723/" target="blank">
                  <i class="fab fa-facebook-square fa-3x" id="fbIcono"></i>
                </a>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@section('carritoURL')
    '/contacto?modal=1'
@endsection

@section('url')
    '/contacto'
@endsection