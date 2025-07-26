<?php
namespace App\Http\Controllers;

use App\Models\HistorialUsoAire;
use Illuminate\Http\Request;

class AireAcondicionadoHistorialController extends Controller
{
    public function create()
    {
        return view('aireacondicionados.historial_create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'nullable',
            'temperatura' => 'nullable|string',
        ]);

        HistorialUsoAire::create($data);

        return redirect()->back()->with('success', 'Historial agregado correctamente');
    }
}
