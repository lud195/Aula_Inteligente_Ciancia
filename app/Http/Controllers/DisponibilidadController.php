<?php

namespace App\Http\Controllers;

use App\Models\Disponibilidad;
use App\Models\Docentes;
use App\Models\Aula;
use Illuminate\Http\Request;

class DisponibilidadController extends Controller
{
    public function index(Request $request)
    {
        $query = Disponibilidad::with('aula', 'docente');

        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        if ($request->filled('docente_id')) {
            $query->where('docente_id', $request->docente_id);
        }

        $disponibilidades = $query->get();

        $aulasDisponibles = Aula::whereDoesntHave('disponibilidades')
            ->orWhereHas('disponibilidades', function ($q) {
                $q->where('estado', 'disponible');
            })->get();

            $docentesDisponibles = Docentes::whereDoesntHave('disponibilidades')
            ->orWhereHas('disponibilidades', function ($q) {
                $q->where('estado', 'disponible');
            })->get();
        

        $docentes = Docentes::all();

        return view('disponibilidades.index', compact(
            'disponibilidades',
            'aulasDisponibles',
            'docentesDisponibles',
            'docentes'
        ));
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

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'docente_id' => 'required|exists:docentes,id',
            'estado' => 'required|string',
            'hora' => 'required',
            'fecha' => 'required|date',
        ]);
    
        if ($request->filled('disponibilidad_id')) {
            // Actualizar
            $disponibilidad = Disponibilidad::findOrFail($request->disponibilidad_id);
            $disponibilidad->update($request->all());
            return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad actualizada correctamente.');
        } else {
            // Crear
            Disponibilidad::create($request->all());
            return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad creada correctamente.');
        }
    }
    

    public function destroy($id)
    {
        $disponibilidad = Disponibilidad::findOrFail($id);
        $disponibilidad->delete();
    
        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad eliminada correctamente.');
    }
    
}
