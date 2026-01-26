<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Salidas del inventario</title>
    <style>
        /* Reset - basado en salidas.css */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @page {
            margin: 10mm 12mm 15mm 12mm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        main {
            width: 100%;
        }

        /* Header - basado en salidas.css */
        .header {
            width: 100%;
            text-align: center;
            margin-bottom: 15px;
        }

        .tabla-logos {
            text-align: center;
            margin-bottom: 3px;
        }

        .tabla-logos table {
            width: 80%;
            margin: 0 auto;
            border: none;
        }

        .tabla-logos td {
            text-align: center;
            border: none;
            padding: 5px 20px;
            width: 50%;
        }

        .tabla-logos img {
            max-width: 220px;
            height: auto;
        }

        /* Corporación - basado en salidas.css */
        .corporacion {
            text-align: center;
            margin-bottom: 10px;
            margin-top: -40px;
        }

        .corporacion h1 {
            font-weight: bold;
            font-size: 18px;
            margin: 0 0 5px 0;
        }

        .corporacion h2 {
            font-weight: normal;
            font-size: 14px;
            margin: 0;
        }

        /* Solicitud */
        .solicitud {
            width: 100%;
            margin-top: 10px;
            text-align: center;
        }

        .titulo-documento {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            padding: 3px;
        }

        /* Información - basado en salidas.css */
        .informacion-s {
            width: 100%;
            margin-top: 8px;
            margin-bottom: 15px;
        }

        .informacion-s table {
            width: 90%;
            margin: 0 auto;
            border: none;
        }

        .informacion-s td {
            text-align: center;
            vertical-align: top;
            padding: 3px 10px;
            font-size: 12px;
            border: none;
        }

        .informacion-s .label {
            font-weight: bold;
            display: block;
            margin-bottom: 3px;
        }

        /* Tabla de productos - basado en salidas.css */
        .tabla-contenido {
            width: 100%;
            margin-bottom: 20px;
        }

        .tabla-productos {
            width: 85%;
            margin: 0 auto;
            border-collapse: collapse;
            text-align: center;
        }

        .tabla-productos thead {
            display: table-header-group;
        }

        .tabla-productos thead th {
            background-color: #AE2B2F;
            color: white;
            padding: 6px;
            border: 1px solid #888;
            font-weight: bold;
            font-size: 11px;
        }

        .tabla-productos tbody td {
            padding: 5px;
            border: 1px solid #888;
            text-align: center;
            vertical-align: middle;
            font-size: 10px;
        }

        .tabla-productos tr {
            page-break-inside: avoid;
        }

        /* Autorización - basado en salidas.css */
        .autorizacion {
            width: 100%;
            margin-top: 25px;
            page-break-inside: avoid;
        }

        .tabla-autorizacion {
            width: 85%;
            margin: 0 auto 8px auto;
            border-collapse: collapse;
            text-align: center;
            table-layout: fixed;
        }

        .tabla-autorizacion th {
            background-color: #AE2B2F;
            color: white;
            font-weight: bold;
            padding: 6px;
            border: 1px solid #888;
            width: 50%;
            font-size: 11px;
        }

        .tabla-autorizacion td {
            height: 100px;
            vertical-align: bottom;
            padding: 8px;
            border: 1px solid #888;
            width: 50%;
        }

        .firma-espacio {
            height: 50px;
            border-bottom: 1px solid black;
            margin: 0 auto 8px auto;
            width: 75%;
        }

        .nombre-firmante {
            font-weight: bold;
            margin: 0;
            font-size: 10px;
        }

        .cargo-firmante {
            margin: 0;
            margin-top: 3px;
            font-size: 9px;
        }

        /* Saltos de página */
        .page-break {
            page-break-after: always;
        }

        .avoid-break {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    <main>
        <!-- HEADER -->
        <div class="header">
            <div class="tabla-logos">
                <table>
                    <tr>
                        @php 
                            // Intentar múltiples rutas para compatibilidad con NativePHP
                            $possiblePaths = [
                                public_path('images/logo_oaxaca.png'),
                                base_path('public/images/logo_oaxaca.png'),
                                resource_path('images/logo_oaxaca.png'),
                            ];
                            
                            $logo1Data = null;
                            $logo1Mime = 'image/png';
                            
                            foreach ($possiblePaths as $path) {
                                if (file_exists($path) && is_readable($path)) {
                                    try {
                                        $logo1Data = base64_encode(file_get_contents($path));
                                        break;
                                    } catch (\Exception $e) {
                                        continue;
                                    }
                                }
                            }
                            
                            // Logo CORTV
                            $possiblePaths2 = [
                                public_path('images/logo_cortv.png'),
                                base_path('public/images/logo_cortv.png'),
                                resource_path('images/logo_cortv.png'),
                            ];
                            
                            $logo2Data = null;
                            $logo2Mime = 'image/png';
                            
                            foreach ($possiblePaths2 as $path) {
                                if (file_exists($path) && is_readable($path)) {
                                    try {
                                        $logo2Data = base64_encode(file_get_contents($path));
                                        break;
                                    } catch (\Exception $e) {
                                        continue;
                                    }
                                }
                            }
                        @endphp
                        <td>
                            @if($logo1Data)
                                <img src="data:{{ $logo1Mime }};base64,{{ $logo1Data }}" alt="Logo Oaxaca">
                            @endif
                        </td>
                        <td>
                            @if($logo2Data)
                                <img src="data:{{ $logo2Mime }};base64,{{ $logo2Data }}" alt="Logo CORTV">
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <div class="corporacion">
                <h1>CORPORACIÓN OAXAQUEÑA DE RADIO Y TELEVISIÓN</h1>
                <h2>DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES</h2>
            </div>
        </div>

        <!-- DATOS DEL DOCUMENTO -->
        <div class="solicitud">
            <div class="titulo-documento">
                SALIDA DE ALMACÉN
            </div>

            <div class="informacion-s">
                <table>
                    <tr>
                        <td>
                            <span class="label">Área que solicita:</span>
                            <span>{{ session('datos_registro.area') }}</span>
                        </td>
                        <td>
                            <span class="label">Nombre:</span>
                            <span>{{ session('datos_registro.nombre') }}</span>
                        </td>
                        <td>
                            <span class="label">Fecha:</span>
                            <span>{{ date('d/m/Y') }}</span>
                        </td>
                        <td>
                            <span class="label">Categoría:</span>
                            <span>{{ session('datos_registro.categoria') }}</span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- TABLA DE PRODUCTOS -->
        <div class="tabla-contenido">
            <table class="tabla-productos">
                <thead>
                    <tr>
                        <th style="width: 12%;">Cantidad</th>
                        <th style="width: 15%;">Unidad</th>
                        <th style="width: 73%;">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registros as $registro)
                        <tr>
                            <td>{{ $registro->cantidad_registro }}</td>
                            <td>{{ $registro->producto->unidad_producto ?? 'N/A' }}</td>
                            <td style="text-align: left; padding-left: 10px;">{{ $registro->producto->nombre_producto ?? 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No hay registros</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- SECCIÓN DE FIRMAS -->
        <div class="autorizacion avoid-break">
            <table class="tabla-autorizacion">
                <thead>
                    <tr>
                        <th>SOLICITÓ</th>
                        <th>AUTORIZÓ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="firma-espacio"></div>
                            <p class="nombre-firmante">{{ session('datos_registro.solicito') }}</p>
                        </td>
                        <td>
                            <div class="firma-espacio"></div>
                            <p class="nombre-firmante">{{ session('datos_registro.autoriza') }}</p>
                            <p class="cargo-firmante">DEPTO. DE RECURSOS MATERIALES Y SERVICIOS GENERALES</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="tabla-autorizacion">
                <thead>
                    <tr>
                        <th>ENTREGÓ</th>
                        <th>RECIBIÓ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="firma-espacio"></div>
                            <p class="nombre-firmante">{{ session('datos_registro.entrega') }}</p>
                            <p class="cargo-firmante">AUXILIAR DEL DEPTO. DE RECURSOS MATERIALES Y SERVICIOS GENERALES</p>
                        </td>
                        <td>
                            <div class="firma-espacio"></div>
                            <p class="nombre-firmante">{{ session('datos_registro.solicito') }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
