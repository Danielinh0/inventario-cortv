<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    @vite('resources/css/login.css')
</head>
<body class="login-bg">
    <div class="login-container">
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            <h1 class="login-title">Iniciar Sesión</h1>
            <div class="login-field">
                <label for="email">Correo Electrónico</label>
                <input id="email" name="email" type="email" required autofocus autocomplete="username" value="{{ old('email') }}">
                @if($errors->first('email'))
                    <span class="login-error">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="login-field">
                <label for="password">Contraseña</label>
                <input id="password" name="password" type="password" required autocomplete="current-password">
                @if($errors->first('password'))
                    <span class="login-error">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button type="submit" class="login-btn">Iniciar Sesión</button>
            @if(Route::has('password.request'))
            <div class="login-link">
                <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            </div>
            @endif
        </form>
    </div>
</body>
</html>