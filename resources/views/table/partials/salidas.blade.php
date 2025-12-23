<section>
    <div class="overflow-x-auto">
        
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-slate-700 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Nombre Producto</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha</th>
                    <th class="border border-gray-300 px-4 py-2">Solicitante</th>
                    <th class="border border-gray-300 px-4 py-2">Encargado</th>
                    <th class="border border-gray-300 px-4 py-2">Cantidad</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($salidas as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">{{ $item->registro->producto->nombre_producto }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->registro->fecha_registro }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->solicitante }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->registro->persona->nombre_persona }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->cantidad_salida }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="#" class="text-blue-500 mr-2">Editar</a>
                            <a href="#" class="text-red-500">Eliminar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border border-gray-300 px-4 py-2 text-center">No hay productos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $salidas->links() }}  
        </div>
    </div>
</section>