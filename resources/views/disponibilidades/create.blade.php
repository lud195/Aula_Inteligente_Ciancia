<h1>Disponibilidad - Create View</h1>

<form action="{{ route('disponibilidades.store') }}" method="POST">
    @csrf

    <label>Aula:</label>
    <select name="aula_id" required>
        @foreach(App\Models\Aula::all() as $aula)
            <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
        @endforeach
    </select><br>

    <label>Estado:</label>
    <input type="text" name="estado" required><br>

    <label>Hora:</label>
    <input type="text" name="hora" required><br>

    <label>Fecha:</label>
    <input type="date" name="fecha" required><br>

    <button type="submit">Crear Disponibilidad</button>
</form>
