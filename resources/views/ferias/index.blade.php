<x-app-layout>

    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Listado de Ferias</h1>

        <a href="{{ route('ferias.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Registrar nueva feria</a>
        <table class="table-auto w-full mt-6 border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Fecha</th>
                    <th class="border px-4 py-2">Lugar</th>
                    <th class="border px-4 py-2">Descripción</th>
                    <th class="border px-4 py-2">Emprendedores</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ferias as $feria)
                    <tr class="bg-white">
                        <td class="border px-4 py-2">{{ $feria->nombre }}</td>
                        <td class="border px-4 py-2">{{ $feria->fecha }}</td>
                        <td class="border px-4 py-2">{{ $feria->lugar }}</td>
                        <td class="border px-4 py-2">{{ $feria->descripcion }}</td>
                        <td class="border px-4 py-2">
                            @if ($feria->emprendedores->isEmpty())
                                <span class="text-gray-500 italic">Ninguno registrado.</span>
                            @else
                                <ul class="list-disc list-inside text-sm text-gray-800 space-y-1">
                                    @foreach ($feria->emprendedores as $emprendedor)
                                        <li>{{ $emprendedor->nombre }} ({{ $emprendedor->rubro }})</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('ferias.edit', $feria) }}" class="text-blue-600 hover:underline">Editar</a>

                            <form action="{{ route('ferias.destroy', $feria) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar esta feria?')">
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