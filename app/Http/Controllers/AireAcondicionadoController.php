<?php

namespace App\Http\Controllers;

use App\Models\AireAcondicionado;
use App\Models\HistorialUsoAire;
use Illuminate\Http\Request;

class AireAcondicionadoController extends Controller
{
    public function index()
    {
        $aires = AireAcondicionado::with('aula')->get();
        return view('aire_acondicionado.index', compact('aires'));
    }

    public function create()
    {
        $aulas = \App\Models\Aula::all(); // Trae todas las aulas
        return view('aire_acondicionado.create', compact('aulas')); // Envía la variable a la vista
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

        return redirect()->route('aireacondicionados.index')->with('success', 'Aire acondicionado creado correctamente');
    }

    public function show(AireAcondicionado $aire)
    {
        $historial = $aire->historialUsos()->orderBy('fecha', 'desc')->get();
        return view('aire_acondicionado.show', compact('aire', 'historial'));
    }

    public function edit(AireAcondicionado $aire)
    {
        return view('aire_acondicionado.edit', compact('aire'));
    }

    public function update(Request $request, AireAcondicionado $aire)
    {
        $data = $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'estado' => 'required|in:Encendido,Apagado,En mantenimiento',
            'mantenimiento' => 'required|in:Al día,Pendiente,En proceso',
        ]);

        $aire->update($data);

        return redirect()->route('aireacondicionados.show', $aire->id)->with('success', 'Aire acondicionado actualizado correctamente');
    }
}
