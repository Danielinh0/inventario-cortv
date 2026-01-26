<x-app-layout>
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden text-center p-6">
            <h1 class="text-3xl font-bold text-center text-red-600 dark:text-red-400">500 - Error Interno del Servidor</h1>
            <p class="text-lg font-semibold mt-4 text-gray-700 dark:text-gray-300">
                ¡Ups! Algo salió mal en nuestro servidor. No te preocupes, no es tu culpa.
            </p>
            <p class="text-md text-gray-500 dark:text-gray-400 mt-2">
                Elabora el reporte de error correspondiente, como se menciona en el manual de usuario. Por favor, intenta de nuevo más tarde.
            </p>
            <img src="https://media.tenor.com/lx2WSGRk8bcAAAAM/pulp-fiction-john-travolta.gif" alt="Error 500" class="mx-auto mt-6 rounded-lg max-w-xs">
            
            <div class="mt-6">
                <a href="{{ route('dashboard') }}" 
                   class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Volver al Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
