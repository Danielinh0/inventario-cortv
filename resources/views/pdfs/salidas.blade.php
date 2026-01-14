<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Salidas del inventario</title>
    <style>
        @page {
            margin: 0.7cm 0.7cm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            margin: 0;
            padding: 1cm 1.5cm;
        }

        * {
            box-sizing: border-box;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        /* Logos layout using table for PDF safety */
        .tabla-logos {

             height: 100px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            gap: 20px;
            margin-bottom: 10px;

            img {
                width: 320px;
                height: auto;
            }

        }

        .corporacion {
            text-align: center;
            margin-bottom: 20px;
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

        .titulo-documento {
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 20px;
            padding: 5px;
        }

        /* Information Grid using Table */
        .info-tabla {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .info-tabla td {
            vertical-align: top;
            padding: 5px;
            width: 25%;
        }

        .info-label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        /* Products Table */
        .tabla-productos {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            margin-bottom: 30px;
        }

        .tabla-productos thead th {
            background-color: #AE2B2F;
            color: white;
            padding: 8px;
            border: 1px solid #000;
            font-weight: bold;
        }

        .tabla-productos tbody td {
            padding: 8px;
            border: 1px solid #000;
            text-align: center;
            vertical-align: middle;
        }

        tr {
            page-break-inside: avoid;
        }

        /* Authorization */
        .tabla-autorizacion {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            margin-bottom: 20px;
            page-break-inside: avoid;
        }

        .tabla-autorizacion th {
            background-color: #AE2B2F;
            color: white;
            font-weight: bold;
            padding: 8px;
            border: 1px solid #000;
            width: 50%;
        }

        .tabla-autorizacion td {
            height: 100px;
            vertical-align: bottom;
            padding: 8px;
            border: 1px solid #000;
        }

        .firma-espacio {
            display: block;
            height: 60px;
            margin-bottom: 5px;
        }

        .nombre-firmante {
            font-weight: bold;
            margin: 0;
            font-size: 11px;
        }

        .cargo-firmante {
            margin: 0;
            font-size: 10px;
        }

    .solicitud{
    width: 100%;
    margin-top: 25px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    align-items: center;
    
}

.nombre-s{
    font-size: 22px;
    font-weight: bold;
}

.informacion-s{    
    padding: 0 15px;
    display: flex;
    flex-direction:row;
    width: 100%;
    justify-content: center;
    margin-top: 15px;    
    margin-bottom: 25px; 
    gap: 30px;
    div{
        display: flex;
        flex-direction: column;
        gap: 10px;
        font-size: 18px;
    }
}

    </style>
</head>

<body>
    <main>

        <div class="header">
            <div class="tabla-logos">
                <div>
                    @php $logo1 = public_path('images/logo_oaxaca.png'); @endphp
                    @inlinedImage($logo1)

                </div>

                <div>
                    @php $logo2 = public_path('images/logo_cortv.png'); @endphp
                    @inlinedImage($logo2)
                </div>

            </div>

            <div class="corporacion">
                <h1>CORPORACION OAXAQUEÑA DE RADIO Y TELEVISION</h1>
                <h2>DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES</h2>
            </div>
        </div>

        <div class="solicitud">
            <div class="titulo-documento">
                SALIDA DE ALMACEN
            </div>

            <div class="informacion-s">
                <div>
                    <span> <b>Area que solicita:</b> </span>
                    <span>{{ session('datos_registro.area') }}</span>
                </div>

                <div>
                    <span><b>Nombre:</b></span>
                    <span style="overflow-wrap: break-word;">{{ session('datos_registro.nombre') }}</span>
                </div>

                <div>
                    <span><b>Fecha:</b></span>
                    <span>{{ date('d/m/Y') }}</span>
                </div>

                <div>
                    <span><b>Categoria:</b></span>
                    <span>{{ session('datos_registro.categoria') }}</span>
                </div>

            </div>
        </div>

        <div class="tabla-contenido">
            <table class="tabla-productos">
                <thead>
                    <tr>
                        <th style="width: 15%;">Cantidad</th>
                        <th style="width: 15%;">Unidad</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registros as $registro)
                        <tr>
                            <td>{{ $registro->cantidad_registro }}</td>
                            <td>{{ $registro->producto->unidad_producto ?? 'N/A' }}</td>
                            <td>{{ $registro->producto->nombre_producto ?? 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No hay registros</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="autorizacion">
            <table class="tabla-autorizacion">
                <thead>
                    <tr>
                        <th>SOLICITO</th>
                        <th>AUTORIZO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="firma-espacio"> </div>
                            <p class="nombre-firmante">
                                ___________________________________________________ <br> <br>
                                O</p>
                        </td>
                        <td>
                            <div class="firma-espacio"></div>
                            <p class="nombre-firmante">{{ session('datos_registro.autoriza') }}</p>
                            <p class="cargo-firmante">DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div style="height: 10px;"></div>

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
                            <p class="cargo-firmante">AUXILIAR DEL DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS
                                GENERALES</p>
                        </td>
                        <td>
                            <div class="firma-espacio"></div>
                            <p class="nombre-firmante ">
                                ___________________________________________________ <br> <br> O
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
