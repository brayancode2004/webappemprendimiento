<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Registrar Emprendedor</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('emprendedores.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block">Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block">Rubro</label>
                <input type="text" name="rubro" value="{{ old('rubro') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Ferias en las que participará</label>
                <div class="border rounded px-3 py-2 space-y-2 max-h-60 overflow-y-auto">
                    @foreach ($ferias as $feria)
                        <div class="flex items-center space-x-2">
                            <input
                                type="checkbox"
                                id="feria{{ $feria->id }}"
                                name="ferias[]"
                                value="{{ $feria->id }}"
                                {{ in_array($feria->id, old('ferias', [])) ? 'checked' : '' }}
                            >
                            <label for="feria{{ $feria->id }}">{{ $feria->nombre }} — {{ $feria->fecha }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Guardar</button>
        </form>
    </div>
</x-app-layout>