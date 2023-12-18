<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\JuaraController;
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
Route::view('/login', 'landing_page.pages.login');
Route::view('/register', 'landing_page.pages.register');
Route::view('/forgetPassword', 'landing_page.pages.forgetPassword');
Route::view('/changePassword', 'landing_page.pages.changePassword');
Route::view('/verified', 'landing_page.pages.verified');
Route::view('/daftarLomba', 'landing_page.pages.daftarLomba');

Route::view('/admin', 'admin_page.index');
Route::resource('/admin/blog', BlogController::class);
Route::resource('/admin/lomba', LombaController::class);
Route::resource('/admin/faq', FaqController::class);
Route::resource('/admin/juara', JuaraController::class);
Route::resource('/admin/pengajuanBimbingan', PengajuanBimbinganController::class);
Route::resource('/admin/pengajuanJudul', PengajuanJudulController::class);
Route::resource('/admin/PengajuanProposal', PengajuanProposalController::class);