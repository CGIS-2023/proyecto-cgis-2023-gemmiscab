<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::resource('pacientes', PacienteController::class);
Route::resource('farmaceuticos', FarmaceuticoController::class);
Route::resource('recetas', RecetaController::class);
Route::resource('medicamentos', MedicamentoController::class);
Route::resource('tipoMedicamentos', TipoMedicamentoController::class);

// Route::middleware(['auth'])->group(function () {
//     Route::resources([
//         'pacientes' => PacienteController::class,
//     ]);
//     Route::get('/pacientes-hoy', [PacienteController::class, 'pacientesHoy']);
// });



