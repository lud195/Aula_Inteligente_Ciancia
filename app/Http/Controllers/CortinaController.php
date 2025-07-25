<?php

namespace App\Http\Controllers;

use App\Models\Cortina;
use Illuminate\Http\Request;

class CortinaController extends Controller
{
    public function index() {
        $cortinas = Cortina::all();
        return view('cortinas.index', compact('cortinas'));
    }

    public function create() {
        return view('cortinas.create');
    }

    public function store(Request $request) {
        Cortina::create($request->all());
        return redirect()->route('cortinas.index')->with('success', 'Cortina creado correctamente.');
    }

    public function show(Cortina $cortina) {
        return view('cortinas.show', compact('cortina'));
    }

    public function edit(Cortina $cortina) {
        return view('cortinas.edit', compact('cortina'));
    }

    public function update(Request $request, Cortina $cortina) {
        $cortina->update($request->all());
        return redirect()->route('cortinas.index')->with('success', 'Cortina actualizado correctamente.');
    }

    public function destroy(Cortina $cortina) {
        $cortina->delete();
        return redirect()->route('cortinas.index')->with('success', 'Cortina eliminado correctamente.');
    }
}
