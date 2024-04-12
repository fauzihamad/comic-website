<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ComicController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('admin.login.auth');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth.session','auth'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'comic'], function () {
            Route::get('/', [ComicController::class, 'index'])->name('admin.comic');
            Route::get('/tambah', [ComicController::class, 'tambah'])->name('admin.comic.tambah');
            Route::post('/simpan', [ComicController::class, 'simpan'])->name('admin.comic.simpan');

        });
    });
});


