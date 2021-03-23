<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar contraseña</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/icon type">
    <link href="{{asset('css/styleLogin.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>
    <div id="background_login" style="height: fit-content; min-height:100%">
        <!--Caja blanca de en medio-->
        <div id="login_box" class="shadow">
            <img id="login_imagen" src="{{asset('/img/imgLogin/login.png')}}" alt="">
        
            <!--Form que enviará datos de inicio de sesión-->
            <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <p class="login_texto">Ingresa tu correo electrónico:</p>
            <input id="email" type="email" style="outline: none" class="login_textbox @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            {{-- Información si es válido o no --}}
            @error('email')
                <div class=" infoEnvioCorreo" role="alert" style="color: #ac1730">
                    {{ $message }}
                </div>
            @enderror
            {{-- Información del correo --}}
            @if (session('status'))  
            <div class="alert alert-success infoEnvioCorreo" role="alert">
                {{ session('status') }}
            </div>
            @endif
            
            
            <button type="submit" class="login_btn" style="margin-left:25%;margin-right:25%;width:50%;margin-bottom:25px">
                {{ __('Enviar correo') }}
            </button>
            </form>
            <!--Link que redirige a página de restauración de contraseña-->
            <p class="login_texto" style="width: 80%; text-align:center;font-size:16px">
                <br>
                Se enviará un mensaje a su correo electrónico con un enlace para restaurar la contraseña
            </p>
            <div style="height: 20px"></div>
        </div>
    </div>
</body>
</html>