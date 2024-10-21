<?php

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

// Route::post('sesion', [SanctumController::class, 'login']);
Route::post('usuarios',[createusuarios::class,'guardar']);



Route::post('roles',[Roles::class,'crear']);
Route::put('updateroles',[Roles::class,'updateRol']);
Route::delete('eliminarroles',[Roles::class,'deleteRol']);
Route::get('getroles',[Roles::class,'getRols']);

Route::post('compras',[comprasController::class,'crear']);
Route::put('updatecompras',[comprasController::class,'updateCompra']);
Route::delete('eliminarcompras',[comprasController::class,'deleteCompra']);

Route::get('getcategorias',[categoriascontroller::class,'getCategorias']);
Route::post('categorias',[categoriascontroller::class,'crearCategoria']);
Route::put('updatecategorias',[categoriascontroller::class,'updateCategoria']);
Route::delete('eliminarcategorias',[categoriascontroller::class,'deleteCategoria']);

//Clientes
Route::get('getclientes',[ClientesController::class,'getClientes']);
Route::post('clientes',[ClientesController::class,'crearCliente']);
Route::put('updateclientes',[ClientesController::class,'updateCliente']);   
Route::delete('eliminarclientes',[ClientesController::class,'deleteCliente']);

//compras
Route::get('compras',[comprasController::class,'getCompras']);
Route::post('compras',[comprasController::class,'crearCompra']);
Route::put('updatecompras',[comprasController::class,'updateCompra']);
Route::delete('eliminarcompras',[comprasController::class,'deleteCompra']);

//Detalleventa
Route::post('/detalle-ventas', [DetalleVentaController::class, 'crearDetalleVenta']);
Route::get('/detalle-ventas', [DetalleVentaController::class, 'getDetalleVentas']);
Route::put('/detalle-ventas/{id}', [DetalleVentaController::class, 'updateDetalleVenta']);
Route::delete('/detalle-ventas/{id}', [DetalleVentaController::class, 'deleteDetalleVenta']);

//inventario
Route::post('/inventario', [InventarioController::class, 'insertarinventario']);
Route::get('/inventario', [InventarioController::class, 'getinventario']);
Route::put('/inventario', [InventarioController::class, 'updateinventario']);
Route::delete('/inventario', [InventarioController::class, 'deleteinventario']);


//Producto
Route::post('/productos', [ProductoController::class, 'crearProducto']);
Route::get('/productos', [ProductoController::class, 'getProductos']);
Route::put('/productos', [ProductoController::class, 'updateProducto']);    
Route::delete('/productos', [ProductoController::class, 'deleteProducto']);

//ventas
Route::post('/ventas', [VentaController::class, 'crearVenta']);
Route::get('/ventas', [VentaController::class, 'getVentas']);
Route::put('/ventas', [VentaController::class, 'updateVenta']);    
Route::delete('/ventas', [VentaController::class, 'deleteVenta']);