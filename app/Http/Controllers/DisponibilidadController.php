<?php
namespace App\Http\Controllers;

use App\Models\Disponibilidad;
use App\Models\Docentes;
use App\Models\Aula;
use Illuminate\Http\Request;

class DisponibilidadController extends Controller
{
    public function index()
    {
        // Traer todas las disponibilidades con sus aulas y docentes relacionados
        $disponibilidades = Disponibilidad::with('aula', 'docente')->get();

        // Aulas que no tienen ninguna disponibilidad o que tienen disponibilidad con estado 'disponible'
        $aulasDisponibles = Aula::whereDoesntHave('disponibilidades')
            ->orWhereHas('disponibilidades', function ($query) {
                $query->where('estado', 'disponible');
            })->get();

        // Docentes que tienen al menos una disponibilidad con estado 'disponible'
        $docentesDisponibles = Docentes::whereHas('disponibilidades', function ($query) {
            $query->where('estado', 'disponible');
        })->get();

        return view('disponibilidades.index', compact('disponibilidades', 'aulasDisponibles', 'docentesDisponibles'));
    }

    public function create()
    {
        $aulas = Aula::all();
        $docentes = Docentes::all();
        return view('disponibilidades.create', compact('aulas', 'docentes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'docente_id' => 'required|exists:docentes,id',
            'estado' => 'required|string',
            'hora' => 'required',
            'fecha' => 'required|date',
        ]);

        Disponibilidad::create($request->all());

        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad creada correctamente.');
    }

    public function show(Disponibilidad $disponibilidad)
    {
        return view('disponibilidades.show', compact('disponibilidad'));
    }

    public function edit(Disponibilidad $disponibilidad)
    {
        $aulas = Aula::all();
        $docentes = Docentes::all();
        return view('disponibilidades.edit', compact('disponibilidad', 'aulas', 'docentes'));
    }

    public function update(Request $request, Disponibilidad $disponibilidad)
    {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'docente_id' => 'required|exists:docentes,id',
            'estado' => 'required|string',
            'hora' => 'required',
            'fecha' => 'required|date',
        ]);

        $disponibilidad->update($request->all());

        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad actualizada correctamente.');
    }

    public function destroy(Disponibilidad $disponibilidad)
    {
        $disponibilidad->delete();
        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad eliminada correctamente.');
    }
}
