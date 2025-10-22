<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Http\RedirectResponse;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/docs', function (): RedirectResponse {
    // Redireciona para o endpoint de visualização do L5-Swagger
    return redirect()->to('api/documentation');
})->name('swagger.docs');

Route::get('/tasks', [TaskController::class, 'get']);
