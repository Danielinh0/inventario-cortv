<section>
    <div class="overflow-x-auto">
        
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-slate-700 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Nombre</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($areas as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">{{ $item->id_area }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->nombre_area }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="#" class="text-blue-500 mr-2">Editar</a>
                            <a href="#" class="text-red-500">Eliminar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border border-gray-300 px-4 py-2 text-center">No hay Areas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
</section>