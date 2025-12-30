<div>
    <section class="mt-10">
        <div class="mx-auto w-full px-4 lg:px-12">
            <div class="mb-6 items-center" >
                    <h2 class="text-2xl font-bold text-gray-700">Periodo:</h2>
                <div class="flex items-center gap-24">
                    <div>
                        <label class="text-lg">Fecha Inicio:</label>
                        <input
                            wire:model.live = "fechaInicio"
                            type="date"
                            id="start"
                            name="trip-start"
                            value="{{ date('Y-m-d') }}"
                            min="2018-01-01"
                            max="{{ date('Y-m-d') }}" />
                    </div>
        
                    <div>
                        <label>Fecha Fin:</label>
                        <input
                            wire:model.live = "fechaFin"
                            type="date"
                            id="end"
                            name="trip-end"
                            value="{{ date('Y-m-d') }}"
                            min={{ $fechaInicio }}
                            max="{{ date('Y-m-d') }}"
                            wire:change="$refresh" />
                    </div>
                </div>
        
            </div>
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                @include('livewire.includes.table-sort-th', ['name' => 'NoFiltro', 'displayName' => 'Numeración', 'sortDir' => $sortDir])
                                @include('livewire.includes.table-sort-th', ['name' => 'NoFiltro', 'displayName' => 'Clave', 'sortDir' => $sortDir])
                                @include('livewire.includes.table-sort-th', ['name' => 'NoFiltro', 'displayName' => 'Producto', 'sortDir' => $sortDir])
                                @include('livewire.includes.table-sort-th', ['name' => 'NoFiltro', 'displayName' => 'Existencias Iniciales', 'sortDir' => $sortDir])
                                @include('livewire.includes.table-sort-th', ['name' => 'NoFiltro', 'displayName' => 'Entradas', 'sortDir' => $sortDir])
                                @include('livewire.includes.table-sort-th', ['name' => 'NoFiltro', 'displayName' => 'Salidas', 'sortDir' => $sortDir])
                                @include('livewire.includes.table-sort-th', ['name' => 'NoFiltro', 'displayName' => 'Existencias Finales', 'sortDir' => $sortDir])

                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $pos }}</th>
                                    <td class="px-4 py-3 text-center">{{ $producto->clave->valor_clave }}</td>
                                    <td class="px-4 py-3 break-words max-w-sm">{{ $producto->nombre_producto }}</td>
                                    <td class="px-4 py-3 text-center">{{ $this->totalInicial($producto) }}</td>
                                    <td class="px-4 py-3 text-center {{ $producto->cantidad_producto > 0 ? 'text-green-500':'text-gray-500'}}">{{ $this->totalEntradas($producto->id)}} </td>
                                    
                                    <td class="px-4 py-3 text-center {{ $producto->cantidad_producto > 0 ? 'text-red-500':'text-gray-500'}}">{{ $this->totalSalidas($producto->id)}} </td>
                                    <td class="px-4 py-3 text-center {{ $producto->cantidad_producto > 0 ? 'text-green-500' : ($producto->cantidad_producto == 0 ? 'text-gray-500' : 'text-red-500') }}">
                                        {{ $producto->cantidad_producto }}
                                    </td>
                                    
                                </tr>
                                @php
                                    $pos++;
                                @endphp
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
    
                
            </div>
        </div>
    </section>
</div>