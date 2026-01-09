<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">


                {{-- tabla principal  --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                @include('livewire.includes.table-sort-th', [
                                    'name' => 'NoFiltro',
                                    'displayName' => 'ID',
                                    'sortDir' => $sortDir,
                                ])
                                @include('livewire.includes.table-sort-th', [
                                    'name' => 'NoFiltro',
                                    'displayName' => 'Nombre Producto',
                                    'sortDir' => $sortDir,
                                ])
                                @include('livewire.includes.table-sort-th', [
                                    'name' => 'NoFiltro',
                                    'displayName' => 'Fecha',
                                    'sortDir' => $sortDir,
                                ])
                                @include('livewire.includes.table-sort-th', [
                                    'name' => 'NoFiltro',
                                    'displayName' => 'Encargado',
                                    'sortDir' => $sortDir,
                                ])
                                @include('livewire.includes.table-sort-th', [
                                    'name' => 'NoFiltro',
                                    'displayName' => 'Cantidad',
                                    'sortDir' => $sortDir,
                                ])

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->registros as $salida)
                                <tr class="border-b dark:border-gray-700" wire:key="{{ $salida->id_registro }}">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $salida->id_registro }}</th>
                                    <td class="px-4 py-3">{{ $salida->producto->nombre_producto }}</td>
                                    <td class="px-4 py-3">{{ $salida->fecha_registro }} </td>
                                    <td class="px-4 py-3">{{ $salida->persona->nombre_persona }}</td>
                                    <td class="px-4 py-3">{{ $salida->cantidad_registro }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>


                {{-- Div con los botones de la tabla --}}
                <div class="py-4 px-3 flex flex-row">
                    {{-- boton de agreagar salida, btn con modal del formulario --}}
                    <div>
                        <button type="button" wire:click="abrirModal"   
                            class="w-full bg-cortvRojoOscuro rounded-md flex justify-center p-3 cursor-pointer hover:bg-cortvRojoBasico">
                            <span class="text-base text-white ">Agregar nueva salida</span>
                        </button>                      

                    </div>

                    {{-- div con el boton de generar formato de salida  --}}
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal para agregar salida --}}
    @if($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center">
                {{-- Overlay --}}
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="cerrarModal"></div>

                {{-- Modal panel --}}
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all 
                w-full sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4">
                        <div class="flex justify-end">
                            <button wire:click="cerrarModal" class="text-gray-400 hover:text-gray-500">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    
                        
                        {{-- Componente Livewire del formulario --}}
                        <livewire:formulario.entrada-salida 
                            :titulo_f="'Registra una Nueva Salida'" 
                            :p_entrada_salida="'Producto que sale del inventario'" 
                            :cantidad_entrada_salida="'Cantidad de productos que salen del inventario'"
                        />
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
