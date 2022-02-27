<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPaketController;
use App\Http\Controllers\AdminPlaceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDashboardController;
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




Route::middleware(['guest'])->group(function(){
    Route::get('/register', [AuthController::class, 'view_register'])->name('view_regist');
    Route::post('/register', [AuthController::class, 'register'])->name('regist_post');
    
    Route::get('/login', [AuthController::class, 'view_login'])->name('view_login');
    Route::post('/login', [AuthController::class, 'login'])->name('login_post');
});

Route::middleware(['auth', 'checklevel:admin'])->group(function(){
    Route::get('/admin', [AdminDashboardController::class, 'index']);
    Route::resource('/admin/paket', AdminPaketController::class);
    Route::resource('/admin/place', AdminPlaceController::class);
});

Route::middleware(['auth', 'checklevel:user'])->group(function(){
    Route::get('/', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/riwayat', [UserDashboardController::class, 'riwayat'])->name('riwayat');
    Route::get('/paket/{id}', [UserDashboardController::class, 'detail_paket'])->name('detail_paket');
    Route::post('/beli', [UserDashboardController::class, 'beli'])->name('beli');
});

Route::middleware(['auth', 'checklevel:admin,user'])->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});