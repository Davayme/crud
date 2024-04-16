<?php
use App\Http\Controllers\estudianteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/estudiantes', [estudianteController::class, 'index']);
Route::post('/estudiantes', [estudianteController::class, 'store']);
Route::get('/estudiantes/create', [estudianteController::class, 'create']);
Route::delete('/estudiantes/{id}', [estudianteController::class, 'destroy']);
