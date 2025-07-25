<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Docentes;
use App\Models\Aula;
use App\Models\Materia;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index() {
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }

    public function create() {
        $docentes = Docentes::all();
        $aulas = Aula::all();
        $materias = Materia::all();
        return view('reservas.create', compact('docentes', 'aulas', 'materias'));
    }

    public function store(Request $request) {
        Reserva::create($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva creada correctamente.');
    }

    public function show(Reserva $reserva) {
        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva) {
        return view('reservas.edit', compact('reserva'));
    }

    public function update(Request $request, Reserva $reserva) {
        $reserva->update($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada correctamente.');
    }

    public function destroy(Reserva $reserva) {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada correctamente.');
    }
}
