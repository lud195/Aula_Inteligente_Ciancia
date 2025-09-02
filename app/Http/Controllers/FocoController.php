<?php

namespace App\Http\Controllers;

use App\Models\Foco;
use App\Models\Aula;
use App\Models\HistorialFoco;
use Illuminate\Http\Request;

class FocoController extends Controller
{
    // --- FOCOS ANIDADOS DENTRO DE AULAS ---
    public function indexPorAula(Aula $aula)
    {
        $focos = $aula->focos;
        return view('focos.index', compact('focos', 'aula'));
    }

    public function createPorAula(Aula $aula)
    {
        return view('focos.create', compact('aula'));
    }

    public function storePorAula(Request $request, Aula $aula)
    {
        $request->validate([
            'codigo' => 'required|string|max:100',
            'intensidad' => 'required|integer|min:0|max:100',
            'tipo' => 'required|string',
            'estado' => 'required|string|in:encendido,apagado'
        ]);

        $data = $request->all();
        $data['ubicacion'] = $aula->ubicacion;
        $data['aula_id'] = $aula->id;

        $aula->focos()->create($data);

        return redirect()->route('aulas.focos.index', $aula)->with('success', 'Foco creado correctamente.');
    }

    public function showPorAula(Aula $aula, Foco $foco)
    {
        return view('focos.show', compact('foco', 'aula'));
    }

    public function editPorAula(Aula $aula, Foco $foco)
    {
        return view('focos.edit', compact('foco', 'aula'));
    }

    public function updatePorAula(Request $request, Aula $aula, Foco $foco)
    {
        $request->validate([
            'codigo' => 'required|string|max:100',
            'intensidad' => 'required|integer|min:0|max:100',
            'tipo' => 'required|string',
            'estado' => 'required|string|in:encendido,apagado'
        ]);

        $data = $request->all();
        $data['ubicacion'] = $aula->ubicacion;
        $data['aula_id'] = $aula->id;

        $foco->update($data);

        return redirect()->route('aulas.focos.index', $aula)->with('success', 'Foco actualizado correctamente.');
    }

    public function destroyPorAula(Aula $aula, Foco $foco)
    {
        $foco->delete();
        return redirect()->route('aulas.focos.index', $aula)->with('success', 'Foco eliminado correctamente.');
    }

    // --- FOCOS GENERALES (NO ANIDADOS) ---
    public function index()
    {
        $focos = Foco::with('aula')->get();
        return view('focos.general', compact('focos'));
    }

    public function create()
    {
        $aulas = Aula::all();
    
        // Generar un código único automáticamente (FOCO-001, FOCO-002, etc.)
        $ultimo = Foco::latest('id')->first();
        $numero = $ultimo ? $ultimo->id + 1 : 1;
        $codigo = 'FOCO-' . str_pad($numero, 3, '0', STR_PAD_LEFT);
    
        return view('focos.create', compact('aulas', 'codigo'));
    }
    

    public function createGeneral()
    {
        $aulas = Aula::all();
        return view('focos.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:100|unique:focos,codigo',
            'intensidad' => 'required|integer|min:0|max:100',
            'tipo' => 'required|string',
            'estado' => 'required|string|in:encendido,apagado',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        $aula = Aula::findOrFail($request->aula_id);

        $data = $request->all();
        $data['ubicacion'] = $aula->ubicacion;

        Foco::create($data);

        return redirect()->route('focos.index')->with('success', 'Foco creado correctamente.');
    }

    public function show(Foco $foco)
    {
        return view('focos.show', compact('foco'));
    }

    public function edit(Foco $foco)
    {
        $aulas = Aula::all();
        return view('focos.edit', compact('foco', 'aulas'));
    }

    public function update(Request $request, Foco $foco)
    {
        $request->validate([
            'codigo' => 'required|string|max:100',
            'intensidad' => 'required|integer|min:0|max:100',
            'tipo' => 'required|string',
            'estado' => 'required|in:apagado,encendido,en reparación,fuera de servicio',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        $aula = Aula::findOrFail($request->aula_id);
        $data = $request->all();
        $data['ubicacion'] = $aula->ubicacion;

        $foco->update($data);

        return redirect()->route('focos.index')->with('success', 'Foco actualizado correctamente.');
    }

    public function destroy(Foco $foco)
    {
        $foco->delete();
        return redirect()->route('focos.index')->with('success', 'Foco eliminado correctamente.');
    }

    // --- HISTORIAL ---
    public function historial(Foco $foco)
    {
        $foco->load('aula'); // Cargar aula relacionada
    
        $aula = $foco->aula;
    
        $historiales = $foco->historiales()->orderByDesc('fecha_cambio')->get();
    
        return view('focos.historial', compact('foco', 'historiales', 'aula'));
    }
    
    
    
}
