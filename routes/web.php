<?php

use App\Http\Controllers\DokumenController;
use App\Http\Controllers\JalurController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/tes', [ProfileController::class, 'user'])->name('user.index');

//Admin
Route::get('/admin/user', [UserController::class, 'indexAdmin'])->name('admin.user.index');
Route::get('/admin/user/show/{id}', [UserController::class, 'showAdmin'])->name('admin.user.show');
Route::put('/admin/user/lolosAdm/{id}', [UserController::class, 'lolosAdm'])->name('admin.user.lolosAdm');
Route::put('/admin/user/ditolak/{id}', [UserController::class, 'ditolak'])->name('admin.user.ditolak');
Route::put('/admin/user/diterima/{id}', [UserController::class, 'diterima'])->name('admin.user.diterima');
Route::put('/admin/user/bulkLolosAdm', [UserController::class, 'bulkLolosAdm'])->name('admin.user.bulkLolosAdm');
Route::put('/admin/user/bulkDitolak', [UserController::class, 'bulkDitolak'])->name('admin.user.bulkDitolak');
Route::put('/admin/user/bulkDiterima', [UserController::class, 'bulkDiterima'])->name('admin.user.bulkDiterima');



//Siswa
Route::get('/user/show', [UserController::class, 'show'])->name('user.show');
Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update', [UserController::class, 'update'])->name('user.update');

//Dokumen

Route::get('/dokumen/create', [DokumenController::class, 'create'])->name('dokumen.create');
Route::post('/dokumen/store', [DokumenController::class, 'store'])->name('dokumen.store');
Route::get('/dokumen/edit/{tipe_dokumen}', [UserController::class, 'edit'])->name('dokumen.edit');
Route::put('/dokumen/update/{id}', [UserController::class, 'update'])->name('dokumen.update');

//Post Testing
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/edit/{post}', [PostController::class, 'update'])->name('post.update');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
Route::delete('/post/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');


//Testing
Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
Route::post('/dokumen/kk', [DokumenController::class, 'updateKK'])->name('dokumen.updateKK');
Route::post('/dokumen/updateIjazah', [DokumenController::class, 'updateIjazah'])->name('dokumen.updateIjazah');
Route::post('/dokumen/updateRaport', [DokumenController::class, 'updateRaport'])->name('dokumen.updateRaport');
Route::post('/dokumen/updateTambahan', [DokumenController::class, 'updateTambahan'])->name('dokumen.updateTambahan');



//Admin Jalur
Route::get('/jalur/index', [JalurController::class, 'index'])->name('jalur.index');
Route::get('/jalur/edit/{id}', [JalurController::class, 'edit'])->name('jalur.edit');
Route::post('/jalur/store', [JalurController::class, 'store'])->name('jalur.store');
Route::put('/jalur/update/{id}', [JalurController::class, 'update'])->name('jalur.update');

//Pengumuman
Route::get('/pengumuman', [UserController::class, 'pengumuman'])->name('pengumuman.index');
Route::get('/kartuPendaftaran', [UserController::class, 'kartuPendaftaranPdf'])->name('pengumuman.kartuPendaftaran');
Route::get('/kartuDiterima', [UserController::class, 'kartuDiterimaPdf'])->name('pengumuman.kartuDiterima');



//Alur Registrasi
Route::get('/registrasi/profile', [SiswaController::class, 'editProfile'])->name('edit.profile.siswa');
Route::put('/registrasi/profile', [SiswaController::class, 'updateProfile'])->name('update.profile.siswa');
Route::get('/registrasi/dataPribadi', [SiswaController::class, 'editDataPribadi'])->name('edit.dataPribadi.siswa');
Route::put('/registrasi/dataPribadi', [SiswaController::class, 'updateDataPribadi'])->name('update.dataPribadi.siswa');
Route::get('/registrasi/dataAyah', [SiswaController::class, 'editDataAyah'])->name('edit.dataAyah.siswa');
Route::put('/registrasi/dataAyah', [SiswaController::class, 'updateDataAyah'])->name('update.dataAyah.siswa');
Route::get('/registrasi/dataIbu', [SiswaController::class, 'editDataIbu'])->name('edit.dataIbu.siswa');
Route::put('/registrasi/dataIbu', [SiswaController::class, 'updateDataIbu'])->name('update.dataIbu.siswa');
Route::get('/registrasi/dataJalur', [SiswaController::class, 'editDataJalur'])->name('edit.dataJalur.siswa');
Route::put('/registrasi/dataJalur', [SiswaController::class, 'updateDataJalur'])->name('update.dataJalur.siswa');
Route::get('/registrasi/verifikasi', [SiswaController::class, 'indexVerifikasi'])->name('index.verifikasi.siswa');


require __DIR__.'/auth.php';
