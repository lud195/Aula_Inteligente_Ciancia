<?php
namespace App\Http\Controllers;

use App\Models\HistorialUsoAire;
use App\Models\AireAcondicionado;
use Illuminate\Http\Request;

class AireAcondicionadoHistorialController extends Controller
{
    public function index($aireacondicionado_id)
    {
        $aireacondicionado = AireAcondicionado::findOrFail($aireacondicionado_id);
        $historial = $aireacondicionado->historial()->orderBy('fecha', 'desc')->get();

        return view('historialaireacondicionado.index', compact('aireacondicionado', 'historial'));
    }

    public function create($aireacondicionado_id)
    {
        $aireacondicionado = AireAcondicionado::findOrFail($aireacondicionado_id);
        return view('historialaireacondicionado.create', compact('aireacondicionado'));
    }

    public function store(Request $request, $aireacondicionado_id)
    {
        $data = $request->validate([
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'nullable',
            'temperatura' => 'nullable|string',
        ]);

        $data['aire_acondicionado_id'] = $aireacondicionado_id;

        HistorialUsoAire::create($data);

        return redirect()->route('historialaireacondicionado.index', $aireacondicionado_id)
                         ->with('success', 'Historial agregado correctamente');
    }

    public function edit($aireacondicionado_id, HistorialUsoAire $historial)
    {
        $aireacondicionado = AireAcondicionado::findOrFail($aireacondicionado_id);
        return view('historialaireacondicionado.edit', compact('aireacondicionado', 'historial'));
    }

    public function update(Request $request, $aireacondicionado_id, HistorialUsoAire $historial)
    {
        $data = $request->validate([
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'nullable',
            'temperatura' => 'nullable|string',
        ]);

        $historial->update($data);

        return redirect()->route('historialaireacondicionado.index', $aireacondicionado_id)
                         ->with('success', 'Historial actualizado correctamente');
    }

    public function show($aireacondicionado_id, HistorialUsoAire $historial)
    {
        $aireacondicionado = AireAcondicionado::findOrFail($aireacondicionado_id);
        return view('historialaireacondicionado.show', compact('aireacondicionado', 'historial'));
    }

    public function destroy($aireacondicionado_id, HistorialUsoAire $historial)
    {
        $historial->delete();

        return redirect()->route('historialaireacondicionado.index', $aireacondicionado_id)
                         ->with('success', 'Registro eliminado correctamente');
    }
}
