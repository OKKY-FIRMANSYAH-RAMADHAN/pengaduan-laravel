<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('login/auth', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'viewRegister'])->name('register');
Route::post('register/auth', [AuthController::class, 'register'])->name('auth.register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/nonverif', [UserController::class, 'userNonverif'])->name('user.nonverif');
    Route::get('/akun-saya', [UserController::class, 'akun'])->name('akun');
});

Route::prefix('user')->middleware('user')->group(function () {
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.user');
    // Route::get('/user', [UserController::class, 'index'])->name('user');
    // Route::get('/user/nonverif', [UserController::class, 'userNonverif'])->name('user.nonverif');
    // Route::get('/akun-saya', [UserController::class, 'akun'])->name('akun');
});
