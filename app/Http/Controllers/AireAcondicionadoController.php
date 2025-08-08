<?php

namespace App\Http\Controllers;

use App\Models\AireAcondicionado;
use Illuminate\Http\Request;

class AireAcondicionadoController extends Controller
{
    public function index()
    {
        $aires = AireAcondicionado::with('aula')->get();
        return view('aireacondicionados.index', compact('aires'));
    }
    

    public function show(AireAcondicionado $aireacondicionado)
    {
        $historial = \App\Models\HistorialUsoAire::orderBy('fecha', 'desc')->get();
    
        return view('aireacondicionados.show', compact('aireacondicionado', 'historial'));
    }
    

    public function edit(AireAcondicionado $aireacondicionado)
    {
        return view('aireacondicionados.edit', compact('aireacondicionado'));
    }

    public function update(Request $request, AireAcondicionado $aireacondicionado)
    {
        $data = $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'estado' => 'required|in:Encendido,Apagado,En mantenimiento',
            'mantenimiento' => 'required|in:Al día,Pendiente,En proceso',
        ]);

        $aireacondicionado->update($data);

        return redirect()->route('aireacondicionados.show', $aireacondicionado->id)
                         ->with('success', 'Detalles actualizados correctamente');
    }

    public function create()
    {
        $aulas = \App\Models\Aula::all();
        return view('aireacondicionados.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'estado' => 'required|in:Encendido,Apagado,En mantenimiento',
            'mantenimiento' => 'required|in:Al día,Pendiente,En proceso',
        ]);

        AireAcondicionado::create($data);

        return redirect()->route('aireacondicionados.index')->with('success', 'Aire acondicionado creado');
    }

    public function destroy(AireAcondicionado $aireacondicionado)
    {
        $aireacondicionado->delete();
        return redirect()->route('aireacondicionados.index')->with('success', 'Aire eliminado');
    }

    public function createHistorial($id)
{
    $aire = AireAcondicionado::findOrFail($id);
    return view('historialaireacondicionado.create', compact('aire'));
}

}
