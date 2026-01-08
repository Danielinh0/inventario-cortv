{{-- filas de la tablas del dashboard  --}}
{{-- div del card, consultar el figma para mas dudas --}}
<div class="
    w-full mb-9 items-center box-border flex flex-row {{ $estilos }}
    xs:mb-10
    ">

    <!-- icono -->
    <div class="
        flex justify-center w-[20%] items-center
        xs:w-[25%]
        md:    
        lg:w-[22%] ">
        <svg class="
        h-[29px] w-[29px]
        xs:w-[33px] xs:h-[33px]
        md:w-[36px] md:h-[36px]
        lg:w-[38px] lg:h-[38px]" xmlns="http://www.w3.org/2000/svg" width="30" height="25" viewBox="0 0 30 25"
            fill="none">
            <path d="M26 7.25V23.5H3.5V7.25M12.25 12.25H17.25M1 1H28.5V7.25H1V1Z" stroke="#3F403D" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>
    <!-- info de la tabla -->
    <div class="
    w-[60%] flex flex-col text-center gap-1
    xs:w-1/2 xs:gap-2 xs:justify-center
    lg:w-[70%] lg:gap-[5px]  lg:items-start">
        <!-- nombre del producto -->
        <div class="
        text-cortvGrisTexto font-times text-[21px] font-semibold leading-[120%] tracking-[-0.36px]
        xs:text-[23px]
        md:text-[24px]"        
        style="font-family: 'Times New Roman'">
            <span>Tonner para impresoras</span>
        </div>
        <!-- descripcion del cambio -->
        <!-- solicitado por -->
        <div class="
        text-cortvGrisTexto font-times text-[14px] leading-[120%] tracking-[-0.36px]
        xs:text-[15px]
        md:text-[17px]"
            style="font-family: 'Times New Roman'">
            <span>Solicitador:</span>
            <span>Daniel Garcia Salvador</span>
        </div>

        <!-- area -->
        <div class="
        text-cortvGrisTexto font-times text-[14px] leading-[120%] tracking-[-0.36px]
        xs:text-[15px]
        md:text-[17px]"
            style="font-family: 'Times New Roman'">
            <span>Area:</span>
            <span>Recursos Humanos</span>
        </div>

        <!-- fecha de solicitud -->
        <div class="
        text-cortvGrisTexto font-times text-[14px] leading-[120%] tracking-[-0.36px]
        xs:text-[15px]
        md:text-[17px]"
            style="font-family: 'Times New Roman'">
            <span>Fecha de solicitud:</span>
            <span>17 de diciembre de 2025</span>
        </div>
        <!-- fin de la informacion del card -->
    </div>

    <!-- cantidad en inventario o botón editar -->
    <div class="
    w-[30%] flex justify-center items-center
    md:w-1/4">
        @if($mostrarBotonEditar)
            <!-- botón editar -->
            <button class="
                bg-[#A91D1E] hover:bg-[#8A1819] text-white font-times font-normal
                px-6 py-2 rounded-lg
                transition-colors duration-200
                text-[14px]
                xs:text-[15px]
                md:text-[16px]
                lg:px-8 lg:py-2.5"
                style="font-family: 'Times New Roman'">
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
                    xmlns="http://www.w3.org/2000/svg" width="30" height="32"
                        viewBox="0 0 30 32" fill="none">
                        <g filter="url(#filter0_d_113_112)">
                            <path d="M8.75 16.25L15 22.5L21.25 16.25M8.75 7.5L15 13.75L21.25 7.5" stroke="#EE4949"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_113_112" result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </div>

                <!-- cantidad -->
                <div class="
                text-[#EE4949] font-times text-[22px] font-bold leading-[120%] tracking-[-0.36px]
                xs:text-[24px]"
                    style="font-family: 'Times New Roman'">
                    <span>30</span>
                    <span>pz</span>
                </div>
            </div>
        @endif
    </div>

</div>
