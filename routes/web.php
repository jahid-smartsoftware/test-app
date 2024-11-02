<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [FrontEndController::class, 'login'])->name('login');
Route::post('/login', [FrontEndController::class, 'verify'])->name('login.verify');

Route::middleware('auth')->group(function () {
    Route::resource('/home', HomeController::class)->only(['index']);
    Route::resource('/client', ClientController::class);
    Route::delete('/logout', [FrontEndController::class, 'logout'])->name('logout');
});

