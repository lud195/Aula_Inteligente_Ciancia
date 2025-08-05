<?php

use App\Http\Controllers\AulaController;
use App\Http\Controllers\FocoController;
use App\Http\Controllers\HistorialFocoController;
use App\Http\Controllers\CortinaController;
use App\Http\Controllers\DisponibilidadController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\HistorialUsuarioController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MuebleController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AireAcondicionadoController;
use App\Http\Controllers\AireAcondicionadoHistorialController;

// Ruta principal que muestra todas las aulas
Route::get('/', function () {
    $aulas = \App\Models\Aula::all();
    return view('inicio', compact('aulas'));
})->name('home');

// Rutas recursos estándar
Route::resource('aulas', AulaController::class);
Route::resource('cortinas', CortinaController::class);
Route::resource('disponibilidades', DisponibilidadController::class);
Route::resource('docentes', DocentesController::class);
Route::resource('historialusuarios', HistorialUsuarioController::class);
Route::resource('horarios', HorarioController::class);
Route::resource('materias', MateriaController::class);
Route::resource('muebles', MuebleController::class);
Route::resource('reservas', ReservaController::class);
Route::resource('aireacondicionados', AireAcondicionadoController::class);
Route::resource('historialaireacondicionado', AireAcondicionadoHistorialController::class);

// Rutas generales para focos
Route::get('/focos', [FocoController::class, 'index'])->name('focos.index');
Route::get('/focos/create', [FocoController::class, 'create'])->name('focos.create');
Route::post('/focos', [FocoController::class, 'store'])->name('focos.store');
Route::get('/focos/{foco}', [FocoController::class, 'show'])->name('focos.show');
Route::get('/focos/{foco}/edit', [FocoController::class, 'edit'])->name('focos.edit');
Route::put('/focos/{foco}', [FocoController::class, 'update'])->name('focos.update');
Route::delete('/focos/{foco}', [FocoController::class, 'destroy'])->name('focos.destroy');

// Rutas para historial general de focos
Route::get('/focos/{foco}/historial', [HistorialFocoController::class, 'index'])->name('focos.historial.index');
Route::post('/historial_focos', [HistorialFocoController::class, 'store'])->name('historial_focos.store');

// Rutas anidadas: focos dentro de aulas
Route::prefix('aulas/{aula}')->group(function () {
    Route::get('focos', [FocoController::class, 'indexPorAula'])->name('aulas.focos.index');
    Route::get('focos/create', [FocoController::class, 'createPorAula'])->name('aulas.focos.create');
    Route::post('focos', [FocoController::class, 'storePorAula'])->name('aulas.focos.store');
    Route::get('focos/{foco}', [FocoController::class, 'showPorAula'])->name('aulas.focos.show');
    Route::get('focos/{foco}/edit', [FocoController::class, 'editPorAula'])->name('aulas.focos.edit');
    Route::put('focos/{foco}', [FocoController::class, 'updatePorAula'])->name('aulas.focos.update');
    Route::delete('focos/{foco}', [FocoController::class, 'destroyPorAula'])->name('aulas.focos.destroy');

    // 🔁 Historial de un foco dentro de un aula
    Route::get('focos/{foco}/historial', [FocoController::class, 'historial'])->name('aulas.focos.historial.index');
});
