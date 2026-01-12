<x-app-layout>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!--Tablas-->
            <livewire:tabla.reporte :fechaInicio="date('Y-m-d')" :fechaFin="date('Y-m-d')" lazy />
            {{-- @persist('reporte-table')
            @endpersist --}}
                {{-- @livewire('tabla.reporte', ['showPdfButton' => true]) --}}

        </div>
    </div>
</x-app-layout>