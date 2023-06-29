<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampahsController;

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

// mengambil semua data & search
Route::get('/', [SampahsController::class, 'index'])->name('home');
// halaman tambah data
Route::get('/add', [SampahsController::class, 'create'])->name('add');
// tambah data
Route::post('/add/send', [SampahsController::class, 'store'])->name('send');
// menampilkan halaman edit dan mengirim satu datanya
Route::get('/edit/{id}', [SampahsController::class, 'edit'])->name('edit');
// mengubah data
Route::patch('/update/{id}', [SampahsController::class, 'update'])->name('update');
// hapus data pake softdeletes
Route::delete('/delete/{id}', [SampahsController::class, 'destroy'])->name('delete');
// ambil data sampah
Route::get('/trash', [SampahsController::class, 'trash'])->name('trash');
// restore
Route::get('/trash/restore/{id}', [SampahsController::class, 'restore'])->name('restore');
// hapus permanent
Route::get('/trash/delete/permanent/{id}', [SampahsController::class, 'permanent'])->name('permanent');