<?php

use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\MonitoringRecordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SyncController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::view('/home', 'home')->name('home');
    Route::view('/monitoring', 'monitoring')->name('monitoring');
    Route::get('/riwayat_monitoring', [MonitoringRecordController::class, 'index'])->name('riwayat_monitoring');
    Route::view('/riwayat_gejala_awal', 'riwayat_gejala_awal')->name('riwayat_gejala_awal');
    Route::view('/bantuan', 'bantuan')->name('bantuan');
    Route::middleware(['cors'])->group(function (){
       Route::post('/sync-data', [SyncController::class, 'syncData'])->name('syncData'); 
    });
    // Route::post('/sync-data', 'SyncController@syncData');
});


require __DIR__.'/auth.php';
