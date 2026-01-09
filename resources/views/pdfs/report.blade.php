<html>
    <head>
        <meta charset="utf-8">
        <title>Reporte</title>
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
<body>
    <div class="w-full py-6 px-4 sm:px-6 lg:px-8">
        <!-- Encabezado del reporte-->
            @include('pdfs.partial.header', 
                        ['text_1' => 'REPORTE MENSUAL DE INVENTARIO ALMACEN',
                        'text_2' => 'DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES',
                        ])
                        
        <!--Tabla de productos-->
        
            <livewire:tabla.reporte/>
            @livewire('tabla.reporte',['fechaInicio' => $fechaInicio, 'fechaFin' => $fechaFin, 'showPdfButton' => false])
    </div>
</body>