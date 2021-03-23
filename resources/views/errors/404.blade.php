<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Granja El Tepetate</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="icon" href="{{asset('img/logo.png')}}" type="image/icon type">


  <!-- Custom fonts for this template-->
  <link href="{{asset('temaGestor/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('temaGestor/css/app.css')}}" rel="stylesheet">


</head>

<body>

<div style="background-color: #ffffff;height: 100vh; width: 100%;vertical-align:middle">
  <div class="text-center" style="margin: " >
    <img src="{{asset('img/logo1-black.png')}}" alt="" style="width: 400px;height:200px">
    <div class="error mx-auto" data-text="404">404</div>
    <p class="lead text-gray-800 mb-5">Página no encontrada</p>
  <a href="{{ url()->previous() }}">&larr; Volver a Inicio</a>
  </div>
</div>

</body>
</html>
