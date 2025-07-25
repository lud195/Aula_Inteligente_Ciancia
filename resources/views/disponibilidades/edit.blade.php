<h1>Disponibilidad - Edit View</h1>

<form action="{{ route('disponibilidades.update', $disponibilidad->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Aula:</label>
    <select name="aula_id" required>
        @foreach(App\Models\Aula::all() as $aula)
            <option value="{{ $aula->id }}" {{ $aula->id == $disponibilidad->aula_id ? 'selected' : '' }}>
                {{ $aula->nombre }}
            </option>
        @endforeach
    </select><br>

    <label>Estado:</label>
    <input type="text" name="estado" value="{{ $disponibilidad->estado }}" required><br>

    <label>Hora:</label>
    <input type="text" name="hora" value="{{ $disponibilidad->hora }}" required><br>

    <label>Fecha:</label>
    <input type="date" name="fecha" value="{{ $disponibilidad->fecha }}" required><br>

    <button type="submit">Actualizar</button>
</form>
