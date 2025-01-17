<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

//History
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
Route::get('/history', [HistoryController::class, 'index'])->middleware('auth');
Route::post('/history', [HistoryController::class, 'filter'])->middleware('auth');
