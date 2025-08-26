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
        $docentes = Docentes::all();
        $aulas = Aula::all();

        $franjas = [
            '7:00-7:40',
            '7:40-8:15',
            '8:25-9:05',
            '9:05-9:40',
            '9:50-10:30',
            '10:30-11:05',
            '11:15-11:55',
            '11:55-12:30'
        ];

        return view('horarios.create', compact('materias', 'docentes', 'aulas', 'franjas'));
    }

    public function store(Request $request)
    {
        $franjas = [
            '7:00-7:40',
            '7:40-8:15',
            '8:25-9:05',
            '9:05-9:40',
            '9:50-10:30',
            '10:30-11:05',
            '11:15-11:55',
            '11:55-12:30'
        ];

        $request->validate([
            'materia_id' => 'required|exists:materias,id',
            'dia' => 'required|string',
            'hora' => 'required|in:'.implode(',', $franjas),
            'docente_id' => 'required|exists:docentes,id',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        list($hora_inicio, $hora_fin) = explode('-', $request->hora);
        $hora_inicio = trim($hora_inicio);
        $hora_fin = trim($hora_fin);

        $conflicto = \DB::table('horarios')
            ->where('aula_id', $request->aula_id)
            ->where('dia', $request->dia)
            ->where(function($query) use ($hora_inicio, $hora_fin) {
                $query->where('hora_inicio', '<', $hora_fin)
                      ->where('hora_fin', '>', $hora_inicio);
            })
            ->exists();

        if ($conflicto) {
            return back()->withErrors(['error' => '⚠️ El aula ya está ocupada en ese horario.']);
        }

        Horario::create([
            'materia_id' => $request->materia_id,
            'docente_id' => $request->docente_id,
            'aula_id'    => $request->aula_id,
            'dia'        => $request->dia,
            'hora_inicio'=> $hora_inicio,
            'hora_fin'   => $hora_fin,
        ]);

        return redirect()->route('horarios.index')->with('success', 'Horario creado correctamente.');
    }

    public function show(Horario $horario) {
        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario) {
        $materias = Materia::all();
        $docentes = Docentes::all();
        $aulas = Aula::all();
        return view('horarios.edit', compact('horario', 'materias', 'docentes', 'aulas'));
    }

    public function update(Request $request, Horario $horario) {
        $franjas = [
            '7:00-7:40',
            '7:40-8:15',
            '8:25-9:05',
            '9:05-9:40',
            '9:50-10:30',
            '10:30-11:05',
            '11:15-11:55',
            '11:55-12:30'
        ];

        $request->validate([
            'materia_id' => 'required|exists:materias,id',
            'dia' => 'required|string',
            'hora' => 'required|in:'.implode(',', $franjas),
            'docente_id' => 'required|exists:docentes,id',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        list($hora_inicio, $hora_fin) = explode('-', $request->hora);
        $hora_inicio = trim($hora_inicio);
        $hora_fin = trim($hora_fin);

        $horario->update([
            'materia_id' => $request->materia_id,
            'docente_id' => $request->docente_id,
            'aula_id'    => $request->aula_id,
            'dia'        => $request->dia,
            'hora_inicio'=> $hora_inicio,
            'hora_fin'   => $hora_fin,
        ]);

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado correctamente.');
    }

    public function destroy(Horario $horario) {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado correctamente.');
    }
}
