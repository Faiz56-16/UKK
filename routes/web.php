<?php

use App\Http\Controllers\AspirasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\UmpanBalikController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('aspirasi.loginpost');
Route::post('/logout', [AuthController::class, 'logout'])->name('aspirasi.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/Home', [HomeController::class, 'index'])->name('home');
    Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
    Route::get('/aspirasi/tambah', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/aspirasi/create', [AspirasiController::class, 'store'])->name('aspirasi.store');
    Route::get('/aspirasi/{id_pelaporan}', [AspirasiController::class, 'show'])->name('aspirasi.show');
});

    Route::get('/feedback/{aspirasi}', [UmpanBalikController::class, 'feedback'])->name('aspirasi.feedback');
    Route::post('/feedback-tambah/{id_pelaporan}', [UmpanBalikController::class, 'feedbackstore'])->name('admin.feedbackstore');
// Route::Middleware([['auth:admin']])->group(function () {
    Route::get('/Admin', [AuthController::class, 'adminlogin'])->name('admin.login');
    Route::post('/Admin-Login', [AuthController::class, 'adminloginpost'])->name('admin.loginpost');
    Route::post('/Admin-Logout', [AuthController::class, 'adminlogout'])->name('admin.logout');

    Route::get('/Dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/Manage-Aspirasi', [AspirasiController::class, 'adminaspirasi'])->name('admin.aspirasi');
// });
