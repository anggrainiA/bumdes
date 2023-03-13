<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\DataAkunController;
use App\Http\Controllers\DataHutangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProfilPengelolaController;
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


Route::get('/',  [LoginController::class, 'index'])->name('login');
Route::post('/login',  [LoginController::class, 'login'])->name('authenticate');
Route::post('/logout',  [LoginController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/Dashboard',  [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// Route::get('/Profil',  [ProfilController::class, 'index'])->name('dashboard')->middleware('auth');

// ?Route::resource('/pelanggan', PelangganController::class,)->except(['create', 'edit', 'show']);


Route::group(['prefix' => 'Master Data', 'middleware' => ['auth','Role:Ketua,Bendahara'] ],function () {
    Route::get('/Pengelola',  [PengelolaController::class, 'index'])->name('pengelola');
    Route::get('/Data Akun',  [DataAkunController::class, 'index'])->name('dataakun');
});
Route::group(['prefix' => 'Master Data', 'middleware' => ['auth','Role:Ketua' ]], function () {
    Route::get('/Pemasok',  [PemasokController::class, 'index'])->name('pemasok');
    // Route::get('/Pelanggan',  [PelangganController::class, 'index'])->name('pelanggan');
    Route::get('/Data Hutang',  [DataHutangController::class, 'index'])->name('datahutang');
    Route::get('/ProfilBumdes',  [ProfilBumdesController::class, 'index'])->name('profilbumdes');

    //insert
    Route::post('/Pengelola/Tambah',  [PengelolaController::class, 'tambah'])->name('tambahPengelola');
    Route::post('/Pengelola/Edit',  [PengelolaController::class, 'edit'])->name('editpengelola');
    Route::post('/Pengelola/Delete/{id}',  [PengelolaController::class, 'delete'])->name('deletePengelola');
});

Route::get('/profiluser', [ProfilPengelolaController::class, 'index'])->name('get.profiluser');
Route::post('/profiluser', [ProfilPengelolaController::class, 'index'])->name('post.profiluser');

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');

// Route::post('pelanggan', [PelangganController::class, 'index'])->name('post.profiluser');


    // Route::middleware(['Role:Bendahara'])->group(function () {
// Route::get('/Pengelola',  [PengelolaController::class, 'index'])->name('pengelola')->middleware('Role:Bendahara');
    // });
