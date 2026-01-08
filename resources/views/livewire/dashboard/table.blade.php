<div class="
        w-full flex flex-col {{ $estilos }} 
        xs:w-[87%] xs:self-center
        md:w-[81%] md:self-center
        lg:w-[43%]
        lg:content-center lg:pt-6">
    {{-- div de la tabla del dashboard --}}   
        <!-- encabezado-tabla -->
        <div class="
        text-cortvRojoBasico text-center font-times text-2xl font-bold leading-[120%] tracking-[-0.76px] mt-5 mb-5
        xs:text-[27px]
        md:text-3xl           
        lg:text-4xl
        " style="font-family: 'Times New Roman'">
                <span>{{ $titulo }}</span>
        </div>
        
        {{-- Ahora si, las filas de la tabla  --}}
        {{-- div tabla .cuerpo-tabla --}}
        <div class="
        w-full flex flex-col gap-4 px-5 mb-5
        xs:w-full xs:px-3 xs:mb-3
        md:w-full md:px-4 md:mb-4 
        lg:w-full lg:p-5">
            {{-- cards de la tabla, se mandan llamar desde el componente livewire solo se llaman 3, puede ampliarse --}}
            <livewire:dashboard.card-table :estilos="$cardEstilos" :mostrarBotonEditar="$mostrarBotonEditar" />
            <livewire:dashboard.card-table :estilos="$cardEstilos" :mostrarBotonEditar="$mostrarBotonEditar" />
            <livewire:dashboard.card-table :estilos="$cardEstilos" :mostrarBotonEditar="$mostrarBotonEditar" />

        </div>    


</div>
