<?php

use App\Http\Controllers\API\LombaController;
use App\Http\Controllers\API\PendaftaranController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/get-data-lomba')
    ->group(function () {
        Route::get('/', [LombaController::class, 'getDataLomba']);
        Route::get('/{id}', [LombaController::class, 'getDataLombaById']);
    });

Route::post('/register', [PendaftaranController::class, 'register']);
Route::post('/login', [PendaftaranController::class, 'login']);
Route::post('/get-data-kelompok', [PendaftaranController::class, 'getDataKelompok']);
Route::post('/insert-kelompok', [PendaftaranController::class, 'insertKelompok']);
Route::get('/get-edit-kelompok', [PendaftaranController::class, 'getEditKelompok']);
Route::post('/edit', [PendaftaranController::class, 'edit']);