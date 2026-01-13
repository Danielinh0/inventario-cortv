<html>
    <head>
        <meta charset="utf-8">
        <title>Reporte</title>        
        @vite(['resources/css/app.css', 'resources/css/reportePDF.css', 'resources/js/app.js'])    
    </head>
<body>
    <div class="container">
        <!-- Encabezado del reporte-->
        @include('pdfs.partial.header', 
                        ['text_1' => 'REPORTE MENSUAL DE INVENTARIO ALMACEN',
                        'text_2' => 'DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES',
                        'text_3' => "Período: $fechaInicio a $fechaFin"
                        ])

        <!--Tabla de productos-->
     <div class="table-container">   
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Clave</th>
                    <th>Producto</th>
                    <th>Existencia Inicial</th>
                    <th>Entradas</th>
                    <th>Salidas</th>
                    <th>Existencia Final</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reporteData as $item)
                    <tr>
                        <td>{{ $item['datos_producto']->id_producto }}</td>
                        <td>{{ $item['datos_producto']->clave->valor_clave }}</td>
                        <td style="word-wrap: break-word; max-width: 150px;">{{ $item['datos_producto']->nombre_producto }}</td>

                        <td class="text-gray">{{ $item['exInicial'] }}</td>
                        <td class="text-green">{{ $item['totalEntrada'] }}</td>
                        <td class="text-red">{{ $item['totalSalida'] }}</td>
                        <td class="{{ $item['exFinal'] > 0 ? 'text-green' : 'text-red' }}">{{ $item['exFinal'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center;">No hay datos disponibles</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

     </div> 
    </div>
</body>
</html>