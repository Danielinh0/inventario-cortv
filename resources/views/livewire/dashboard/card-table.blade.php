{{-- filas de la tablas del dashboard  --}}
{{-- div del card, consultar el figma para mas dudas --}}
<div class="
    w-full mb-9 items-center box-border flex flex-row {{ $estilos }}
    xs:mb-10
    ">

    <!-- icono -->
    <div
        class="
        flex justify-center w-[20%] items-center
        xs:w-[25%]
        md:    
        lg:w-[22%] ">
        <svg class="
        h-[29px] w-[29px]
        xs:w-[33px] xs:h-[33px]
        md:w-[36px] md:h-[36px]
        lg:w-[38px] lg:h-[50px]"
            xmlns="http://www.w3.org/2000/svg" width="30" height="25" viewBox="0 0 30 25" fill="none">
            <path d="{{$mostrar_Nuevo_Producto === false ? $this->selectIcon($registro->producto->clave->area->nombre_area) : $this->selectIcon($producto->clave->area->nombre_area)  }}" stroke="#000000"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>
    <!-- info de la tabla -->
    <div
        class="
    w-[60%] flex flex-col text-center gap-1
    xs:w-1/2 xs:gap-2 xs:justify-center
    lg:w-[70%] lg:gap-[5px]  lg:items-start">
        <!-- nombre del producto -->



        <!-- descripcion del cambio -->
        <!-- solicitado por -->
        {{-- condicional para saber si es una entrada o salida --}}
        @if ($mostrar_Nuevo_Producto)
            <div class="
text-cortvGrisTexto font-times text-[20px] font-semibold leading-[120%] tracking-[-0.36px] 
overflow-hidden line-clamp-2
xs:text-[22px]
md:text-[23px]"
                style="font-family: 'Times New Roman'; display: -webkit-box; -webkit-box-orient: vertical;">
                {{ $producto->nombre_producto }}
            </div>
            <!-- area -->
            <div class="
        text-cortvGrisTexto font-times text-[14px] leading-[120%] tracking-[-0.36px]
        xs:text-[15px]
        md:text-[17px]"
                style="font-family: 'Times New Roman'">
                <span>Area:</span>
                <span>{{ $producto->clave->area->descripcion_area }}</span>
            </div>

            <div class="
        text-cortvGrisTexto font-times text-[14px] leading-[120%] tracking-[-0.36px]
        xs:text-[15px]
        md:text-[17px]"
                style="font-family: 'Times New Roman'">
                <span>Tipo de unidad:</span>
                <span>{{ $producto->unidad_producto }}</span>
            </div>

            <!-- fecha de creacion del producto -->
            <div class="
        text-cortvGrisTexto font-times text-[14px] leading-[120%] tracking-[-0.36px]
        xs:text-[15px]
        md:text-[17px]"
                style="font-family: 'Times New Roman'">
                <span>Fecha de creacion:</span>
                <span>{{ date('d \d\e F \d\e Y', strtotime($producto->created_at)) }}</span>
            </div>
        @else
            <!-- nombre del producto -->
            <div class="
text-cortvGrisTexto font-times text-[20px] font-semibold leading-[120%] tracking-[-0.36px] 
overflow-hidden line-clamp-2
xs:text-[22px]
md:text-[23px]"
                style="font-family: 'Times New Roman'; display: -webkit-box; -webkit-box-orient: vertical;">
                {{ $registro->producto->nombre_producto }}
            </div>

            <div class="
        text-cortvGrisTexto font-times text-[14px] leading-[120%] tracking-[-0.36px]
        xs:text-[15px]
        md:text-[17px]"
                style="font-family: 'Times New Roman'">
                <span>Autorizó:</span>
                <span>{{ $registro->persona->nombre_persona }}</span>
            </div>

            <!-- area -->
            <div class="
        text-cortvGrisTexto font-times text-[14px] leading-[120%] tracking-[-0.36px]
        xs:text-[15px]
        md:text-[17px]"
                style="font-family: 'Times New Roman'">
                <span>Area:</span>
                <span>{{ $registro->producto->clave->area->descripcion_area }}</span>
            </div>

            <!-- fecha de solicitud -->
            <div class="
        text-cortvGrisTexto font-times text-[14px] leading-[120%] tracking-[-0.36px]
        xs:text-[15px]
        md:text-[17px]"
                style="font-family: 'Times New Roman'">
                <span>Fecha de solicitud:</span>
                <span>{{ date('d \d\e F \d\e Y', strtotime($registro->fecha_registro)) }}</span>
            </div>
            <!-- fin de la informacion del card -->
        @endif
    </div>

    <!-- cantidad en inventario o botón editar -->
    <div class="
    w-[30%] flex justify-center items-center
    md:w-1/4">
        @if ($mostrarBotonEditar)
            <!-- botón editar -->
            <button
                class="
                inline-flex items-center gap-2
                bg-cortvRojoOscuro hover:bg-cortvRojoBasico text-white font-times font-normal
                px-6 py-2 rounded-lg
                transition-colors duration-200
                text-[14px]
                xs:text-[15px]
                md:text-[16px]
                lg:px-8 lg:py-2.5"
                style="font-family: 'Times New Roman'">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                </svg>
                Editar
            </button>
        @else
            <!-- cantidad con flecha -->
            <div class="flex flex-col-reverse justify-start items-center gap-[5px] xs:flex-row xs:justify-center">
                <!-- flecha -->
                <div class="flex justify-center items-center">
                    <svg class="
                    w-[32px] h-[32px]
                    md:w-[40px] md:h-[40px]"
                        xmlns="http://www.w3.org/2000/svg" width="30" height="32" viewBox="0 0 30 32"
                        fill="none">
                        <g filter="url(#filter0_d_113_112)">
                            <path
                                d=" {{ $registro->tipo_registro == 1 ? 'M21.25 13.75L15 7.5L8.75 13.75M21.25 22.5L15 16.25L8.75 22.5' : 'M8.75 16.25L15 22.5L21.25 16.25M8.75 7.5L15 13.75L21.25 7.5' }}"
                                stroke="{{ $registro->tipo_registro == 1 ? '#5EA836' : '#EE4949' }}" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <filter id="filter0_d_113_112" x="-4" y="0" width="38" height="38"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dy="4" />
                                <feGaussianBlur stdDeviation="2" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_113_112" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_113_112"
                                    result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </div>

                <!-- cantidad -->
                <div class="
                {{ $registro->tipo_registro == 1 ? 'text-cortvVerdeClaro' : 'text-cortvRojoBasico' }} font-times text-[22px] font-bold leading-[120%] tracking-[-0.36px]
                xs:text-[24px]"
                    style="font-family: 'Times New Roman'">
                    <span>{{ $registro->cantidad_registro }}</span>
                    <span>pz</span>
                </div>
            </div>
        @endif
    </div>

</div>
