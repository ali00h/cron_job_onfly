<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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



Route::post('login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::get('signout', [LoginController::class, 'signout'])->name('login.signout');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('log-detail/{id}/{pagenumber}', [DashboardController::class, 'detail'])->name('log.detail');

Route::get('/', function () {
    return view('welcome');
});