<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\DaftarController;
use App\Models\Pendaftar;

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

// deklarasi beranda
Route::get('/', function () {
    return view('beranda');
})->name('beranda');

// deklarasi route daftar
Route::prefix('daftar')->group(function () {
    Route::get('/', [DaftarController::class, 'index'])->name('daftar');
    Route::post('/simpan', [DaftarController::class, 'store'])->name('daftar.store');
});

// deklarasi route hasil
Route::get('/hasil', [HasilController::class, 'index'])->name('hasil');
// deklarasi route grafik
Route::get('/grafik', function () {
    // menghitung jumlah pendaftar berdasarkan beasiswa
    $beasiswaAkademikCount = Pendaftar::where('beasiswa', 'Beasiswa Akademik')->count();
    $beasiswaNonAkademikCount = Pendaftar::where('beasiswa', 'Beasiswa Non Akademik')->count();
    $beasiswaKedinasanCount = Pendaftar::where('beasiswa', 'Beasiswa Kedinasan')->count();
    // mengembalikan view grafik dengan mengirimkan data
    $data = [
        ['nama' => 'Beasiswa Akademik', 'jumlah' => $beasiswaAkademikCount],
        ['nama' => 'Beasiswa Non Akademik', 'jumlah' => $beasiswaNonAkademikCount],
        ['nama' => 'Beasiswa Kedinasan', 'jumlah' => $beasiswaKedinasanCount],
    ];
    return view('grafik',[
        'data' => $data,
    ]);
})->name('grafik');

// deklarasi route download
Route::get('/download/{filename}', [HasilController::class, 'download'])->name('download');
