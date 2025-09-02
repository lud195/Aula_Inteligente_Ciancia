<?php

namespace App\Http\Controllers;

use App\Models\Cortina;
use App\Models\Aula;
use Illuminate\Http\Request;

class CortinaController extends Controller
{
    public function index() {
        // Obtenemos todas las cortinas con su aula relacionada
        $cortinas = Cortina::with('aula')->get();
        // Enviamos la variable plural $cortinas a la vista
        return view('cortinas.index', compact('cortinas'));
    }

    public function create() {
        $aulas = Aula::all();
        return view('cortinas.create', compact('aulas'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'estado' => 'required|string|max:255',
            'aula_id' => 'required|exists:aulas,id',
            'nivel_cortina' => 'required|in:baja,media,alta', // <-- agregamos nivel
        ]);
    
        Cortina::create($validated);
    
        return redirect()->route('cortinas.index')->with('success', 'Cortina creada correctamente.');
    }
    

    public function show(Cortina $cortina) {
        $cortina->load('aula');
        return view('cortinas.show', compact('cortina'));
    }

    public function edit(Cortina $cortina) {
        $aulas = Aula::all();
        return view('cortinas.edit', compact('cortina', 'aulas'));
    }

    
    public function update(Request $request, Cortina $cortina) {
        $validated = $request->validate([
            'estado' => 'required|string|max:255',
            'aula_id' => 'required|exists:aulas,id',
            'nivel_cortina' => 'required|in:baja,media,alta', // <-- agregamos nivel
        ]);
    
        $cortina->update($validated);
    
        return redirect()->route('cortinas.index')->with('success', 'Cortina actualizada correctamente.');
    }
    

    public function destroy(Cortina $cortina) {
        $cortina->delete();
        return redirect()->route('cortinas.index')->with('success', 'Cortina eliminada correctamente.');
    }
}
