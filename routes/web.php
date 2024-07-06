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
use App\Http\Controllers\PresensiController;

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
            Route::get('lihat={id}', [MatakuliahController::class, 'show'])->name('matakuliah.lihat');
            Route::get('edit={id}', [MatakuliahController::class, 'edit'])->name('matakuliah.edit');
            Route::put('update={id}', [MatakuliahController::class, 'update'])->name('matakuliah.update');
            Route::get('lihatMahasiswa={id}', [MatakuliahController::class, 'lihatMahasiswa'])->name('matakuliah.lihatMahasiswa');
            Route::get('/matkuliah={id}', [PresensiController::class, 'create'])->name('matakuliah.presensi');
            Route::post('/matkuliahTambah={id}', [PresensiController::class, 'store'])->name('matakuliah.presensi.tambah');
            Route::get('/matkuliahEdit={id}&tanggal={tgl}', [PresensiController::class, 'edit'])->name('matakuliah.presensi.edit');
            Route::put('/matkuliahUpdate={id}&tanggal={tgl}', [PresensiController::class, 'update'])->name('matakuliah.presensi.update');
        });
        Route::group(['prefix' => 'calender'], function () {
            Route::get('/', [AdminController::class, 'tamppilCalendar']);
            Route::get('/tampil', [AdminController::class, 'calender'])->name('tampil.calendar');
        });
    });


Route::middleware('auth:dosen')
    ->controller(App\Http\Controllers\dosen\DosenController::class)
    ->prefix('dosen')
    ->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::group(['prefix' => 'matakuliah'], function () {
            Route::resource('/', App\Http\Controllers\dosen\MatakuliahController::class);
            Route::get('lihat={id}', [App\Http\Controllers\dosen\MatakuliahController::class, 'show'])->name('dosen.matakuliah.lihat');
            Route::get('edit={id}', [App\Http\Controllers\dosen\MatakuliahController::class, 'edit'])->name('dosen.matakuliah.edit');
            Route::put('update={id}', [App\Http\Controllers\dosen\MatakuliahController::class, 'update'])->name('dosen.matakuliah.update');
            Route::get('lihatMahasiswa={id}', [App\Http\Controllers\dosen\MatakuliahController::class, 'lihatMahasiswa'])->name('dosen.matakuliah.lihatMahasiswa');
            Route::get('/matkuliah={id}', [App\Http\Controllers\dosen\PresensiController::class, 'create'])->name('dosen.matakuliah.presensi');
            Route::post('/matkuliahTambah={id}', [App\Http\Controllers\dosen\PresensiController::class, 'store'])->name('dosen.matakuliah.presensi.tambah');
            Route::get('/matkuliahEdit={id}&tanggal={tgl}', [App\Http\Controllers\dosen\PresensiController::class, 'edit'])->name('dosen.matakuliah.presensi.edit');
            Route::put('/matkuliahUpdate={id}&tanggal={tgl}', [App\Http\Controllers\dosen\PresensiController::class, 'update'])->name('dosen.matakuliah.presensi.update');
        });
    });

Route::middleware('auth:mahasiswa')
    ->controller(MahasiswaController::class)
    ->prefix('mahasiswa')
    ->group(function () {
        Route::get('/', 'index')->name('dashboard');
    });
