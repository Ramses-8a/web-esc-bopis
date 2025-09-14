<?php

use App\Http\Controllers\Api\UserMovilController;
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

// Route::apiResource('/user-movil', Api\UserMovilController::class);
Route::post('/register', [UserMovilController::class, 'store'])->name('register');
Route::post('/login', [UserMovilController::class, 'login'])->name('login');

Route::get('/register', function(){
    return 'los cosos';
});

