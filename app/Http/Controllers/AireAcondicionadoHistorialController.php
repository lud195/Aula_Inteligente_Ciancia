<?php

namespace App\Http\Controllers;

use App\Models\AireAcondicionado;
use App\Models\HistorialUsoAire;
use Illuminate\Http\Request;

class AireAcondicionadoHistorialController extends Controller
{
    public function store(Request $request, $aireId)
    {
        $aire = AireAcondicionado::findOrFail($aireId);

        $data = $request->validate([
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'nullable',
            'temperatura' => 'nullable|string',
        ]);

        $data['aire_acondicionado_id'] = $aire->id;

        HistorialUsoAire::create($data);

        return redirect()->route('aire.show', $aire->id)->with('success', 'Registro de historial agregado correctamente');
    }
}
