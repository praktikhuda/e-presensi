<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

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

Route::middleware('guest:admin,dosen,mahasiswa')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticat'])->name('login.auth');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/welcome', [HomeController::class, 'welcome']);


Route::middleware('auth:admin')
    ->controller(AdminController::class)
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'index')->name('admin.dashboard');
        Route::group(['prefix' => 'dosen'], function () {
            Route::get('/', 'dosen')->name('admin.dosen');
            Route::get('/tambah', 'dosenLihat')->name('admin.dosen.tambah.lihat');
            Route::post('/tambah', 'dosenTambah')->name('admin.dosen.tambah');
            Route::get('/lihat={id}', 'lihat')->name('admin.dosen.lihat');
            Route::get('/edit={id}', 'edit')->name('admin.dosen.edit');
            Route::put('/store={id}', 'store')->name('admin.dosen.store');
            Route::delete('/hapus={id}', 'hapus')->name('admin.dosen.hapus');
        });

        Route::group(['prefix' => 'matakuliah'], function () {
            Route::get('/', 'matakuliah')->name('admin.matakuliah');
        });

        Route::group(['prefix' => 'jurusan'], function () {
            Route::resource('/', JurusanController::class);
            Route::get('/{id}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
            Route::put('/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
            Route::delete('/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
        });

        Route::group(['prefix' => 'mahasiswa'], function () {
            Route::resource('/', MahasiswaController::class);
            Route::get('lihat={id}', [MahasiswaController::class, 'show'])->name('mahasiswa.lihat');
            Route::get('edit={id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
            Route::put('update={id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
            Route::delete('hapus={id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.hapus');
        });
        Route::group(['prefix' => 'matakuliah'], function () {
            Route::resource('/', MatakuliahController::class);
            Route::get('lihat={id},', [MatakuliahController::class, 'show'])->name('matakuliah.lihat');
        });
    });

Route::middleware('auth:dosen')
    ->controller(App\Http\Controllers\dosen\DosenController::class)
    ->prefix('dosen')
    ->group(function () {
        Route::get('/', 'index')->name('dashboard');
    });

Route::middleware('auth:mahasiswa')
    ->controller(MahasiswaController::class)
    ->prefix('mahasiswa')
    ->group(function () {
        Route::get('/', 'index')->name('dashboard');
    });
