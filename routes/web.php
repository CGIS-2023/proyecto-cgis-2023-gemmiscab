<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\FarmaceuticoController;
use App\Http\Controllers\TipoMedicamentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'pacientes' => PacienteController::class,
        'recetas' => RecetaController::class,
    ]);
    Route::get('/pacientes-hoy', [PacienteController::class, 'pacientesHoy']);
    Route::get('/farmaceuticos', [FarmaceuticoController::class, 'index'])->name('farmaceuticos.index');
    Route::get('/farmaceuticos/{farmaceutico}', [FarmaceuticoController::class, 'show'])->name('farmaceuticos.show');
});

Route::middleware(['auth', 'tipo_usuario:3'])->group(function () {
    Route::get('farmaceuticos.create', [FarmaceuticoController::class, 'create'])->name('farmaceuticos.create');
    Route::post('/farmaceuticos', [FarmaceuticoController::class, 'store'])->name('farmaceuticos.store');
    Route::delete('/farmaceuticos/{farmaceutico}', [FarmaceuticoController::class, 'destroy'])->name('farmaceuticos.destroy');
    Route::resources([
        'medicamentos' => MedicamentoController::class,
    ]);
});

Route::middleware(['auth', 'tipo_usuario:1,3'])->group(function () {
    Route::get('/farmaceuticos/{farmaceutico}/edit', [FarmaceuticoController::class, 'edit'])->name('farmaceuticos.edit');
    Route::put('/farmaceuticos/{farmaceutico}', [FarmaceuticoController::class, 'update'])->name('farmaceuticos.update');
    Route::post('/recetas/{receta}/attach-medicamento', [RecetaController::class, 'attach_medicamento'])
        ->name('recetas.attachMedicamento')
        ->middleware('can:attach_medicamento,receta');
    Route::delete('/recetas/{receta}/detach-medicamento/{medicamento}', [RecetaController::class, 'detach_medicamento'])
        ->name('recetas.detachMedicamento')
        ->middleware('can:detach_medicamento,receta');
});

Route::resource('pacientes', PacienteController::class);
Route::resource('farmaceuticos', FarmaceuticoController::class);
Route::resource('recetas', RecetaController::class);
Route::resource('medicamentos', MedicamentoController::class);
Route::resource('tipoMedicamentos', TipoMedicamentoController::class);

