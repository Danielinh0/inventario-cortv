<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Consultar Tablas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!--Botonera-->
                <div class="p-4 flex gap-2 mb-6">
                    <a href="{{ route('tabla.existencias') }}" class="px-4 py-2 {{ request()->routeIs('tabla.existencias') ? 'bg-red-700 text-white rounded-lg font-semibold hover:bg-red-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg' }}">Existencias</a>
                    <a href="{{ route('tabla.productos') }}" class="px-4 py-2 {{ request()->routeIs('tabla.productos') ? 'bg-red-700 text-white rounded-lg font-semibold hover:bg-red-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg' }}">Productos</a>
                    <a href="{{ route('tabla.areas') }}" class="px-4 py-2 {{ request()->routeIs('tabla.areas') ? 'bg-red-700 text-white rounded-lg font-semibold hover:bg-red-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg' }}">Areas</a>
                    <a href="{{ route('tabla.entradas') }}" class="px-4 py-2 {{ request()->routeIs('tabla.entradas') ? 'bg-red-700 text-white rounded-lg font-semibold hover:bg-red-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg' }}">Entradas</a>
                    <a href="{{ route('tabla.salidas') }}" class="px-4 py-2 {{ request()->routeIs('tabla.salidas') ? 'bg-red-700 text-white rounded-lg font-semibold hover:bg-red-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg' }}">Salidas</a>
                
                </div>
            <!--Tablas-->
                
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    
                    @include('table.partials.searchbar')
                    
                    @if(request()->routeIs('tabla.existencias'))
                        @include('table.partials.existencias')
                    @elseif(request()->routeIs('tabla.areas'))
                        @include('table.partials.areas')
                    @elseif(request()->routeIs('tabla.productos'))
                        @include('table.partials.productos')
                    @elseif(request()->routeIs('tabla.entradas'))
                        @include('table.partials.entradas')
                    @elseif(request()->routeIs('tabla.salidas'))
                        @include('table.partials.salidas')
                    @endif
                </div>

        </div>
    </div>
</x-app-layout>