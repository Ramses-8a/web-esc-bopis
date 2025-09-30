<?php

use App\Http\Controllers\Api\PlatilloController;
use App\Http\Controllers\Api\UserMovilController;
use App\Http\Controllers\Api\CarritoController;
use App\Http\Controllers\Api\PedidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return 'hola mundo';
});

// UserMovilController Routes
Route::post('/register', [UserMovilController::class, 'store']);
Route::post('/login', [UserMovilController::class, 'login']);

// PlatilloController Routes
Route::get('/platillos', [PlatilloController::class, 'index']);
Route::post('/platillos', [PlatilloController::class, 'store']);

// CarritoController Routes
Route::get('/carrito', [CarritoController::class, 'index']);
Route::post('/carrito', [CarritoController::class, 'store']);
Route::post('/carrito/remove', [CarritoController::class, 'destroy']);
Route::post('/carrito/clear', [CarritoController::class, 'clearCart']);

// PedidoController Routes
Route::get('/pedidos', [PedidoController::class, 'index']);
Route::post('/pedidos', [PedidoController::class, 'store']);
Route::get('/pedidos/user/{fk_usuario}', [PedidoController::class, 'showByUserMovil']);
