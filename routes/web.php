<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DtksController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\ValidationController;

// ─── Publik ──────────────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'pengguna'])->name('home');
Route::redirect('/usulan', '/admin')->name('usulan.form');
Route::match(['get', 'post'], '/cek-status', fn () => redirect('/#informasi'))->name('cek.status');
Route::redirect('/cek-DTKS', '/#informasi');

// Dropdown wilayah (dipakai form admin)
Route::post('get-regencie', [SurveiController::class, 'getRegencie'])->name('get.regencie');
Route::post('get-district', [SurveiController::class, 'getDistrict'])->name('get.district');
Route::post('get-village',  [SurveiController::class, 'getVillage'])->name('get.village');

// ─── Autentikasi ─────────────────────────────────────────────────────────────
Route::get('/admin',      [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/postlogin', [AuthController::class, 'login']);
Route::post('logout',     [AuthController::class, 'logout']);

// ─── Semua user yang sudah login ──────────────────────────────────────────────
Route::middleware('auth')->group(function () {

    Route::get('dashboard', [HomeController::class, 'index']);

    // ── Foto (semua role boleh lihat) ────────────────────────────────────────
    Route::get('/kk/{foto_ktp}',           [SurveiController::class, 'kk'])->name('kk');
    Route::get('/rumah/{foto_rumah}',      [SurveiController::class, 'rumah'])->name('rumah');
    Route::get('/dalam/{foto_rumah_dalam}',[SurveiController::class, 'rumah_dalam'])->name('dalam');

    // ── Survei: RT, RW, Kelurahan bisa lihat daftar/detail ──────────────────
    Route::middleware('role:rt,rw,kelurahan')->group(function () {
        Route::get('survei',            [SurveiController::class, 'index']);
        Route::get('show/{id}',         [SurveiController::class, 'show']);
        Route::get('survei/{id}/print', [SurveiController::class, 'print']);
    });

    // ── Input + edit: hanya RT ──────────────────────────────────────────────
    Route::middleware('role:rt')->group(function () {
        Route::get('plus',                      [SurveiController::class, 'create']);
        Route::post('survei/simpan',            [SurveiController::class, 'store']);
        Route::get('survei/{id}/edit',          [SurveiController::class, 'edit']);
        Route::post('survei/{id}/update',       [SurveiController::class, 'update']);
        Route::delete('survei/{id}/destroy',    [SurveiController::class, 'destroy']);
        Route::post('survei/{id}/kirim-rw',     [SurveiController::class, 'kirimRw'])->name('survei.kirim-rw');
    });

    // ── Export: hanya Kelurahan ─────────────────────────────────────────────
    Route::middleware('role:kelurahan')->group(function () {
        Route::get('survei/export',  [SurveiController::class, 'export']);
        Route::get('export-survei',  [SurveiController::class, 'export_excel']);
    });

    // ── Validasi RW ──────────────────────────────────────────────────────────
    Route::middleware('role:rw')->group(function () {
        Route::get('validasi/rw',                     [ValidationController::class, 'rwIndex']);
        Route::post('validasi/rw/{id}/setujui',       [ValidationController::class, 'rwSetujui'])->name('rw.setujui');
        Route::post('validasi/rw/{id}/tolak',         [ValidationController::class, 'rwTolak'])->name('rw.tolak');
    });

    // ── Validasi Kelurahan ───────────────────────────────────────────────────
    Route::middleware('role:kelurahan')->group(function () {
        Route::get('validasi/kelurahan',                        [ValidationController::class, 'kelurahanIndex']);
        Route::post('validasi/kelurahan/{id}/setujui',          [ValidationController::class, 'kelurahanSetujui'])->name('kelurahan.setujui');
        Route::post('validasi/kelurahan/{id}/tolak',            [ValidationController::class, 'kelurahanTolak'])->name('kelurahan.tolak');
        Route::post('validasi/kelurahan/{id}/kirim-informasi', [ValidationController::class, 'kelurahanKirimInformasi'])->name('kelurahan.kirim-informasi');
    });

    // ── DTKS ─────────────────────────────────────────────────────────────────
    Route::middleware('role:kelurahan')->group(function () {
        Route::get('/dtks',                 [DtksController::class, 'index']);
        Route::get('dtks/addData',          [DtksController::class, 'create']);
        Route::post('dtks/saveadmin',       [DtksController::class, 'store']);
        Route::get('dtks/{id}/editData',    [DtksController::class, 'edit']);
        Route::post('dtks/{id}/updateData', [DtksController::class, 'update']);
        Route::delete('dtks/{id}/deleteData', [DtksController::class, 'destroy']);
        Route::get('dtks/export',           [DtksController::class, 'export']);
        Route::get('export-dtks',           [DtksController::class, 'export_excel']);
        Route::get('dtks/{id}/print',       [DtksController::class, 'pdf']);
    });

    // ── Konfirmasi / Pengumuman ──────────────────────────────────────────────
    Route::middleware('role:kelurahan')->group(function () {
        Route::get('/konfirmasi',                  [KonfirmasiController::class, 'index']);
        Route::get('konfirmasi/tambah',            [KonfirmasiController::class, 'create']);
        Route::post('konfirmasi/save',             [KonfirmasiController::class, 'store']);
        Route::get('konfirmasi/{id}/edit',         [KonfirmasiController::class, 'edit']);
        Route::post('konfirmasi/{id}/update',      [KonfirmasiController::class, 'update']);
        Route::delete('konfirmasi/{id}/delete',    [KonfirmasiController::class, 'destroy']);
    });

    // ── Manajemen User: hanya Kelurahan ─────────────────────────────────────
    Route::middleware('role:kelurahan')->group(function () {
        Route::get('admincontrol',              [AdminController::class, 'index']);
        Route::get('admin/addData',             [AdminController::class, 'create']);
        Route::post('admin/simpan',             [AdminController::class, 'store']);
        Route::get('admin/{id}/editData',       [AdminController::class, 'edit']);
        Route::post('admin/{id}/updateData',    [AdminController::class, 'update']);
        Route::delete('admin/{id}/destroy',     [AdminController::class, 'destroy']);
    });
});
