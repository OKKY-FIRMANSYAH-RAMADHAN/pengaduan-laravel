<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('login/auth', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'viewRegister'])->name('register');
Route::post('register/auth', [AuthController::class, 'register'])->name('auth.register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/detail/{id}', [PengaduanController::class, 'detail']);
    Route::get('pengaduan/proses/{id}', [PengaduanController::class, 'proses']);
    Route::get('pengaduan/selesai/{id}', [PengaduanController::class, 'selesaikan']);
    Route::get('/proses/{id}', [PengaduanController::class, 'proses']);
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('admin.pengaduan');
    Route::get('/pengaduan/detail/{id}', [PengaduanController::class, 'detail']);
    Route::post('/pengaduan/filter-pengaduan', [PengaduanController::class, 'filterPengaduan']);
    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('/user/detail/{id}', [UserController::class, 'detail']);
    Route::get('/user/delete/{id}', [UserController::class, 'destroy']);
    Route::get('/user/nonverif', [UserController::class, 'userNonverif'])->name('admin.user.nonverif');
    Route::get('/user/nonverif/verifikasi/{id}', [UserController::class, 'verifikasi']);
    Route::get('/akun-saya', [UserController::class, 'akun'])->name('admin.akun');
});

Route::prefix('user')->middleware('user')->group(function () {

    // Pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('user.pengaduan');
    Route::post('/pengaduan/filter-pengaduan', [PengaduanController::class, 'filterPengaduan']);
    Route::get('/pengaduan/detail/{id}', [PengaduanController::class, 'detail']);
    Route::post('/pengaduan/insert', [PengaduanController::class, 'store'])->name('user.insert.pengaduan');
    Route::get('/pengaduan/delete/{id}', [PengaduanController::class, 'destroy']);
    Route::get('/akun-saya', [UserController::class, 'akun'])->name('user.akun');
    Route::post('changeimage', [UserController::class, 'updateGambar']);
    Route::post('update-user', [UserController::class, 'update']);
    Route::post('ganti-password', [UserController::class, 'gantiPassword']);
});
