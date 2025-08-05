<?php

namespace App\Http\Controllers;

use App\Models\Foco;
use App\Models\HistorialFoco;
use Illuminate\Http\Request;

class HistorialFocoController extends Controller
{
    public function index(Foco $foco)
    {
        $historiales = $foco->historiales()->orderByDesc('fecha_cambio')->get();
        return view('focos.historial', compact('historiales', 'foco'));
    }

    public function create(Foco $foco)
    {
        return view('focos.crear_historial', compact('foco'));
    }

    public function store(Request $request)
{
    $request->validate([
        'foco_id' => 'required|exists:focos,id',
        'fecha_cambio' => 'required|date',
        'hora_inicio' => 'required',
        'hora_fin' => 'required',
        'accion' => 'required|in:revisado,cambiado,reparado,fuera de servicio',
        'estado' => 'required|in:apagado,encendido,en reparación,fuera de servicio'
    ]);

    HistorialFoco::create([
        'foco_id' => $request->foco_id,
        'fecha_cambio' => $request->fecha_cambio,
        'hora_inicio' => $request->hora_inicio,
        'hora_fin' => $request->hora_fin,
        'accion' => $request->accion,
        'estado' => $request->estado,
    ]);

    return redirect()->route('focos.historial.index', ['foco' => $request->foco_id])

        ->with('success', 'Historial creado correctamente.');
}
public function edit($id)
{
    $historialfoco = HistorialFoco::findOrFail($id);
    // también pasa $focos si necesitas en el select
    $focos = Foco::all();
    return view('historialfocos.edit', compact('historialfoco', 'focos'));
}


}
