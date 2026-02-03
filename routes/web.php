<?php

use App\Http\Controllers\AspirasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
Route::get('/aspirasi/tambah', [AspirasiController::class, 'create'])->name('aspirasi.create');
Route::post('/aspirasi/create', [AspirasiController::class, 'store'])->name('aspirasi.store');
Route::get('/aspirasi/{id_pelaporan}', [AspirasiController::class, 'show'])->name('aspirasi.show');
