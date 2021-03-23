<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesión</title>
    <link href="{{asset('/css/styleLogin.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/icon type">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>
    <div id="background_login" style="height: fit-content; min-height:100%">
        <!--Caja blanca de en medio-->
        <div id="login_box" class="shadow">
            <img id="login_imagen" src="{{asset('/img/imgLogin/login.png')}}" alt="">
        
            <!--Form que enviará datos de inicio de sesión-->
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <p class="login_texto">Correo electrónico:</p>
            <input id="email" type="email" style="outline: none" class="login_textbox @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <div class="infoEnvioCorreo" role="alert" style="color: #ac1730">
                    {{ $message }}
                </div>
            @enderror
            

            <p class="login_texto">Contraseña :</p>
            <input id="password" type="password" style="outline: none" class="login_textbox @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <div class="infoEnvioCorreo" role="alert" style="color: #ac1730">
                    {{ $message }}
                </div>
            @enderror
            @error('active')
                <div class="infoEnvioCorreo" role="alert" style="color: #ac1730">
                    {{ $message }}
                </div>
            @enderror
            <!--Botón que enviará datos-->
            
            <button type="submit" class="login_btn" style="margin-left:25%;margin-right:25%;width:50%;">
                {{ __('Iniciar sesión') }}
            </button>
            @if (Route::has('password.request'))
                <div class="texto_forget_contra">
                <a class="forget_link" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
                </div>
            @endif
            </form>
            <!--Link que redirige a página de restauración de contraseña-->
        
        </div>
    </div>
</body>
</html>