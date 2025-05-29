<?php

use App\Http\Controllers\JsonDownloadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);

Route::get('/download-page', [JsonDownloadController::class, 'showDownloadPage'])->name('download-page');
Route::get('/download-json', [JsonDownloadController::class, 'downloadJson'])->name('download-json');
