<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Listado de Emprendedores</h1>

        <a href="{{ route('emprendedores.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Registrar nuevo emprendedor</a>
        <table class="table-auto w-full mt-6 border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Teléfono</th>
                    <th class="border px-4 py-2">Rubro</th>
                    <th class="border px-4 py-2">Ferias donde participa</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emprendedores as $emprendedor)
                    <tr class="bg-white">
                        <td class="border px-4 py-2">{{ $emprendedor->nombre }}</td>
                        <td class="border px-4 py-2">{{ $emprendedor->telefono }}</td>
                        <td class="border px-4 py-2">{{ $emprendedor->rubro }}</td>
                        <td class="border px-4 py-2">
                            @if ($emprendedor->ferias->isEmpty())
                                <span class="text-gray-500 italic">No está registrado en ninguna feria.</span>
                            @else
                                <ul class="list-disc list-inside text-sm text-gray-800 space-y-1">
                                    @foreach ($emprendedor->ferias as $feria)
                                        <li>{{ $feria->nombre }} ({{ $feria->fecha }})</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('emprendedores.edit', $emprendedor) }}" class="text-blue-600 hover:underline">Editar</a>

                            <form action="{{ route('emprendedores.destroy', $emprendedor) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este emprendedor?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>