<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Registrar Feria</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ferias.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block">Nombre de la feria</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block">Fecha del evento</label>
                <input type="date" name="fecha" value="{{ old('fecha') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block">Lugar</label>
                <input type="text" name="lugar" value="{{ old('lugar') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block">Descripción</label>
                <textarea name="descripcion" rows="3" class="w-full border rounded px-3 py-2">{{ old('descripcion') }}</textarea>
            </div>
            <div>
                <label class="block font-semibold mb-1">Emprendedores participantes</label>
                <div class="border rounded px-3 py-2 space-y-2 max-h-60 overflow-y-auto">
                    @foreach ($emprendedores as $emprendedor)
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="emp{{ $emprendedor->id }}" name="emprendedores[]" value="{{ $emprendedor->id }}">
                            <label for="emp{{ $emprendedor->id }}">{{ $emprendedor->nombre }} — {{ $emprendedor->rubro }}</label>
                        </div>
                    @endforeach
                </div>
            </div>



            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Guardar</button>
        </form>
    </div>
</x-app-layout>