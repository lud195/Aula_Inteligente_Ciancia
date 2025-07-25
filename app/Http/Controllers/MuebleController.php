<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use Illuminate\Http\Request;

class MuebleController extends Controller
{
    public function index() {
        $muebles = Mueble::all();
        return view('muebles.index', compact('muebles'));
    }

    public function create() {
        return view('muebles.create');
    }

    public function store(Request $request) {
        Mueble::create($request->all());
        return redirect()->route('muebles.index')->with('success', 'Mueble creado correctamente.');
    }

    public function show(Mueble $mueble) {
        return view('muebles.show', compact('mueble'));
    }

    public function edit(Mueble $mueble) {
        return view('muebles.edit', compact('mueble'));
    }

    public function update(Request $request, Mueble $mueble) {
        $mueble->update($request->all());
        return redirect()->route('muebles.index')->with('success', 'Mueble actualizado correctamente.');
    }

    public function destroy(Mueble $mueble) {
        $mueble->delete();
        return redirect()->route('muebles.index')->with('success', 'Mueble eliminado correctamente.');
    }
}
