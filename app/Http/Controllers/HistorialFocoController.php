<?php
namespace App\Http\Controllers;

use App\Models\HistorialFoco;
use App\Models\Foco;
use Illuminate\Http\Request;

class HistorialFocoController extends Controller
{
    public function index(Foco $foco)
    {
        $historialfocos = $foco->historialFocos()->get();
        return view('historialfocos.index', compact('foco', 'historialfocos'));
    }

    public function create(Foco $foco)
    {
        return view('historialfocos.create', compact('foco'));
    }

    public function store(Request $request, Foco $foco)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'nullable',
            'estado' => 'required|string',
        ]);

        $foco->historialFocos()->create($validated);

        return redirect()->route('focos.historialfocos.index', $foco)->with('success', 'Historial creado correctamente.');
    }

    public function show(Foco $foco, HistorialFoco $historialfoco)
    {
        return view('historialfocos.show', compact('foco', 'historialfoco'));
    }

    public function edit(Foco $foco, HistorialFoco $historialfoco)
    {
        return view('historialfocos.edit', compact('foco', 'historialfoco'));
    }

    public function update(Request $request, Foco $foco, HistorialFoco $historialfoco)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'nullable',
            'estado' => 'required|string',
        ]);

        $historialfoco->update($validated);

        return redirect()->route('focos.historialfocos.index', $foco)->with('success', 'Historial actualizado correctamente.');
    }

    public function destroy(Foco $foco, HistorialFoco $historialfoco)
    {
        $historialfoco->delete();

        return redirect()->route('focos.historialfocos.index', $foco)->with('success', 'Historial eliminado correctamente.');
    }
}
