<?php
use App\Http\Controllers\estudianteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buscar', function () {
    return view('estudiante.buscar');
});

Route::get('/buscar', [EstudianteController::class, 'show'])->name('estudiantes.buscar');

Route::get('/estudiantes', [estudianteController::class, 'index']);
Route::post('/estudiantes', [estudianteController::class, 'store']);
Route::get('/estudiantes/create', [estudianteController::class, 'create']);
Route::put('/estudiantes/{cedula}', [estudianteController::class, 'update'])->name('estudiantes.update');
Route::delete('/estudiantes/{id}', [estudianteController::class, 'destroy']);

