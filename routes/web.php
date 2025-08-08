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
use Illuminate\Support\Facades\Route;

// Ruta principal
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

// Rutas para Aires Acondicionados
Route::resource('aireacondicionados', AireAcondicionadoController::class);

// Rutas anidadas para historial de aires acondicionados
Route::prefix('aireacondicionados/{aireacondicionado}')->group(function () {
    Route::get('historial', [AireAcondicionadoHistorialController::class, 'index'])->name('historialaireacondicionado.index');
    Route::get('historial/create', [AireAcondicionadoHistorialController::class, 'create'])->name('historialaireacondicionados.create');
    Route::post('historial', [AireAcondicionadoHistorialController::class, 'store'])->name('historialaireacondicionados.store');
    Route::get('historial/{historial}/edit', [AireAcondicionadoHistorialController::class, 'edit'])->name('historialaireacondicionados.edit');
    Route::put('historial/{historial}', [AireAcondicionadoHistorialController::class, 'update'])->name('historialaireacondicionados.update');
    Route::get('historial/{historial}', [AireAcondicionadoHistorialController::class, 'show'])->name('historialaireacondicionados.show');
    Route::delete('historial/{historial}', [AireAcondicionadoHistorialController::class, 'destroy'])->name('historialaireacondicionados.destroy');
});

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

    // Historial de un foco dentro de un aula
    Route::get('focos/{foco}/historial', [FocoController::class, 'historial'])->name('aulas.focos.historial.index');
});
