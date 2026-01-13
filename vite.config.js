import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                    'resources/css/login.css',
                    'resources/css/header-dashboard.css',
                    'resources/css/carrusel.css',
                    'resources/css/register.css',
                    'resources/css/reportePDF.css',
                    'resources/css/salidas.css',
                    'resources/js/app.js',
                    'resources/js/carrusel.js'
                ],
            refresh: true,
        }),
    ],
});
