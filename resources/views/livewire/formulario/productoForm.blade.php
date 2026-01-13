<div
    class="w-full flex flex-col shadow-2xl rounded-2xl bg-white
                xs:w-[87%] xs:self-center
                md:w-[81%] md:self-center
                lg:w-[43%]
                lg:content-center lg:pt-6 p-6">

    <div class="flex justify-center mt-3">
        <span class="text-cortvRojoBasico text-5xl text-center font-bold tracking-[-0.96px] mb-3"
            style="font-family: 'Times New Roman', Times, serif;">
            {{ $titulo_f }} </span>
    </div>

    {{-- FORMULARIO --}}
    <div>
        <form wire:submit="save" class="flex flex-col px-7 py-4 gap-8 w-full text-black text-xl"
            style="font-family: 'Times New Roman', Times, serif;">
            <!-- nombre del producto -->
            <div>
                <label for="nombre">
                    <span> Nombre del producto </span>
                </label>
                <input type="text" id="nombre" name="nombre" wire:model.blur="nombre_producto"
                    class="border-cortvBorde border-1 rounded-md p-2 h-[35px] w-full mt-1">
                {{-- validacion del formulario --}}
                <div>
                    @error('nombre_producto')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- descripcion del producto -->
            <div>
                <div>
                    <label for="descripcion">
                        <span>
                            Descripción del producto </span>
                    </label>
                    
                    <textarea id="descripcion" name="descripcion" wire:model.blur="descripcion_producto" rows="3"
                        class="border-cortvBorde border-1 rounded-md p-2 w-full mt-1"></textarea>
                    
                        {{-- validacion del formulario --}}

                        <div>
                            @error('descripcion_producto')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                </div>
            </div>

            <div>
                <div>
                    <label for="unidad">
                        <span>
                            Tipo de unidad del producto
                        </span>
                    </label>
                    <input type="text" id="unidad" name="unidad" wire:model.blur="unidad_producto"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[35px] w-full mt-1">

                    {{-- validacion del formulario --}}
                    <div>
                        @error('unidad_producto')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <!-- area a la que pertenece el producto -->
            <div>
                <label for="area" class="flex flex-col gap-1"> <span> Área </span>

                    <span class="text-semibold text-base text-cortvGrisClaro">
                        ¿A qué área pertenece el producto?
                    </span>

                </label>

                <select id="area" name="area" wire:model.blur="id_area"
                    class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]">
                    @foreach ($this->areas() as $area)
                        <option value="{{ $area->id_area }}"> {{ $area->descripcion_area }} </option>
                    @endforeach
                </select>

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
                    Guardando nuevo producto...
                </div>

                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

        </form>

    </div>

</div>
