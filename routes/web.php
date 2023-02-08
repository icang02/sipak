<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DupakController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PKBController;
use App\Http\Controllers\TimPenilaiController;
use App\Models\Dupak;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/seed', function () {
    return Artisan::class('migrate:fresh --seed');
});

Route::get('/export', [DupakController::class, 'export'])->name('export');

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/dashboard', function () {
    $dupak = Dupak::where('tahun', date('Y') - 1)->orderBy('nama')->get()->take(5);

    return view('dashboard.index', [
        'dupak' => $dupak,
    ]);
})->name('dashboard')->middleware('auth');

// ROUTE DATA PKB
Route::get('data-pkb', [PKBController::class, 'index'])->name('data.pkb')->middleware('auth');
Route::get('data-pkb/export', [PKBController::class, 'export'])->name('data.pkb.export')->middleware('auth');
Route::get('data-pkb/{data}', [PKBController::class, 'show'])->middleware('auth')->name('show.pkb');

Route::get('/data-dupak', [DupakController::class, 'index'])->name('data.dupak')->middleware('auth');
Route::get('/data-dupak/add', [DupakController::class, 'create'])->name('add.dupak')->middleware('auth');
Route::post('/add', [DupakController::class, 'store'])->name('store.dupak');
Route::get('/data-dupak/edit/{data}', [DupakController::class, 'edit'])->name('edit.data.dupak')->middleware('auth');
Route::put('/data-dupak/update/{data}', [DupakController::class, 'update'])->name('update.data.dupak')->middleware('auth');


// ROUTE AUTHENTICATE
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('loginAuth');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Tim Penilai
Route::get('/tim-penilai', [TimPenilaiController::class, 'index'])->name('tim.penilai')->middleware('auth');
Route::get('/tim-penilai/{list}', [TimPenilaiController::class, 'show'])->name('tim.penilai.dupak')->middleware('auth');
Route::post('/tim-penilai/add', [TimPenilaiController::class, 'store'])->name('add.tim.penilai')->middleware('auth');
Route::put('/tim-penilai/update/{data}', [TimPenilaiController::class, 'update'])->name('update.tim.penilai')->middleware('auth');
Route::delete('/tim-penilai/destroy/{data}', [TimPenilaiController::class, 'destroy'])->name('destroy.tim.penilai')->middleware('auth');


// ROUTE JABATAN
Route::get('/jabatan', [JabatanController::class, 'index'])->name('index.jabatan')->middleware('auth');
Route::post('/jabatan', [JabatanController::class, 'store'])->name('jabatan')->middleware('auth');
Route::put('/jabatan/{jabatan}', [JabatanController::class, 'update'])->name('update.jabatan')->middleware('auth');
Route::delete('/jabatan/{jabatan}', [JabatanController::class, 'destroy'])->name('destroy.jabatan')->middleware('auth');
