<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\pruebaBD;
use App\Http\Controllers\comprasController;
use App\Http\Controllers\categoriascontroller;
use App\Http\Controllers\createusuarios;
use App\Http\Controllers\Roles;
use App\Http\Controllers\SanctumController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [SanctumController::class, 'login']);
Route::post('logout', [SanctumController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

    Route::put('updateusuarios',[createusuarios::class,'updatepersona']);
    Route::delete('eliminarusuario',[createusuarios::class,'deletePersona']);
    Route::get('getusuarios',[createusuarios::class,'getUsuarios']);

});