<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <a href="{{ route('projects.index') }}"
           class="inline-block mb-6 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            ← Volver
        </a>

        <h2 class="text-xl font-bold mb-4">Finalizar Obra: {{ $project->name }}</h2>

<form method="POST" action="{{ route('projects.finish', $project->id) }}">
    @csrf

    <div class="mb-4">
        <label for="end_date" class="block font-semibold">Fecha de finalización:</label>
        <input type="date" name="end_date" id="end_date" class="border p-2 w-full" >
    </div>

    <div class="mb-4">
        <label for="reason_id" class="block font-semibold">Motivo de finalización:</label>
        <select name="reason_id" id="end_reason_id" class="border p-2 w-full" required>
            @foreach($endReasons as $reason)
                <option value="{{ $reason->id }}">{{ $reason->description }}</option>
            @endforeach
        </select>
    </div>

    <h3 class="font-semibold mt-4 mb-2">Kilómetros de cada máquina:</h3>
@foreach($assignments as $assignment)
    <div class="mb-2">
        <label class="block">{{ $assignment->machine->serial_number }}</label>
        <input type="number" name="kilometers[{{ $assignment->machine->id }}]" class="border p-2 w-full" placeholder="Kilómetros finales" required>
    </div>
@endforeach


    <button type="submit" class="mt-4 bg-green-600 text-white px-4 py-2 rounded">Finalizar Obra</button>
</form>

</x-app-layout>
