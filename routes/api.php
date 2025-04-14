<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MataPelajaranController;
use App\Http\Controllers\Api\MateriController;
use App\Http\Controllers\Api\TugasController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');

    // User
    Route::get('/get-me', [AuthController::class, 'user'])->name('get.me');

    // Materi 
    Route::get('/get-materi', [MateriController::class, 'getMateri'])->name('get.materi');

    // Tugas 
    Route::get('/get-tugas', [TugasController::class, 'getTugas'])->name('get.tugas');

    // mata Pelajaran 
    Route::get('/get-mata-pelajaran', [MataPelajaranController::class, 'getMatpel'])->name('get.tugas');
});