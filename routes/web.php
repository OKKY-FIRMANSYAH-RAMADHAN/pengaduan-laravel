<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/nonverif', [UserController::class, 'userNonverif'])->name('user.nonverif');
    Route::get('/akun-saya', [UserController::class, 'akun'])->name('akun');

    // // Identitas
    // Route::controller(IdentitasController::class)->prefix('/identitas')->group(function () {
    //     Route::get('/', 'index')->name('administrator.identitas');
    //     Route::put('/', 'update');
    //     Route::post('/', 'store');
    // });
});
