<div class="w-full flex flex-col shadow-2xl rounded-2xl bg-white p-8
                xs:w-[87%] xs:self-center
                md:w-[81%] md:self-center
                lg:w-[30%]
                lg:content-center">

    <!-- contenedor con el titulo del formulario -->
    <div class="flex justify-center mb-6">
        <span class="text-[#AE2B2F] text-5xl text-center font-bold tracking-[-0.96px]" style="font-family: 'Times New Roman', Times, serif;">
            Formato de Salida
        </span>
    </div>

    <!-- formulario -->
    <div>
        <form wire:submit="save" class="flex flex-col px-4 gap-5 w-full text-black text-xl"
            style="font-family: 'Times New Roman', Times, serif;">
            <!-- area -->
            <div>
                <label for="area" class="flex flex-col gap-1">
                    <span>Área</span>
                    <span class="text-semibold text-base text-[#757575]">
                        ¿Qué área lo solicita?
                    </span>
                </label>
                <input type="text" id="area" name="area" wire:model.blur="area"
                    class="border-[#D9D9D9] border-1 rounded-md p-2 h-[30px] w-full mt-1">
                
                @error('area')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <!-- nombre -->
            <div>
                <label for="nombre" class="flex flex-col gap-1">
                    <span>Nombre</span>
                    <span class="text-semibold text-base text-[#757575]">
                        ¿Quién lo solicita?
                    </span>
                </label>
                <input type="text" id="nombre" name="nombre" wire:model.blur="nombre"
                    class="border-[#D9D9D9] border-1 rounded-md p-2 h-[30px] w-full mt-1">
                
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- categoria -->
            <div>
                <label for="categoria" class="flex flex-col gap-1">
                    <span>Categoria</span>
                    <span class="text-semibold text-base text-[#757575]">
                        ¿A qué categoria pertenece el producto?
                    </span>
                </label>
                <select id="categoria" name="categoria" wire:model="categoria"
                    class="border-[#D9D9D9] border-1 rounded-md p-2 h-[40px] w-full text-[16px] mt-1">
                    <option value="LIMPIEZA">ART. DE LIMPIEZA</option>
                    <option value="PAPELERIA">PAPELERIA</option>
                    <option value="CONSUMO_DE_COMPUTO">CONS. DE COMPUTO</option>
                    <option value="PRODUCTOS_DE_IMPRESION">PRODUCTOS DE IMPRESION</option>
                    <option value="PRODUCTOS_AUTOMOTRICES">PRODUCTOS AUTOMOTRICES</option>
                    <option value="OTROS">OTROS</option>
                </select>
                
                @error('categoria')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <!-- autorizacion -->
            <div>
                <label for="autoriza" class="flex flex-col gap-1">
                    <span>Autorizacion</span>
                    <span class="text-semibold text-base text-[#757575]">
                        ¿Quién autoriza la salida?
                    </span>
                </label>
                <input type="text" id="autoriza" name="autoriza" wire:model.blur="autoriza"
                    class="border-[#D9D9D9] border-1 rounded-md p-2 h-[30px] w-full mt-1">
                
                @error('autoriza')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <!-- entrega -->
            <div>
                <label for="entrega" class="flex flex-col gap-1">
                    <span>Entrega</span>
                    <span class="text-semibold text-base text-[#757575]">
                        ¿Quién entrega la salida?
                    </span>
                </label>
                <input type="text" id="entrega" name="entrega" wire:model.blur="entrega"
                    class="border-[#D9D9D9] border-1 rounded-md p-2 h-[30px] w-full mt-1">
                
                @error('entrega')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <!-- boton -->
            <div class="mt-4">
                <button type="submit" class="w-full bg-[#8B2427] rounded-md flex justify-center p-2 cursor-pointer hover:bg-[#AE2B2F]">
                    <span class="text-base text-white">Aceptar</span>
                </button>

                <div wire:loading wire:target="save" class="w-full text-center text-cortvRojoOscuro mt-2">
                    Guardando...
                </div>
            </div>
        </form>
    </div>

    {{-- The best athlete wants his opponent at his best. --}}
</div>
