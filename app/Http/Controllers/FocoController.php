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
            'ubicacion' => 'required|string',
            'intensidad' => 'required|integer|min:0|max:100',
            'tipo' => 'required|string',
            'estado' => 'required|boolean'
        ]);

        $aula->focos()->create(array_merge($request->all(), ['aula_id' => $aula->id]));

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
            'ubicacion' => 'required|string',
            'intensidad' => 'required|integer|min:0|max:100',
            'tipo' => 'required|string',
            'estado' => 'required|boolean'
        ]);

        $foco->update($request->all());

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
        return view('focos.create_general', compact('aulas'));
    }

    public function store(Request $request) {
        $request->validate([
            'codigo' => 'required|string|max:100|unique:focos,codigo',
            'ubicacion' => 'required|string',
            'intensidad' => 'required|integer|min:0|max:100',
            'tipo' => 'required|string',
            'estado' => 'required|boolean',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        Foco::create($request->all());

        return redirect()->route('focos.index')->with('success', 'Foco creado correctamente.');
    }

    public function edit(Foco $foco) {
        $aulas = Aula::all();
        return view('focos.edit_general', compact('foco', 'aulas'));
    }

    public function update(Request $request, Foco $foco) {
        $request->validate([
            'codigo' => 'required|string|max:100|unique:focos,codigo,' . $foco->id,
            'ubicacion' => 'required|string',
            'intensidad' => 'required|integer|min:0|max:100',
            'tipo' => 'required|string',
            'estado' => 'required|boolean',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        $foco->update($request->all());

        return redirect()->route('focos.index')->with('success', 'Foco actualizado correctamente.');
    }

    public function destroy(Foco $foco) {
        $foco->delete();

        return redirect()->route('focos.index')->with('success', 'Foco eliminado correctamente.');
    }
}
