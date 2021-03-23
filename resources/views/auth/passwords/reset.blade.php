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
        <div id="login_box" class="shadow" >
            <img id="login_imagen" src="{{asset('/img/imgLogin/login.png')}}" alt="">
        
            <!--Form que enviará datos de inicio de sesión-->
            <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <p class="login_texto">Ingresa tu correo electrónico:</p>
            <input id="email" type="email" style="outline: none" class="login_textbox @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus style="margin-bottom: 15px">
            @error('email')
                <span class="mensaje_error_login" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <p class="login_texto">Ingresa tu nueva contraseña:</p>
            <input id="password" type="password" style="outline: none" class="login_textbox @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="margin-bottom: 15px">
            @error('password')
                <span class="mensaje_error_login" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <p class="login_texto">Confirma tu contraseña:</p>
            <input id="password-confirm" style="outline: none" type="password" class="login_textbox" name="password_confirmation" required autocomplete="new-password" style="margin-bottom: 15px">

            <button type="submit" class="login_btn" style="margin-left:25%;margin-right:25%;width:50%;margin-bottom:25px;margin-top:10px">
                {{ __('Cambiar contraseña') }}
            </button>
            </form>
        </div>
    </div>
</body>
</html>