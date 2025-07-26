<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Materia;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index() {
        $horarios = Horario::with('materia', 'reserva.docente', 'reserva.aula')->get();
        return view('horarios.index', compact('horarios'));
    }

    public function create() {
        $materias = Materia::all();
        return view('horarios.create', compact('materias'));
    }

    public function store(Request $request) {
        Horario::create($request->all());
        return redirect()->route('horarios.index')->with('success', 'Horario creado correctamente.');
    }

    public function show(Horario $horario) {
        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario) {
        $materias = Materia::all();
        return view('horarios.edit', compact('horario', 'materias'));
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

