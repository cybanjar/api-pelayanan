<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

use App\Http\Controllers\API\PengaduanController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/pengaduan', [PengaduanController::class, 'index']);
    Route::post('/pengaduan', [PengaduanController::class, 'store']);
    Route::get('pengaduan/{id}', [PengaduanController::class, 'show']);
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy']);
    Route::put('/pengaduan/{id}', [PengaduanController::class, 'update']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);