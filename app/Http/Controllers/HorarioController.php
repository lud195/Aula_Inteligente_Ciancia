<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index() {
        $horarios = Horario::all();
        return view('horarios.index', compact('horarios'));
    }

    public function create() {
        return view('horarios.create');
    }

    public function store(Request $request) {
        Horario::create($request->all());
        return redirect()->route('horarios.index')->with('success', 'Horario creado correctamente.');
    }

    public function show(Horario $horario) {
        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario) {
        return view('horarios.edit', compact('horario'));
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
