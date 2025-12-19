<!-- Login background from Figma node 8:45 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body.login-bg {
            min-height: 100vh;
            background-image: url('https://www.figma.com/api/mcp/asset/9c98892b-bdde-4f1b-b101-a90388d85cb3');
            background-repeat: repeat;
            background-size: 45.5px 25px;
            background-position: top left;
        }
    </style>
</head>
<body class="login-bg flex items-center justify-center">
    @yield('content')
</body>
</html>
