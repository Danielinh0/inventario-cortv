<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">


                {{-- tabla principal  --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <!-- Encabezados de la tabla con ordenamiento -->
                            <tr>
                                @include('livewire.includes.table-sort-th', [
                                    'name' => 'NoFiltro',
                                    'displayName' => 'Numeración',
                                    'sortDir' => $sortDir,
                                ])
                                @include('livewire.includes.table-sort-th', [
                                    'name' => 'NoFiltro',
                                    'displayName' => 'Cantidad',
                                    'sortDir' => $sortDir,
                                ])
                                @include('livewire.includes.table-sort-th', [
                                    'name' => 'NoFiltro',
                                    'displayName' => 'Nombre del Producto',
                                    'sortDir' => $sortDir,
                                ])
                               

                            </tr>
                        </thead>
                        <tbody>
                            @if($salidas== [])
                                <tr>
                                    <td colspan="5" class="px-4 py-3 text-center text-gray-500">
                                        Aun no se han agregado salidas a este reporte.
                                    </td>
                                </tr>
                            @endif
                            @foreach ($salidas as $salida)
                                <tr class="border-b dark:border-gray-700" wire:key="{{ $loop->index }}">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->index+1 }}</th>
                                    <td class="px-4 py-3">{{ $salida['cantidad_registro']}}</td>
                                    <td class="px-4 py-3">{{ $salida['tipo_unidad'] }}</td>
                                    <td class="px-4 py-3">{{ $salida['producto_nombre'] }}</td>
                                    
                                </tr>
                            @endforeach                         

                        </tbody>
                    </table>
                </div>
               
            </div>
        
            {{-- Div con los botones de la tabla --}}
                <div class="py-4 px-3 flex flex-row justify-between gap-4">
                    {{-- boton de agreagar salida, btn con modal del formulario --}}
                    <button type="button" wire:click="abrirModal"
                        class="bg-cortvRojoOscuro rounded-md flex items-center justify-center p-3 cursor-pointer hover:bg-cortvRojoBasico px-6 gap-2">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="text-base text-white whitespace-nowrap">Agregar nueva salida</span>
                    </button>

                    {{-- boton de generar formato de salida  --}}
                    <button type="button" wire:click="guardarSalidas"
                        class="bg-cortvRojoBasico rounded-md flex items-center justify-center p-3 cursor-pointer hover:bg-cortvRojoOscuro px-6 gap-2">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="text-base text-white whitespace-nowrap">Registrar salidas y<br>generar formato de salida</span>
                        
                    </button>

                </div>
                <div wire:loading wire:target="save" class="w-full text-center text-cortvRojoOscuro mt-2">
                    Guardando ...
                </div>
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                
        </div>
    </section>

    {{-- Modal para agregar salida --}}
    @if($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center">
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
                        <livewire:formulario.form-salida                             
                            :enModal="true"
                            :tipo_registro="false"
                            :key="'form-salida-' . $formKey"
                        />
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
