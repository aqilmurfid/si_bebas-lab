<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
    return view('pages.user.home');
})->name('home');

Route::get('/pdf', function() {
    $item='Diky Saputra';

    return view('pages.pdf.surat', [
        'item' => $item
    ]);
});

Route::get('/cek-surat-{id}', [HomeController::class, 'cek_surat'])->name('home.cek-surat');

Route::middleware('auth')
->group(function(){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    Route::get('/surat',[SuratController::class, 'index'])->name('surat.index');

    Route::get('/surat/form-ajukan-surat',[SuratController::class, 'create'])->name('surat.create');

    Route::get('/surat/form-ajukan-surat/kirim',[SuratController::class, 'store'])->name('surat.store');

    Route::get('/cetak-surat',[SuratController::class, 'cetak_surat'])->name('surat.cetak');

    Route::get('/preview-surat',[SuratController::class, 'preview_surat'])->name('surat.preview');
});

Route::middleware('laboran')
->prefix('laboran')
->group(function() {
    Route::get('/surat',[SuratController::class, 'index_laboran'])->name('laboran.surat.index');

    Route::put('/surat/proses-surat-{id}',[SuratController::class, 'teruskan_surat'])->name('laboran.surat.teruskan');

    Route::put('/surat/proses-surat-{id}/nomor-surat',[SuratController::class, 'simpan_nomor_surat'])->name('laboran.simpan-nomor-surat');

    Route::get('/data-mahasiswa/create', [MahasiswaController::class, 'create'])->name('data-mahasiswa-create');

    Route::post('/data-mahasiswa/store', [MahasiswaController::class, 'store'])->name('data-mahasiswa-store');

    Route::get('/data-mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('data-mahasiswa-edit');

    Route::get('/data-laboran/edit-riwayat-surat/{id}', [SuratController::class, 'edit_riwayat_surat2'])->name('laboran.riwayat-surat.edit');

    Route::patch('/data-laboran/update-riwayat-surat/{id}', [SuratController::class, 'update_riwayat_surat2'])->name('laboran.riwayat-surat.update');

    Route::put('/data-mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('data-mahasiswa-update');

    Route::post('/data-mahasiswa/import', [MahasiswaController::class, 'import'])->name('data-mahasiswa-import');

});

Route::middleware('ka_lab')
->prefix('kepala-lab')
->group(function() {
    Route::get('/surat',[SuratController::class, 'index_ka_lab'])->name('ka_lab.surat.index');

    Route::put('/surat/terima-surat-{id}',[SuratController::class, 'terima_surat'])->name('ka_lab.surat.terima');

    Route::get('/data-laboran',[DataController::class, 'profile'])->name('ka_lab.profile');

    Route::patch('/data-laboran/update',[DataController::class, 'update'])->name('ka_lab.profile-update');

    Route::get('/data-kepala-lab',[DataController::class, 'ka_lab'])->name('ka_lab.kepala-lab');

    Route::patch('/data-kepala-lab/update',[DataController::class, 'update_ka_lab'])->name('ka_lab.kepala-lab-update');

    Route::delete('/data-mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('data-mahasiswa-destroy');

    Route::get('/data-laboran/cetak-excel', [SuratController::class, 'laporan'])->name('ka_lab.laporan');

    Route::get('/data-kepala-lab/edit-riwayat-surat/{id}', [SuratController::class, 'edit_riwayat_surat'])->name('ka_lab.riwayat-surat.edit');

    Route::patch('/data-kepala-lab/update-riwayat-surat/{id}', [SuratController::class, 'update_riwayat_surat'])->name('ka_lab.riwayat-surat.update');

    Route::delete('/data-kepala-lab/delete-riwayat-surat/{id}', [SuratController::class, 'delete_riwayat_surat'])->name('ka_lab.riwayat-surat.delete');
});

Route::middleware('ka_lab_laboran')
->group(function() {
    Route::get('riwayat-surat',[SuratController::class, 'riwayat_surat'])->name('riwayat-surat');
    Route::get('/data-mahasiswa',[MahasiswaController::class, 'index'])->name('data-mahasiswa.index');
});

require __DIR__.'/auth.php';
