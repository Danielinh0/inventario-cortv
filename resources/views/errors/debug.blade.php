<x-app-layout>
    <title>Error - Debug</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .error-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .error-header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        .error-header p {
            font-size: 1.2em;
            opacity: 0.9;
        }
        .error-section {
            background: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .error-section h2 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 1.5em;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
        }
        .error-message {
            background: #fee;
            border-left: 4px solid #f44;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .error-message strong {
            color: #c33;
            display: block;
            margin-bottom: 5px;
        }
        .file-location {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            margin-bottom: 20px;
            border-left: 4px solid #17a2b8;
        }
        .file-location strong {
            color: #17a2b8;
            display: block;
            margin-bottom: 5px;
        }
        .trace-container {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 20px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            line-height: 1.8;
        }
        .trace-container pre {
            margin: 0;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .badge {
            display: inline-block;
            padding: 5px 10px;
            background: #667eea;
            color: white;
            border-radius: 5px;
            font-size: 0.85em;
            font-weight: bold;
        }
        .exception-class {
            color: #ffd700;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-header">
            <h1>🐛 Modo Debug</h1>
            <p>Información detallada del error</p>
        </div>

        <div class="error-section">
            <h2>Tipo de Excepción</h2>
            <p><span class="badge">{{ class_basename($exception) }}</span></p>
            <p style="margin-top: 10px; font-family: monospace; color: #666;">{{ get_class($exception) }}</p>
        </div>

        <div class="error-section">
            <h2>Mensaje de Error</h2>
            <div class="error-message">
                <strong>Error:</strong>
                {{ $message ?: 'Sin mensaje de error' }}
            </div>
        </div>

        <div class="error-section">
            <h2>Ubicación del Error</h2>
            <div class="file-location">
                <strong>Archivo:</strong>
                {{ $file }}
                <br><br>
                <strong>Línea:</strong>
                {{ $line }}
            </div>
        </div>

        <div class="error-section">
            <h2>Stack Trace</h2>
            <div class="trace-container">
                <pre>{{ $trace }}</pre>
            </div>
        </div>

        @if(isset($exception) && method_exists($exception, 'getStatusCode'))
        <div class="error-section">
            <h2>Código de Estado HTTP</h2>
            <p><span class="badge">{{ $exception->getStatusCode() }}</span></p>
        </div>
        @endif

        <div class="error-section" style="background: #fffbf0; border-left: 4px solid #ffb700;">
            <h2>⚠️ Aviso</h2>
            <p style="color: #856404;">
                Esta página solo es visible cuando <code style="background: #fff3cd; padding: 2px 6px; border-radius: 3px;">APP_DEBUG=true</code>. 
                En producción, asegúrate de tener <code style="background: #fff3cd; padding: 2px 6px; border-radius: 3px;">APP_DEBUG=false</code> 
                en tu archivo <code style="background: #fff3cd; padding: 2px 6px; border-radius: 3px;">.env</code>.
            </p>
        </div>
    </div>
</body>
</x-app-layout>
