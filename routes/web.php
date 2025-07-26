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
    ReservaController
};
use App\Models\Aula;
use App\Http\Controllers\AireAcondicionadoHistorialController;



// Ruta principal que muestra todas las aulas
Route::get('/', function () {
    $aulas = Aula::all();
    return view('inicio', compact('aulas'));
})->name('home');

// Recursos estándar
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

// Elimina esta línea duplicada porque ya existe con resource
// Route::put('aireacondicionados', [AireAcondicionadoController::class, 'update'])->name('aireacondicionados.update');

Route::get('/focos', [FocoController::class, 'index'])->name('focos.index');
Route::get('/focos/create', [FocoController::class, 'create'])->name('focos.create');
Route::post('/focos', [FocoController::class, 'store'])->name('focos.store');
Route::get('/focos/{foco}/edit', [FocoController::class, 'edit'])->name('focos.edit');
Route::put('/focos/{foco}', [FocoController::class, 'update'])->name('focos.update');
Route::delete('/focos/{foco}', [FocoController::class, 'destroy'])->name('focos.destroy');


Route::resource('aireacondicionados', AireAcondicionadoController::class);

Route::resource('historialaireacondicionado', AireAcondicionadoHistorialController::class);
