<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Chamadas básicas da api
Route::get("/tasks/{task}", [TarefaController::class, "get"]);
Route::get("/tasks", [TarefaController::class, "index"]);
Route::post("/tasks", [TarefaController::class, "store"]);
Route::put("/tasks/{task}", [TarefaController::class, "update"]);
Route::delete("/tasks/{task}", [TarefaController::class, "delete"]);
