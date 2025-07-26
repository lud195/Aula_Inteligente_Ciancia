<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index()
    {
        // Cambié $aula por $aulas para que sea plural y coincida con compact('aulas')
        $aulas = Aula::paginate(20);
        return view('aulas.index', compact('aulas'));
    }

    public function create()
    {
        return view('aulas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:aulas,nombre',
            'ubicacion' => 'nullable|string',
            'capacidad' => 'required|integer|min:1',
            'disponibilidad' => 'required|in:Disponible,Ocupado,Mantenimiento',
        ]);

        Aula::create($request->all());

        return redirect()->route('aulas.index')->with('success', 'Aula creada correctamente.');
    }

    public function show($id)
    {
        $aula = Aula::findOrFail($id); // Sin cargar relaciones adicionales
        return view('aulas.show', compact('aula'));
    }

    public function edit($id)
    {
        $aula = Aula::findOrFail($id);
        return view('aulas.edit', compact('aula'));
    }

    public function update(Request $request, $id)
    {
        $aula = Aula::findOrFail($id);

        $request->validate([
            'nombre' => "required|unique:aulas,nombre,{$id}",
            'ubicacion' => 'nullable|string',
            'capacidad' => 'required|integer|min:1',
            'disponibilidad' => 'required|in:Disponible,Ocupado,Mantenimiento',
        ]);

        $aula->update($request->all());

        return redirect()->route('aulas.index')->with('success', 'Aula actualizada correctamente.');
    }

    public function destroy($id)
    {
        $aula = Aula::findOrFail($id);
        $aula->delete();

        return redirect()->route('aulas.index')->with('success', 'Aula eliminada correctamente.');
    }
}
