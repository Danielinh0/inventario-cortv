import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            screens:{
                'xs': '469px',    // Tablet pequeña (469-768px)
                'sm': '640px',    // Mantén el estándar si lo necesitas
                'md': '769px',    // Tablet (769-1024px) - CAMBIADO de 768px
                'lg': '1025px',   // Desktop (1025px+) - CAMBIADO de 1024px
                'xl': '1280px',
                '2xl': '1536px',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'cortvRojoBasico': '#AE2B2F',
                'cortvRojoOscuro': '#8B2427',
                'cortvGrisTexto': '#3F403D',
                'cortvGrisClaro': '#757575',
                'cortvHueso': '#F3F3F3',
                'cortvBorde': '#D9D9D9',
            },
        },
    },
    darkMode:'false',
        
    plugins: [forms],
};
