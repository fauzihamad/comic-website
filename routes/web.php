<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ComicChaptersController;
use App\Http\Controllers\Admin\ComicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PagesController;
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

Route::get('/', [PagesController::class, 'index'])->name('user.index');
Route::get('/detail-comic/{id}', [PagesController::class, 'detail_comic'])->name('user.detail-comic');
Route::get('/search-comic', [PagesController::class, 'search_comic'])->name('user.search-comic');
Route::get('/bookmarks-comic', [PagesController::class, 'bookmarks_comic'])->name('user.bookmarks-comic');
Route::get('/all-comic', [PagesController::class, 'all_comic'])->name('user.all-comic');

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
            Route::get('/edit/{id}', [ComicController::class, 'edit'])->name('admin.comic.edit');
            Route::get('/check/{id}', [ComicController::class, 'check'])->name('admin.comic.check');
            Route::put('/update/{id}', [ComicController::class, 'update'])->name('admin.comic.update');
            Route::delete('/delete/{id}', [ComicController::class, 'delete'])->name('admin.comic.delete');

            Route::group(['prefix' => 'chapters'], function () {
                Route::post('/simpan/{id}', [ComicChaptersController::class, 'simpan'])->name('admin.comic.chapters.simpan');
                Route::post('/simpan-gambar/{id}', [ComicChaptersController::class, 'simpan_gambar'])->name('admin.comic.chapters.simpan-gambar');
                Route::get('/edit/{id}', [ComicChaptersController::class, 'edit'])->name('admin.comic.chapters.edit');
                Route::get('/check/{id}', [ComicChaptersController::class, 'check'])->name('admin.comic.chapters.check');
                Route::get('/update/{id}', [ComicChaptersController::class, 'update'])->name('admin.comic.chapters.update');
                Route::get('/delete/{id}', [ComicChaptersController::class, 'delete'])->name('admin.comic.chapters.delete');
            });

        });
    });
});


