<div>
    <section class="mt-10">
        <!--Cabecera y filtros-->
            <div class="mb-6 items-center" >
               
                <!-- Selectores de Fecha -->
                    <div class="mb-4">
                        <div class="h-8 bg-gray-300 rounded animate-pulse w-32"></div>
                    </div>
                    <div class="flex items-center gap-24">
                        <!-- Placeholder Fecha Inicio -->
                        <div>
                            <div class="h-6 bg-gray-300 rounded animate-pulse w-24 mb-2"></div>
                            <div class="h-10 bg-gray-200 rounded animate-pulse w-40"></div>
                        </div>
                        <!-- Placeholder Fecha Fin -->
                        <div>
                            <div class="h-6 bg-gray-300 rounded animate-pulse w-24 mb-2"></div>
                            <div class="h-10 bg-gray-200 rounded animate-pulse w-40"></div>
                        </div>
                    </div>
                    <!-- Placeholder Botón descarga -->
                    <div class="mt-6">
                        <div class="h-6 bg-gray-300 rounded animate-pulse w-96 mb-4"></div>
                        <div class="flex justify-end">
                            <div class="h-10 bg-gray-300 rounded animate-pulse w-40"></div>
                        </div>
                    </div>
            </div>
        
        <!--Tabla de productos-->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    @for($i = 0; $i < 7; $i++)
                        <th class="px-4 py-3">
                        <div class="h-4 bg-gray-300 rounded animate-pulse"></div>
                        </th>
                    @endfor

                </tr>
                </thead>
                <tbody>
                @for($i = 0; $i < 5; $i++)
                <tr class="border-b">
                    @for($j = 0; $j < 7; $j++)
                        <td class="px-4 py-3">
                        <div class="h-4 bg-gray-200 rounded animate-pulse"></div>
                        </td>
                    @endfor
                </tr>
                @endfor
                </tbody>
            </table>
            </div>
        </div>
    </section>
</div>