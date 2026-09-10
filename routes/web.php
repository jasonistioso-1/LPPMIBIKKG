<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminCMSController;
use App\Http\Controllers\AdminMenuController;



// Admin Authentication Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Secure CMS Dashboard (Protected by session auth)
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminCMSController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/update', [AdminCMSController::class, 'update'])->name('admin.update');
    
    // Dynamic Menu CRUD Routes
    Route::post('/admin/menus', [AdminMenuController::class, 'store'])->name('admin.menus.store');
    Route::post('/admin/menus/{id}', [AdminMenuController::class, 'update'])->name('admin.menus.update');
    Route::delete('/admin/menus/{id}', [AdminMenuController::class, 'destroy'])->name('admin.menus.destroy');

    // Dynamic Visual Inline AJAX Save Route
    Route::post('/admin/update-ajax', [AdminCMSController::class, 'updateAjax'])->name('admin.update-ajax');
    
    // Dynamic Card Management AJAX Routes
    Route::post('/admin/add-card-ajax', [AdminCMSController::class, 'addCardAjax'])->name('admin.add-card-ajax');
    Route::post('/admin/delete-card-ajax', [AdminCMSController::class, 'deleteCardAjax'])->name('admin.delete-card-ajax');
    Route::post('/admin/update-card-ajax', [AdminCMSController::class, 'updateCardAjax'])->name('admin.update-card-ajax');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/tentang-kami', function () { return view('profil.tentang-kami'); })->name('tentang-kami');
    Route::get('/visi-misi', function () { return view('profil.visi-misi'); })->name('visi-misi');
    Route::get('/struktur-organisasi', function () { return view('profil.struktur-organisasi'); })->name('struktur-organisasi');
    Route::get('/prestasi', function () { return view('profil.prestasi'); })->name('prestasi');
});

Route::prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/akuntansi', function () { return view('dosen.akuntansi'); })->name('akuntansi');
    Route::get('/ilmuadministrasibisnis', function () { return view('dosen.ilmuadministrasibisnis'); })->name('ilmuadministrasibisnis');
    Route::get('/ilmukomunikasi', function () { return view('dosen.ilmukomunikasi'); })->name('ilmukomunikasi');
    Route::get('/manajemen', function () { return view('dosen.manajemen'); })->name('manajemen');
    Route::get('/sisteminformasi', function () { return view('dosen.sisteminformasi'); })->name('sisteminformasi');
    Route::get('/teknikinformatika', function () { return view('dosen.teknikinformatika'); })->name('teknikinformatika');
});

Route::prefix('penelitian')->name('penelitian.')->group(function () {
    Route::get('/data-penelitian', function () { return view('penelitian.data-penelitian'); })->name('data-penelitian');
    Route::get('/pengumuman', function () { return view('penelitian.pengumuman'); })->name('pengumuman');
    Route::get('/skema', function () { return view('penelitian.skema'); })->name('skema');
});

Route::prefix('abdimas')->name('abdimas.')->group(function () {
    Route::get('/data-abdimas', function () { return view('abdimas.data-abdimas'); })->name('data-abdimas');
    Route::get('/pengumuman', function () { return view('abdimas.pengumuman'); })->name('pengumuman');
    Route::get('/skema', function () { return view('abdimas.skema'); })->name('skema');
});

Route::prefix('publikasi')->name('publikasi.')->group(function () {
    Route::get('/artikel-ilmiah', function () { return view('publikasi.artikel-ilmiah'); })->name('artikel-ilmiah');
    Route::get('/jurnal', function () { return view('publikasi.jurnal'); })->name('jurnal');
    Route::get('/prosiding', function () { return view('publikasi.prosiding'); })->name('prosiding');
});

Route::prefix('dokumen')->name('dokumen.')->group(function () {
    Route::get('/panduan', function () { return view('dokumen.panduan'); })->name('panduan');
    Route::get('/template', function () { return view('dokumen.template'); })->name('template');
    Route::get('/unduhan', function () { return view('dokumen.unduhan'); })->name('unduhan');
});

Route::prefix('kontak')->name('kontak.')->group(function () {
    Route::get('/informasi-kontak', function () { return view('kontak.informasi-kontak'); })->name('informasi-kontak');
    Route::get('/jam-layanan', function () { return view('kontak.jam-layanan'); })->name('jam-layanan');
    Route::get('/lokasi-kampus', function () { return view('kontak.lokasi-kampus'); })->name('lokasi-kampus');
});

