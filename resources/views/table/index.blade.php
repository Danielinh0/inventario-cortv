<x-app-layout>
    <div class="h-2 w-full flex justify-center border-b border-gray-100">
        <div class="w-full h-4 bg-repeat-x" style="background-image: url('https://www.oaxaca.gob.mx/cortv/wp-content/themes/temadeps2023/assets/images/greca.png'); background-size: auto 100%;"></div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!--Botonera-->
                <div class="p-4 flex gap-2 mb-6 justify-center">
                    {{-- <a href="{{ route('tabla.existencias') }}" class="px-4 py-2 {{ (request()->routeIs('tabla.existencias') or request()->routeIs('tabla.index') )? 'bg-red-700 text-white rounded-lg font-semibold hover:bg-red-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg' }}">Existencias</a> --}}
                    <a href="{{ route('tabla.productos') }}" class="px-4 py-2 {{ (request()->routeIs('tabla.productos')  or request()->routeIs('tabla.index') )? 'bg-red-700 text-white rounded-lg font-semibold hover:bg-red-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg' }}">Productos</a>
                    <a href="{{ route('tabla.areas') }}" class="px-4 py-2 {{ request()->routeIs('tabla.areas') ? 'bg-red-700 text-white rounded-lg font-semibold hover:bg-red-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg' }}">Areas</a>
                    <a href="{{ route('tabla.entradas') }}" class="px-4 py-2 {{ request()->routeIs('tabla.entradas') ? 'bg-red-700 text-white rounded-lg font-semibold hover:bg-red-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg' }}">Entradas</a>
                    <a href="{{ route('tabla.salidas') }}" class="px-4 py-2 {{ request()->routeIs('tabla.salidas') ? 'bg-red-700 text-white rounded-lg font-semibold hover:bg-red-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg' }}">Salidas</a>
                </div>
            <!--Tablas-->
            @switch(request()->route()->getName())
                {{-- @case('tabla.existencias')
                @livewire('existencias-tabla')    
                @break --}}
                @case('tabla.index')
                @case('tabla.productos')
                    @livewire('tabla.productos')
                    @break
                @case('tabla.areas')
                    @livewire('tabla.areas')
                    @break
                @case('tabla.entradas')
                    @livewire('tabla.entradas')
                    @break
                @case('tabla.salidas')
                    @livewire('tabla.salidas')
                    @break
            @endswitch
            {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"></div> --}}

        </div>
    </div>
</x-app-layout>