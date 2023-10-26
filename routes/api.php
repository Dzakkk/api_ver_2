<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendidikanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['guest'])->group(function () {

    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/biodata/{id}', [BiodataController::class, 'show'])->name('show')->middleware('role:admin');

    Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata')->middleware('role:admin');
    Route::post('/biodata', [BiodataController::class, 'store'])->name('store')->middleware('role:admin');
    Route::put('/biodata/{id}', [BiodataController::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('/biodata/{id}', [BiodataController::class, 'destroy'])->name('destroy')->middleware('role:admin');
    Route::get('/search/{nama}', [BiodataController::class, 'searchByName'])->name('searchByName')->middleware('role:admin');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
