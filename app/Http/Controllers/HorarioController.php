<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Materia;
use App\Models\Docentes; // plural
use App\Models\Aula;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index() {
        $horarios = Horario::with('materia', 'docente', 'aula')->get();
        return view('horarios.index', compact('horarios'));
    }
    

    public function create() {
        $materias = Materia::all();
        $docentes = Docentes::all(); // plural
        $aulas = Aula::all();
        return view('horarios.create', compact('materias', 'docentes', 'aulas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'materia_id' => 'required',
            'docente_id' => 'required',
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'aula_id' => 'required',
        ]);
    
        Horario::create([
            'materia_id' => $request->materia_id,
            'docente_id' => $request->docente_id,
            'dia' => $request->dia,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'aula_id' => $request->aula_id,
        ]);
    
        return redirect()->route('horarios.index')->with('success', 'Horario creado correctamente.');
    }
    
    

    public function show(Horario $horario) {
        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario) {
        $materias = Materia::all();
        $docentes = Docentes::all(); // plural
        $aulas = Aula::all();
        return view('horarios.edit', compact('horario', 'materias', 'docentes', 'aulas'));
    }

    public function update(Request $request, Horario $horario) {
        $horario->update($request->all());
        return redirect()->route('horarios.index')->with('success', 'Horario actualizado correctamente.');
    }

    public function destroy(Horario $horario) {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado correctamente.');
    }
}
