<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Docentes;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        // Corrección aquí
        $materias = Materia::with('docente')->orderBy('nombre')->paginate(10);
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        // Obtener docentes ordenados
        $docentes = Docentes::orderBy('nombre')->get();
    
        // Generar un código único (por ejemplo, MAT-001, MAT-002, etc.)
        $ultimo = Materia::latest('id')->first();
        $numero = $ultimo ? $ultimo->id + 1 : 1;
        $codigo = 'MAT-' . str_pad($numero, 3, '0', STR_PAD_LEFT);
    
        // Pasar variables a la vista
        return view('materias.create', compact('docentes', 'codigo'));
    }
    


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:materias,nombre',
            'codigo' => 'required|string|max:50|unique:materias,codigo',
            'carrera' => 'required|string|max:100',
            'anio' => 'required|in:1,2,3,4,5',
            'tipo_cursada' => 'required|in:Presencial,Virtual,Mixta',
            'docente_id' => 'required|exists:docentes,id',
        ]);

        Materia::create($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia creada correctamente.');
    }

    public function show(Materia $materia)
    {
        return view('materias.show', compact('materia'));
    }

    public function edit(Materia $materia)
    {
        $docentes = Docentes::orderBy('nombre')->get();
        return view('materias.edit', compact('materia', 'docentes'));
    }



    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:materias,nombre,' . $materia->id,
            'codigo' => 'required|string|max:50|unique:materias,codigo,' . $materia->id,
            'carrera' => 'required|string|max:100',
            'anio' => 'required|in:1,2,3,4,5',
            'tipo_cursada' => 'required|in:Presencial,Virtual,Mixta',
            'docente_id' => 'required|exists:docentes,id',
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente.');
    }
}
