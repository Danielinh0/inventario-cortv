<html>
    <head>
        <meta charset="utf-8">
        <title>Salidas del inventario</title>        
        @vite(['resources/css/app.css', 'resources/css/salidas.css', 'resources/js/app.js'])    
    </head>
<body>
    <main class="main">

        <div class="header">
            <div class="logo">
                <img src="logo_oaxaca.png" alt="primero">
                <img src="logo.png" alt="segundo">                   
            </div>

            <div class="corporacion">
                <span><h1>CORPORACION OAXAQUEÑA DE RADIO Y TELEVISION</h1></span>
                <span><h2>DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES</h2></span>
            </div>
        </div>

        <div class="solicitud">

            <div class="nombre-s">
                <span>SALIDA DE ALMACEN</span>
            </div>

            <div class="informacion-s">
                <div>
                    <span> <b>Area que solicita:</b> </span>
                    <span>Produccion</span>
                </div>
                
                <div>
                    <span><b>Nombre:</b></span>
                    <span>Daniel Eduardo Garcia Salvador</span>
                </div>

                <div>
                    <span><b>Fecha:</b></span>
                    <span>03 de junio de 2025</span>
                </div>

                <div>
                    <span><b>Categoria:</b></span>
                    <span>Productos de impresion</span>
                </div>

            </div>
        </div>

        <div class="tabla">

            <table class="tabla-v">

                <thead>
                    <tr>
                        <td >Cantidad</td>
                        <td >Unidad</td>
                        <td rowspan="5">Descripcion</td>
                    </tr>
                </thead>

                <tbody >
                    <tr>
                        <td>10</td>
                        <td>Hojas</td>
                        <td>Hojas tamaño carta para impresora</td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td>Cartuchos</td>
                        <td>Cartuchos de tinta negra para impresora HP</td>
                    </tr>
                    
                    <tr>
                        <td>2</td>
                        <td>Resmas</td>
                        <td>Resmas de papel tamaño carta para impresora</td>
                    </tr>
                    
                    <tr>
                        <td>3</td>
                        <td>Libretas</td>
                        <td>Libretas tamaño oficio para notas</td>
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
                            <div class="firma-espacio"></div>
                            <p>0</p>
                        </td>
                        <td>
                            <div class="firma-espacio"></div>
                            <p>ARQ. MARIANA ZARATE MORLAN</p>
                            <p>DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES</p>
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
                            <p>ING. ALINA VENTURA HERNANDEZ</p>
                            <p>AUXILIAR DEL DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES</p>
                        </td>
                        <td>
                            <div class="firma-espacio"></div>
                            <p>0</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>