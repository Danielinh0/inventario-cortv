<div>
    <section class="mt-10">
        <!--Cabecera y filtros-->
            <div class="mb-6 items-center" >
               
                <!-- Selectores de Fecha -->
                    <h2 class="text-2xl font-bold text-gray-700">Periodo:</h2>
                    <div class="flex items-center gap-24">
                            <!--Fecha Inicio-->
                                <div>
                                    <label class="text-lg">Fecha Inicio:</label>
                                    <input
                                        wire:model.blur="fechaInicio"
                                        type="date"
                                        id="start"
                                        name="trip-start"
                                        value="{{ $fechaInicio }}"
                                        min="2000-01-01"
                                        max="{{ date('Y-m-d') }}"
                                        />
                                <span wire:loading wire:target="fechaInicio" class="ml-2 text-gray-500">
                                    <svg class="animate-spin h-4 w-4 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                                </div>
                            <!--Fecha Fin-->
                                <div>
                                    <label>Fecha Fin:</label>
                                    <input
                                        wire:model.blur="fechaFin"
                                        type="date"
                                        id="end"
                                        name="trip-end"
                                        value="{{ $fechaFin }}"
                                        min={{ $fechaInicio }}
                                        max="{{ date('Y-m-d') }}"
                                        />
                                    <span wire:loading wire:target="fechaFin" class="ml-2 text-gray-500">
                                        <svg class="animate-spin h-4 w-4 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </span>
                                </div>
                        
                    </div>
                        <!-- Botón de descarga y generar periodo-->
                            @if($showPdfButton ==true)
                                <h2>
                                    <br>
                                    <span class="text-cortvRojoBasico font-semibold">Recuerda esperar unos segundos a que se actualice el reporte antes de descargar el PDF.</span>
                                </h2>
                            
                                <div class="sm:px-6 lg:px-8 flex justify-end">
                                    <a href="{{ route('generate.pdf', ['fechaInicio' => $fechaInicio, 'fechaFin' => $fechaFin]) }}" target="__blank" class="inline-flex items-center px-4 py-2 bg-cortvRojoOscuro border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                        Descargar PDF
                                    </a>
                                </div>
                            @endif
            </div>
        
        <!--Tabla de productos-->
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
                        @foreach ($this->datosReporte as $producto)
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center w-auto">{{ $pos }}</th>
                                <td class="px-4 py-3 text-center">{{ $producto['datos_producto']->clave->valor_clave }}</td>
                                <td class="px-4 py-3 break-word max-w-2">{{ $producto['datos_producto']->nombre_producto }}</td>
                                <td class="px-4 py-3 text-center">{{$producto['exInicial']}}</td>
                                <td class="px-4 py-3 text-center {{ $producto['totalEntrada'] > 0 ? 'text-green-500':'text-gray-500'}}">{{ $producto['totalEntrada'] }} </td>
                                <td class="px-4 py-3 text-center {{ $producto['totalSalida'] > 0 ? 'text-cortvRojoBasico':'text-gray-500'}}">{{ $producto['totalSalida'] }} </td>
                                <td class="px-4 py-3 text-center {{ $producto['exFinal'] > 0 ? 'text-green-500' : ($producto['exFinal'] == 0 ? 'text-gray-500' : 'text-cortvRojoBasico') }}">
                                    {{ $producto['exFinal'] }}
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
    </section>
</div>