<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IqraController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HafalanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrangtuaController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\ActivityLogController;

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

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('pengajar', PengajarController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('hafalan', HafalanController::class);
    Route::resource('iqra', IqraController::class);
    Route::resource('orangtua', OrangtuaController::class);
    Route::resource('activity-logs', ActivityLogController::class);


    Route::get('/hafalan/surats/{id}', [HafalanController::class, 'getSuratsByJuz'])->name('hafalan.getSuratsByJuz');
    Route::get('/hafalan/ayats/{id}', [HafalanController::class, 'getAyatsBySurat'])->name('hafalan.getAyatsBySurat');
});

// Route group for admin middleware
Route::middleware(['admin'])->group(function () {
    // Define admin routes here if needed
});

require __DIR__ . '/auth.php';
