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
            <livewire:dashboard.table cardEstilos=""/>

            {{-- parte derecha del dashboard, carrsuel y cards --}}
            {{-- div con el laayout de la seccion derecha--}}
            <div class=
            "w-[100%] flex flex-col
            lg:w-[48%]">
                
                {{-- div del layout de los cards de demanda y menos demandado --}}
                <div class="flex gap-5 p-3 flex-col box-border
                xs:flex-row xs:gap-9 xs:mb-2.5 xs:p-[15px]  xs:justify-evenly
                md:gap-9 md:p-[15px] ">
                    <livewire:dashboard.dialog-dashboard tipo="demanda" />
                    <livewire:dashboard.dialog-dashboard tipo="menos" />
                </div>

                {{-- div del layout del carrsuel  --}}
                 <!-- carrusel  ayuda dios soy yo de nuevo-->
                 <!-- swiper -->
                <div class="mt-8 w-64 text-left text-red-700 text-2xl font-bold font-['Times_New_Roman']
                    leading-[120%] tracking-[-0.76px] mb-5 self-center" >
                    Productos con bajo stock
                </div>

                <div class="w-full flex justify-center items-center swiper">
                    <livewire:dashboard.swiper-layout />
                </div>

            </div>    


        </div>

    </section>

</x-app-layout>


