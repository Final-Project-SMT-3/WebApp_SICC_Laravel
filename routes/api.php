<?php

use App\Http\Controllers\API\LombaController;
use App\Http\Controllers\API\PendaftaranController;
use App\Http\Controllers\API\KelompokController;
use App\Http\Controllers\API\DosenController;
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

// Route::prefix('/get-data-lomba')
//     ->group(function () {
//         Route::get('/', [LombaController::class, 'getDataLomba']);
//         Route::get('/{id}', [LombaController::class, 'getDataLombaById']);
//     });

// Pengajuan Controller
Route::post('/register', [PendaftaranController::class, 'register']);
Route::post('/login', [PendaftaranController::class, 'login']);
Route::post('/get-otp', [PendaftaranController::class, 'emailVerification']);
Route::post('/email-verification', [PendaftaranController::class, 'checkVerification']);
Route::post('/forget-password', [PendaftaranController::class, 'forgetPassword']);

// Kelompok Controller
Route::post('/get-data-kelompok', [KelompokController::class, 'getDataKelompok']);
Route::post('/insert-kelompok', [KelompokController::class, 'insertKelompok']);
Route::get('/get-edit-kelompok', [KelompokController::class, 'getEditKelompok']);
Route::post('/edit', [KelompokController::class, 'edit']);

// Lomba Controller
Route::get('/get-data-lomba', [LombaController::class, 'getDataLomba']);
Route::post('/get-data-lomba-id', [LombaController::class, 'getDataLombaById']);

// Dosen Controller
Route::get('get-data-dosen', [DosenController::class, 'getDosen']);
Route::post('/get-data-dosen-id', [DosenController::class, 'getDosenById']);