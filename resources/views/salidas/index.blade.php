<x-app-layout>
    <div class="h-2 w-full flex justify-center border-b border-gray-100">
        <div class="w-full h-4 bg-repeat-x" style="background-image: url('https://www.oaxaca.gob.mx/cortv/wp-content/themes/temadeps2023/assets/images/greca.png'); background-size: auto 100%;"></div>
    </div>

    <section class="contenido">
        {{-- Layout principal con 2 columnas (igual que dashboard) --}}
        <div class="mt-[30px] flex-col px-[10px] py-0 gap-[30px] 
        md:mt-10 md:px-[30px] md:gap-10
        lg:mt-1 box-border w-full flex lg:flex-row lg:justify-around lg:gap-8 lg:p-8">
            
            {{-- COLUMNA IZQUIERDA: Formulario --}}
            {{-- <livewire:formulario.entrada-salida 
            titulo_f="Registra una Nueva Salida" 
            p_entrada_salida="Producto que sale del inventario" 
            cantidad_entrada_salida="Cantidad de productos que salen del inventario"
            /> --}}

           <livewire:salidas.tabla /> 
            
            {{-- COLUMNA DERECHA: Tabla --}}
            {{-- <livewire:dashboard.table 
            titulo="Últimas salidas del inventario" 
            estilos="" 
            cardEstilos="shadow-2xl rounded-2xl bg-white h-[150px]"
            :mostrarBotonEditar="true"/> --}}

        </div>
    </section>

</x-app-layout>