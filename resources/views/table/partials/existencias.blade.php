<section>
    <div class="overflow-x-auto">
        
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-slate-700 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Producto</th>
                    <th class="border border-gray-300 px-4 py-2">Cantidad</th>
                    <th class="border border-gray-300 px-4 py-2">Tipo Unidad</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">{{ $item->id_producto }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->nombre_producto }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->cantidad_producto }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->unidad_producto }}</td>
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
            {{ $productos->links() }}  
        </div>
    </div>
</section>