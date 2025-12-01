<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>['auth'] ],function () {
    Route::get('/', function () {
        return redirect(route('dashboard'));
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kelas', App\Http\Controllers\KelasController::class);
    Route::resource('mapel', App\Http\Controllers\MapelController::class);
    Route::resource('siswa', App\Http\Controllers\SiswaController::class);
    Route::resource('guru', App\Http\Controllers\GuruController::class);
});
require __DIR__.'/auth.php';


