<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return view('welcome');
});
// ambil semua data
Route::get('/sampahs', [SampahsController::class, 'index']);
// tambah data baru
Route::post('/sampahs/tambah-data', [SampahsController::class, 'store']);
// generate token csrf
Route::get('/generate-token', [SampahsController::class, 'createToken']);
// ambil satu data spesifik
Route::get('/sampahs/{id}', [SampahsController::class, 'show']);
// mengubah data tertentu
Route::patch('/sampahs/update/{id}', [SampahsController::class, 'update']);
// menghapus data tertentu
Route::delete('/sampahs/delete/{id}', [SampahsController::class, 'destroy']);
// menampilkan se;uruh data yang sudah dihapus sementara oleh softdeletes
Route::get('/sampahs/show/trash', [SampahsController::class, 'trash']);
// mengembalikan data spesifik yang sudah di hapus
Route::get('/sampahs/trash/restore/{id}', [SampahsController::class, 'restore']);
// mengapus permanen data tertentu
Route::get('/sampahs/trash/delete/permanent/{id}', [SampahsController::class, 'permanentDelete']);