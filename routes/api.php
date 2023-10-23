<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
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

Route::middleware(['guest'])->group(function(){

    Route::post('/login', [AuthController::class, 'login'])->name('login');  

});    

Route::middleware(['auth'])->group(function () {
    
    
        
});

Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata');
    Route::post('/biodata', [BiodataController::class, 'store'])->name('store');
    Route::put('/biodata/{id}', [BiodataController::class, 'update'])->name('update');
    Route::get('/biodata/{id}', [BiodataController::class, 'show'])->name('show');
    Route::delete('/biodata/{id}', [BiodataController::class, 'destroy'])->name('destroy');
