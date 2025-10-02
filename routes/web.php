<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

// Mostrar lista
Route::get('/productos', [ProductosController::class, 'metodo_mostrar_lista']);

// Ver detalle
Route::get('/ver-productos/{id}', [ProductosController::class, 'metodo_ver_producto']);

// Mostrar formulario de agregar
Route::get('/agregar_producto', [ProductosController::class, 'metodo_mostrar_form']);

// Guardar producto (cuando se envía el form)
Route::post('/agregar_producto', [ProductosController::class, 'metodo_agregar_producto']);

// Formulario editar
Route::get('/editar_producto/{id}', [ProductosController::class, 'metodo_mostrar_editar']);
Route::post('/editar_producto/{id}', [ProductosController::class, 'metodo_actualizar_producto']);

// Eliminar
Route::delete('/eliminar_producto/{id}', [ProductosController::class, 'metodo_eliminar_producto']);