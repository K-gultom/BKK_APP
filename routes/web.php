<?php

use App\Http\Controllers\Admin\KelengkapanDokumenController;
use App\Http\Controllers\Admin\PenerbitanPerizinanController;
use App\Http\Controllers\Admin\PengusulanUlangController;
use App\Http\Controllers\Admin\PermohonanController;
use App\Http\Controllers\Admin\User\userController;
use App\Http\Controllers\Admin\VerifikasiLapanganController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\keteranganSehatController;
use App\Http\Controllers\layakTerbangController;
use App\Http\Controllers\layarTerbangDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedicController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProcessController;
use Illuminate\Support\Facades\Route;


/*-----------------------------------
| Medic Route
-----------------------------------*/
Route::get('/', [MedicController::class, 'index'])->name('medic');


/*-----------------------------------
| Register Routes
-----------------------------------*/
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'test'])->name('register.process');


/*-----------------------------------
| Login Routes
-----------------------------------*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');




Route::middleware(['auth', 'cekRole:admin,user'])->group(function(){
    
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        
    

    /*-----------------------------------
    | Home Route
    -----------------------------------*/
    // Route::get('/admin', [HomeController::class, 'index'])->name('home');
    Route::controller(HomeController::class)->group(function(){
        Route::get('/pegawai', 'index')->name('home');
        Route::post('/pegawai', 'store');
        Route::get('/pegawai/{id}', 'edittt');
        Route::post('/pegawai/{id}', 'update');
        Route::get('/pegawai/delete/{id}', 'destroy');
    });


    /*-----------------------------------
    | Admin
    -----------------------------------*/
    Route::resource('/user', userController::class);



    /*-----------------------------------
    | Permohonan dan Proses Perizinan
    -----------------------------------*/
    Route::controller(ProcessController::class)->group(function () {
        // Permohonan
        Route::get('/permohonan', 'permohonan')->name('permohonan');
        Route::post('/permohonan', 'store')->name('permohonan.store');

        // Kelengkapan Dokumen
        Route::get('/kelengkapan-dokumen', 'kelengkapanDokumen')->name('kelengkapan-dokumen');
        Route::post('/kelengkapan-dokumen', 'storeKelengkapanDokumen')->name('kelengkapan-dokumen.store');

        // Verifikasi Lapangan
        Route::get('/verifikasi-lapangan', 'verifikasiLapangan')->name('verifikasi-lapangan');
        Route::get('/verifikasi-lapangan/{id}', 'dextroy');

        // Penerbitan Perizinan
        Route::get('/penerbitan-perizinan', [ProcessController::class, 'penerbitanPerizinan'])->name('penerbitan-perizinan');
        Route::get('/penerbitan-perizinan/{id}/surat-izin', [ProcessController::class, 'generateSuratIzin'])->name('surat-izin.generate');
        
        // Pengusulan Ulang
        Route::get('/pengusulan-ulang', 'pengusulanUlang')->name('pengusulan-ulang');

    });

    Route::get('/dashboard', [HomeController::class, 'dashboard']);

    Route::prefix('admin')->name('admin.')->group(function(){

        Route::resource('permohonan', PermohonanController::class);
        Route::resource('kelengkapan-dokumen', KelengkapanDokumenController::class);
        
        Route::resource('verifikasi-lapangan', VerifikasiLapanganController::class);
        Route::resource('penerbitan-perizinan', PenerbitanPerizinanController::class);
        Route::resource('pengusulan-ulang', PengusulanUlangController::class);

    });

    Route::put('/admin/update-status/{id}', [KelengkapanDokumenController::class, 'updateStatus'])->name('admin.updateStatus');



    /*-----------------------------------
    | Surat Lainnya Route
    -----------------------------------*/
    Route::get('/surat', function () {
        return view('SuratLainnya.suratlainnya');
    })->name('surat');

    Route::resource('/surat-layak-terbang', layakTerbangController::class);
    Route::resource('/surat-layak-terbang-dashboard', layarTerbangDashboardController::class);
    
    Route::resource('/keterangan-sehat', keteranganSehatController::class);


});


Route::get('/test', function () {
    return view('admin.clinics.KelengkapanDokumen.KelengkapanDokumen');
});