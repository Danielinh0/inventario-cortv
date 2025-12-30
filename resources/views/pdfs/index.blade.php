<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
    <div class="w-full py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <img src="https://www.oaxaca.gob.mx/cortv/wp-content/uploads/sites/79/2023/12/cortv.png" style="height: 120px;">
                </div>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">REPORTE MENSUAL DE INVENTARIO ALMACEN</h1>
                <h2 class="text-xl font-semibold text-gray-700 mb-6">DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES</h2>
            </div>
        </div>
        <!-- La tabla contiene Numeracion, Codigo de producto, nombre del producto (llamado descripcion),
            Existencias iniciales, Cantidad de salidas, Cantidad de entradas,  Existencias finales-->
        <!--Tabla de productos-->
        @livewire('tabla.reporte')
    </div>
</body>