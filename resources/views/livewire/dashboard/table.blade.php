<div class="
        w-full flex flex-col shadow-2xl rounded-2xl bg-white
        xs:w-[87%] xs:self-center
        md:w-[81%] md:self-center
        lg:w-[43%] lg:bg-white 
        lg:content-center lg:pt-6">
    {{-- div de la tabla del dashboard --}}   
        <!-- encabezado-tabla -->
        <div class="
        text-[#AE2B2F] text-center font-times text-2xl font-bold leading-[120%] tracking-[-0.76px] mt-5 mb-5
        xs:text-[27px]
        md:text-3xl           
        lg:text-4xl
        " style="font-family: 'Times New Roman'">
                <span>Ultimos cambios en el inventario</span>
        </div>
        
        {{-- Ahora si, las filas de la tabla  --}}
        {{-- div tabla .cuerpo-tabla --}}
        <div class="
        w-full flex flex-col gap-4 px-5 mb-5
        xs:w-full xs:px-3 xs:mb-3
        md:w-full md:px-4 md:mb-4 
        lg:w-full lg:p-5">
            {{-- cards de la tabla, se mandan llamar desde el componente livewire solo se llaman 3, puede ampliarse desde el controlador --}}
            @livewire('dashboard.card-table', ['fechaSolicitud' => $this->registros[0]->fecha_registro, 'area' => $this->registros[0]->producto->clave->area->nombre_area, 'solicitador' => $this->registros[0]->Persona->nombre_persona, 'producto' => $this->registros[0]->producto->nombre_producto, 'cantidad' => ($this->registros[0]->Salida ? $this->registros[0]->Salida->cantidad_salida*-1 : $this->registros[0]->Entrada->cantidad_entrada)])
            @livewire('dashboard.card-table', ['fechaSolicitud' => $this->registros[1]->fecha_registro, 'area' => $this->registros[1]->producto->clave->area->nombre_area, 'solicitador' => $this->registros[1]->Persona->nombre_persona, 'producto' => $this->registros[1]->producto->nombre_producto, 'cantidad' => ($this->registros[1]->Salida ? $this->registros[1]->Salida->cantidad_salida*-1 : $this->registros[1]->Entrada->cantidad_entrada)])
            @livewire('dashboard.card-table', ['fechaSolicitud' => $this->registros[2]->fecha_registro, 'area' => $this->registros[2]->producto->clave->area->nombre_area, 'solicitador' => $this->registros[2]->Persona->nombre_persona, 'producto' => $this->registros[2]->producto->nombre_producto, 'cantidad' => ($this->registros[2]->Salida ? $this->registros[2]->Salida->cantidad_salida*-1 : $this->registros[2]->Entrada->cantidad_entrada)])
            
        </div>    


</div>
