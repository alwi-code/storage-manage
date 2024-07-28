<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyGuestMiddleware;
use App\Http\Middleware\OnlyMemberMiddleware;

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

Route::get('/', [HomeController::class, 'home']);

Route::controller(UserController::class)->group(function (){
    Route::get('/login', 'login')->middleware(OnlyGuestMiddleware::class);
    Route::post('/login', 'doLogin')->middleware(OnlyGuestMiddleware::class);
    Route::post('/logout', 'doLogout')->name('logout')->middleware(OnlyMemberMiddleware::class);

});

Route::controller(BarangController::class)->middleware(OnlyMemberMiddleware::class)->group(function (){
    Route::get('/baranglist', 'barangList')->name('barang.index');;
    Route::get('/baranglist/create', 'barangListCreate');
    Route::get('/baranglist/create', 'barangListCreate');
    Route::post('/baranglist', 'postBarang')->name('barang.store');
    Route::get('/baranglist/{id}/edit', 'editBarang')->name('barang.edit');
    Route::put('/baranglist/{id}', 'updateBarang')->name('barang.update');
    Route::delete('/baranglist/{id}', 'deleteBarang')->name('barang.destroy');
});