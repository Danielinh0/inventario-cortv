<div
    class="w-full flex flex-col rounded-2xl bg-white p-6">

    <div class="flex justify-center mt-3">
        <span class="text-cortvRojoBasico text-5xl text-center font-bold tracking-[-0.96px] mb-3"
            style="font-family: 'Times New Roman', Times, serif;">
            {{ $titulo_f }} </span>
    </div>

    {{-- FORMULARIO --}}
    <div>
        <form wire:submit="save" class="flex flex-col px-7 py-4 gap-8 w-full text-black text-xl"
            style="font-family: 'Times New Roman', Times, serif;">
                                                          
            <!-- Que producto nuevos o existente entra o sale al inventario -->
            <div>
                <label for="producto" class="flex flex-col gap-1"> <span> Producto </span>

                    <span class="text-semibold text-base text-cortvGrisClaro">
                        {{$p_entrada_salida}}
                    </span>

                </label>

                <select id="producto" name="producto" wire:model.blur="nombre_producto"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]">
                    <option value="producto1"> Producto 1 </option>
                    <option value="producto2"> Producto 2 </option>
                    <option value="producto3"> Producto 3 </option>
                    <option value="producto4"> Producto 4 </option>
                </select>

                {{-- validacion del formulario --}}
                <div>
                    @error('area_producto')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div> 


            {{-- cantidad de productos que entran al inventario o salen al inventario --}}

            <div>
                <label for="cantidad" class="flex flex-col gap-1"> <span> Cantidad </span>

                    <span class="text-semibold text-base text-cortvGrisClaro">
                        {{$cantidad_entrada_salida}}
                    </span>

                </label>

                <input type="number" id="cantidad" name="cantidad" wire:model.blur="cantidad_registro"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[35px] w-full mt-1">


                {{-- validacion del formulario --}}
                <div>
                    @error('area_producto')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>


           
            <!-- boton de Enviar  -->

            <div class="mt-1">
                <button type="submit"
                    class="w-full bg-cortvRojoOscuro rounded-md flex justify-center p-2 cursor-pointer hover:bg-cortvRojoBasico">
                    <span class="text-base text-white ">Aceptar</span>
                </button>

                <div wire:loading wire:target="save" class="w-full text-center text-cortvRojoOscuro mt-2">
                    Guardando ...
                </div>

            </div>

        </form>

    </div>

</div>
