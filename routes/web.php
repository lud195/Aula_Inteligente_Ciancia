<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AireAcondicionadoController,
    CortinaController,
    DisponibilidadController,
    DocentesController,
    FocoController,
    HistorialUsuarioController,
    HorarioController,
    MateriaController,
    MuebleController,
    AulaController,
    ReservaController,
    AireAcondicionadoHistorialController
};
use App\Models\Aula;

// Ruta principal que muestra todas las aulas
Route::get('/', function () {
    $aulas = Aula::all();
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
Route::resource('focos', FocoController::class);

Route::resource('aireacondicionados', AireAcondicionadoController::class);

Route::resource('historialaireacondicionado', AireAcondicionadoHistorialController::class);

// Rutas específicas para focos anidados dentro de aulas (ejemplo)
// Puedes definir estas rutas para manejar focos dentro de aulas, si lo deseas.
Route::prefix('aulas/{aula}')->group(function () {
    Route::get('focos', [FocoController::class, 'indexPorAula'])->name('aulas.focos.index');
    Route::get('focos/create', [FocoController::class, 'createPorAula'])->name('aulas.focos.create');
    Route::post('focos', [FocoController::class, 'storePorAula'])->name('aulas.focos.store');
    Route::get('focos/{foco}', [FocoController::class, 'showPorAula'])->name('aulas.focos.show');
    Route::get('focos/{foco}/edit', [FocoController::class, 'editPorAula'])->name('aulas.focos.edit');
    Route::put('focos/{foco}', [FocoController::class, 'updatePorAula'])->name('aulas.focos.update');
    Route::delete('focos/{foco}', [FocoController::class, 'destroyPorAula'])->name('aulas.focos.destroy');
});

// Ruta para formulario general de creación de focos (opcional)
Route::get('/focos/general/create', [FocoController::class, 'createGeneral'])->name('focos.createGeneral');
Route::delete('/focos/{foco}', [FocoController::class, 'destroy'])->name('focos.destroy');
