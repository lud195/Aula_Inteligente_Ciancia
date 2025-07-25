<?php

namespace App\Http\Controllers;

use App\Models\HistorialUsuario;
use Illuminate\Http\Request;

class HistorialUsuarioController extends Controller
{
    public function index() {
        $historialusuarios = HistorialUsuario::all();
        return view('historialusuarios.index', compact('historialusuarios'));
    }

    public function create() {
        return view('historialusuarios.create');
    }

    public function store(Request $request) {
        HistorialUsuario::create($request->all());
        return redirect()->route('historialusuarios.index')->with('success', 'HistorialUsuario creado correctamente.');
    }

    public function show(HistorialUsuario $historialusuario) {
        return view('historialusuarios.show', compact('historialusuario'));
    }

    public function edit(HistorialUsuario $historialusuario) {
        return view('historialusuarios.edit', compact('historialusuario'));
    }

    public function update(Request $request, HistorialUsuario $historialusuario) {
        $historialusuario->update($request->all());
        return redirect()->route('historialusuarios.index')->with('success', 'HistorialUsuario actualizado correctamente.');
    }

    public function destroy(HistorialUsuario $historialusuario) {
        $historialusuario->delete();
        return redirect()->route('historialusuarios.index')->with('success', 'HistorialUsuario eliminado correctamente.');
    }
}
