<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ComicChaptersController;
use App\Http\Controllers\Admin\ComicController;
use App\Http\Controllers\Admin\ComicGenreController;
use App\Http\Controllers\Admin\ComicTypeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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
Route::get('/{idComic}/detail-chapters/{id}', [PagesController::class, 'detail_chapters'])->name('user.detail-chapters');
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
                Route::put('/update/{id}', [ComicChaptersController::class, 'update'])->name('admin.comic.chapters.update');
                Route::get('/delete/{id}', [ComicChaptersController::class, 'delete'])->name('admin.comic.chapters.delete');
            });

        });

        Route::group(['prefix' => 'genre'], function () {
            Route::get('/', [ComicGenreController::class, 'index'])->name('admin.genre');
        });

        Route::group(['prefix' => 'type'], function () {
            Route::get('/', [ComicTypeController::class, 'index'])->name('admin.type');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.users');
            Route::post('/simpan', [UserController::class, 'simpan'])->name('admin.users.simpan');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');
        });

        Route::group(['prefix' => 'permission'], function () {
            Route::get('/', [PermissionController::class, 'index'])->name('admin.permission');
        });

        Route::group(['prefix' => 'role'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('admin.role');
            Route::post('/simpan', [RoleController::class, 'simpan'])->name('admin.role.simpan');
            Route::put('/update/{id}', [RoleController::class, 'update'])->name('admin.role.update');
            Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('admin.role.delete');
        });

    });
});


