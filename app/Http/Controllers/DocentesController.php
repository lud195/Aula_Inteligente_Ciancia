<?php

namespace App\Http\Controllers;

use App\Models\Docentes;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    public function index() {
        $docentes = Docentes::orderBy('nombre')->paginate(10);
        return view('docentes.index', compact('docentes'));
    }

    public function create() {
        return view('docentes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'especialidad' => 'nullable|string|max:100',
            'correo' => 'required|email|unique:docentes,correo|max:150',
        ]);

        Docentes::create($request->all());

        return redirect()->route('docentes.index')->with('success', 'Docente creado correctamente.');
    }

    public function show(Docentes $docente) {
        return view('docentes.show', compact('docente'));
    }

    public function edit(Docentes $docente) {
        return view('docentes.edit', compact('docente'));
    }
    
    public function update(Request $request, Docentes $docente) {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'especialidad' => 'nullable|string|max:100',
            'correo' => 'required|email|max:150|unique:docentes,correo,'.$docente->id,
        ]);
    
        $docente->update($request->all());
    
        return redirect()->route('docentes.index')->with('success', 'Docente actualizado correctamente.');
    }
    
    public function destroy(Docentes $docente) {
        $docente->delete();
    
        return redirect()->route('docentes.index')->with('success', 'Docente eliminado correctamente.');
    }
    
}


