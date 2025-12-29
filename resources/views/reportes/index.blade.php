<x-app-layout>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!--Botonera-->
                <div class="p-4 flex gap-2 mb-6 justify-center">
                    <a href="{{ route('reportes') }}" class="px-4 py-2 {{ request()->routeIs('reportes') ? 'bg-red-700 text-white rounded-lg font-semibold hover:bg-red-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg' }}">Reportes</a>
                </div>
            <!--Tablas-->
                @livewire('tabla.reporte')
            {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"></div> --}}

        </div>
    </div>
</x-app-layout>