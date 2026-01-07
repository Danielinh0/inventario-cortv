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
            <div class="w-full flex flex-col shadow-2xl rounded-2xl bg-white
                xs:w-[87%] xs:self-center
                md:w-[81%] md:self-center
                lg:w-[43%]
                lg:content-center lg:pt-6 p-6">
                
                {{-- Título del formulario --}}
                <div class="text-[#AE2B2F] text-center font-times text-2xl font-bold leading-[120%] tracking-[-0.76px] mt-5 mb-5
                xs:text-[27px]
                md:text-3xl           
                lg:text-4xl" style="font-family: 'Times New Roman'">
                    <span>Registrar Nuevo Producto</span>
                </div>

                {{-- Aquí irá tu formulario --}}
                <form class="flex flex-col gap-4 px-5">
                    {{-- Campos del formulario --}}
                    <div>
                        <label class="block text-sm font-medium mb-2">Nombre del producto</label>
                        <input type="text" class="w-full border rounded px-3 py-2" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Descripción</label>
                        <textarea class="w-full border rounded px-3 py-2" rows="4"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Área</label>
                        <select class="w-full border rounded px-3 py-2">
                            <option>¿A qué área pertenece el producto?</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-[#6B2E33] text-white py-2 px-4 rounded mt-4">
                        Aceptar
                    </button>
                </form>
            </div>
            
            {{-- COLUMNA DERECHA: Tabla --}}
            <livewire:dashboard.table 
            titulo="Últimos productos añadidos" 
            estilos="" 
            cardEstilos="shadow-2xl rounded-2xl bg-white h-[150px]"/>

        </div>
    </section>

</x-app-layout>