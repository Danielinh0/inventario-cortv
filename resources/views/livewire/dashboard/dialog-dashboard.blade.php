{{-- cards dashboard, layout por cada una --}}
<div class="bg-cortvRojoBasico flex flex-col shadow-lg rounded-[10px] h-[220px] items-center justify-center
              w-[70%] p-[15px] self-center gap-[5px] 
              xs:w-[32%] xs:p-5
              md:gap-3">
    
    <div>
        <div class="svg">
            @if($tipo === 'demanda')
                {{-- SVG de demanda (flecha arriba) --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                    <path d="M4.5 36L18 22.5L26.612 31.112C29.1018 26.2043 33.209 22.3062 38.24 20.076L43.72 17.636M43.72 17.636L31.84 13.074M43.72 17.636L39.16 29.516"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            @else
                {{-- SVG de menos demandado (alerta) --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                    <path d="M24 16V24M24 32H24.02M44 24C44 35.0457 35.0457 44 24 44C12.9543 44 4 35.0457 4 24C4 12.9543 12.9543 4 24 4C35.0457 4 44 12.9543 44 24Z"
                        stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            @endif
        </div>
    </div>

    <div class="flex flex-col items-center gap-[5px]">
        <h1 class="text-white text-center text-[24px] font-bold leading-[120%] tracking-[-0.76px]"
            style="font-family: 'Times New Roman'">
            {{ $producto }}
        </h1>
        <h2 class="text-white text-center text-[20px] font-semibold leading-[120%] tracking-[-0.5px]"
            style="font-family: 'Times New Roman'">
            {{ $tipo === 'demanda' ? 'Producto en demanda' : 'Mas stock en existencia' }}
        </h2>
        <hr class="w-[101%] border-white">
        
        <div class="flex flex-row justify-center gap-[5px] text-white text-center text-[18px] font-normal leading-[120%] tracking-[-0.36px]"
            style="font-family: 'Times New Roman'">
            <span>{{ $cantidad }}</span>
            <span>{{ $unidad }}</span>
            <span>restantes</span>
        </div>
    </div>
</div>