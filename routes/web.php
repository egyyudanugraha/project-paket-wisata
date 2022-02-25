<?php

use App\Http\Controllers\AdminPaketController;
use App\Http\Controllers\AdminPlaceController;
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

Route::get('/', function () {
    // return view('welcome');
    return view('index');
});

Route::resource('/admin/paket', AdminPaketController::class);
Route::resource('/admin/place', AdminPlaceController::class);
