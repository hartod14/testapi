<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1Controller;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/v1')->group(function () {
    Route::get('/', [V1Controller::class, 'index'])->middleware('auth:api'); 
    Route::post('/login', [UserController::class, 'login']); 
    Route::post('/register', [UserController::class, 'register']); 
});

// Route::get('/logout', [AuthController::class, 'proccesslogout']);
