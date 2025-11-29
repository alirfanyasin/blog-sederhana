<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index']);
Route::resource('posts', PostController::class);


Route::get('/baca', [PostController::class, 'bacaData']);
Route::get('/tambah', [PostController::class, 'tambahData']);
Route::get('/edit/{id}', [PostController::class, 'edit']);
Route::get('/hapus/{id}', [PostController::class, 'hapus']);
