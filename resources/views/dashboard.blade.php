@section('styles')
    @vite(['resources/css/app.css', 'resources/css/carrusel.css', 'resources/js/carrusel.js', 'resources/js/app.js'])
@endsection

<x-app-layout>
    <div class="h-2 w-full flex justify-center border-b border-gray-100">
        <div class="w-full h-4 bg-repeat-x" style="background-image: url('https://www.oaxaca.gob.mx/cortv/wp-content/themes/temadeps2023/assets/images/greca.png'); background-size: auto 100%;"></div>
    </div>
    @include('partials.header-dashboard')
    {{-- parte semantica, pero corresponde al contenido principal de la pagina --}}
    <section class= "contenido">
        {{-- div que contiene el layout del main del dashboard, tabla, carrsuel y cards de demandas    --}}
        <div class="mt-[30px] flex-col px-[10px] py-0 gap-[30px] 
        md:mt-10 md:px-[30px] md:gap-10
        lg:mt-1 box-border w-full flex lg:flex-row lg:justify-around lg:gap-8 lg:p-8
        ">
            {{-- tabla de los ultimos cambios en el inventario, parte izquierda --}}
            <livewire:dashboard.table cardEstilos=""
            :tipo="0"/>

            {{-- parte derecha del dashboard, carrsuel y cards --}}
            {{-- div con el laayout de la seccion derecha--}}
            <livewire:dashboard.panel-derecho />

    </section>

</x-app-layout>


