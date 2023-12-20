<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\JuaraController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PengajuanBimbinganController;
use App\Http\Controllers\PengajuanJudulController;
use App\Http\Controllers\PengajuanProposalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'landing_page.index');
Route::view('/lomba', 'landing_page.pages.detailLomba');
// Route::view('/login', 'landing_page.pages.login');
// Route::view('/register', 'landing_page.pages.register');
Route::view('/forgetPassword', 'landing_page.pages.forgetPassword');
Route::view('/changePassword', 'landing_page.pages.changePassword');
Route::view('/verified', 'landing_page.pages.verified');
Route::view('/daftarLomba', 'landing_page.pages.daftarLomba');

Auth::routes();
Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
    Route::view('/', 'admin_page.index');
    Route::resource('/blog', BlogController::class);
    Route::resource('/lomba', LombaController::class);
    Route::resource('/faq', FaqController::class);
    Route::resource('/juara', JuaraController::class);
    Route::resource('/pengajuanBimbingan', PengajuanBimbinganController::class);
    Route::get('/pengajuanBimbingan/updateAccept/{id}', [PengajuanBimbinganController::class, 'updateAccept'])->name('pengajuanBimbingan.updateAccept');
    Route::get('/pengajuanBimbingan/updateDecline/{id}', [PengajuanBimbinganController::class, 'updateDecline'])->name('pengajuanBimbingan.updateDecline');
    Route::resource('/pengajuanJudul', PengajuanJudulController::class);
    Route::resource('/pengajuanProposal', PengajuanProposalController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
