<?php
namespace App\Http\Controllers;

use App\Models\Foco;
use App\Models\Aula;
use Illuminate\Http\Request;

class FocoController extends Controller
{
    // Métodos para focos ANIDADOS dentro de aulas
    public function indexPorAula(Aula $aula) {
        $focos = $aula->focos;
        return view('focos.index', compact('focos', 'aula'));
    }

    public function createPorAula(Aula $aula) {
        return view('focos.create', compact('aula'));
    }

    public function storePorAula(Request $request, Aula $aula) {
        $request->validate([
            'codigo' => 'required|string|max:100',
            'intensidad' => 'required|integer|min:0|max:100',
            'tipo' => 'required|string',
            'estado' => 'required|string|in:encendido,apagado'
        ]);

        // Asignamos ubicacion automáticamente según el aula
        $data = $request->all();
        $data['ubicacion'] = $aula->ubicacion;
        $data['aula_id'] = $aula->id;

        $aula->focos()->create($data);

        return redirect()->route('aulas.focos.index', $aula)->with('success', 'Foco creado correctamente.');
    }

    public function showPorAula(Aula $aula, Foco $foco) {
        return view('focos.show', compact('foco', 'aula'));
    }

    public function editPorAula(Aula $aula, Foco $foco) {
        return view('focos.edit', compact('foco', 'aula'));
    }

    public function updatePorAula(Request $request, Aula $aula, Foco $foco) {
        $request->validate([
            'codigo' => 'required|string|max:100',
            'intensidad' => 'required|integer|min:0|max:100',
            'tipo' => 'required|string',
            'estado' => 'required|string|in:encendido,apagado'
        ]);

        $data = $request->all();
        $data['ubicacion'] = $aula->ubicacion; // Actualizar ubicacion según aula
        $data['aula_id'] = $aula->id;

        $foco->update($data);

        return redirect()->route('aulas.focos.index', $aula)->with('success', 'Foco actualizado correctamente.');
    }

    public function destroyPorAula(Aula $aula, Foco $foco) {
        $foco->delete();

        return redirect()->route('aulas.focos.index', $aula)->with('success', 'Foco eliminado correctamente.');
    }

    // Métodos para focos GENERALES (independientes)
    public function index() {
        $focos = Foco::with('aula')->get();
        return view('focos.general', compact('focos'));
    }

    public function create() {
        $aulas = Aula::all();
        return view('focos.create', compact('aulas'));
    }

    public function createGeneral() {
        $aulas = Aula::all();
        return view('focos.create', compact('aulas'));
    }

    public function store(Request $request) {
        $request->validate([
            'codigo' => 'required|string|max:100|unique:focos,codigo',
            'intensidad' => 'required|integer|min:0|max:100',
            'tipo' => 'required|string',
            'estado' => 'required|string|in:encendido,apagado',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        // Obtener aula para asignar ubicacion automáticamente
        $aula = Aula::findOrFail($request->aula_id);

        $data = $request->all();
        $data['ubicacion'] = $aula->ubicacion;

        Foco::create($data);

        return redirect()->route('focos.index')->with('success', 'Foco creado correctamente.');
    }

    public function edit(Foco $foco) {
        $aulas = Aula::all();
        return view('focos.edit', compact('foco', 'aulas'));
    }

    
    public function update(Request $request, Foco $foco)
    {
        $request->validate([
            'codigo' => 'required|string',
            'intensidad' => 'required|integer|min:0|max:100',
            'tipo' => 'required|string',
            'estado' => 'required|in:apagado,encendido,en reparación,fuera de servicio',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        $foco->update($request->all());


        // Obtener aula para asignar ubicacion automáticamente
        $aula = Aula::findOrFail($request->aula_id);

        $data = $request->all();
        $data['ubicacion'] = $aula->ubicacion;

        $foco->update($data);

        return redirect()->route('focos.index')->with('success', 'Foco actualizado correctamente.');
    }

    public function destroy(Foco $foco) {
        $foco->delete();

        return redirect()->route('focos.index')->with('success', 'Foco eliminado correctamente.');
    }

 
}
