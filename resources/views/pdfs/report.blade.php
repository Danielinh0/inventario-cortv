<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Reporte</title>        
        <style>
            /* Reset y configuración de página - basado en reportePDF.css */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            @page {
                margin: 20mm 15mm;
            }

            body {
                font-family: 'Times New Roman', Times, serif;
                text-align: center;
                padding: 40px;
            }

            .container {
                width: 100%;
            }

            /* Estilos del header */
            .header-container {
                margin-bottom: 20px;
                text-align: center;
            }

            .header-content {
                width: 100%;
            }

            .logo-container {
                text-align: center;
                margin-bottom: 10px;
            }

            .text-container {
                text-align: center;
            }

            .title-main {
                font-size: 16px;
                font-weight: bold;
                color: #111827;
                margin-bottom: 8px;
            }

            .title-sub {
                font-size: 14px;
                font-weight: 600;
                color: #374151;
                margin-bottom: 5px;
            }

            .title-period {
                font-size: 12px;
                font-weight: 300;
                color: #000;
            }

            .area-text {
                font-size: 14px;
                font-weight: 600;
                margin-bottom: 10px;
                margin-top: 15px;
                text-align: left;
            }

            /* Estilos de la tabla - basado en reportePDF.css */
            .table-container {
                width: 100%;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th, td {
                padding: 8px;
                text-align: center;
                border: 1px solid #ddd;
            }

            th {
                background-color: #f5f5f5;
                font-weight: bold;
                font-size: 10px;
            }

            tbody {
                font-size: 8px;
            }

            tbody tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            thead {
                display: table-header-group;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            /* Colores para valores - basado en reportePDF.css */
            .text-green {
                color: green;
            }

            .text-red {
                color: red;
            }

            .text-gray {
                color: #6b7280;
            }
        </style>
    </head>
<body>
    <div class="container">
        <!-- Encabezado del reporte-->
        @include('pdfs.partial.header', 
                        ['text_1' => 'REPORTE MENSUAL DE INVENTARIO ALMACEN',
                        'text_2' => 'DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES',
                        'text_3' => "Período: $fechaInicio a $fechaFin"
                        ])
        <h2 class="area-text">Área: {{ $area }}</h2>
        <!--Tabla de productos-->
     <div class="table-container">   
        <table>
            <thead>
                <tr>
                    <th>Numeración</th>
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
                        <td>{{ $loop->iteration }}</td>
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