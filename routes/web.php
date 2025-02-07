<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
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

Route::get('/', [HomeController::class, 'home'])->name('home.redirect');

Route::controller(UserController::class)->group(function (){
    Route::get('/login', 'login')->middleware(OnlyGuestMiddleware::class);
    Route::post('/login', 'doLogin')->name('users.login')->middleware(OnlyGuestMiddleware::class);
    Route::post('/logout', 'doLogout')->name('users.logout')->middleware(OnlyMemberMiddleware::class);
    
    Route::get('/change-password', 'showChangePasswordForm')->name('users.showChangePasswordForm')->middleware(OnlyMemberMiddleware::class);
    Route::post('/change-password', 'updatePassword')->name('users.updatePassword')->middleware(OnlyMemberMiddleware::class);


    Route::middleware([OnlyMemberMiddleware::class, 'admin'])->group(function (){
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users', 'store')->name('users.store');
        Route::get('/users/{id}/edit', 'edit')->name('users.edit');
        Route::put('/users/{id}', 'update')->name('users.update');
        Route::delete('/users/{id}', 'destroy')->name('users.destroy');
    });

});

Route::controller(BarangController::class)->middleware(OnlyMemberMiddleware::class)->group(function (){
    Route::get('/baranglist', 'barangList')->name('barang.index');
    Route::get('/baranglist/create', 'barangListCreate')->name('barang.create');
    Route::post('/baranglist', 'postBarang')->name('barang.store');
    Route::get('/baranglist/{id}/edit', 'editBarang')->name('barang.edit');
    Route::put('/baranglist/{id}', 'updateBarang')->name('barang.update');
    Route::delete('/baranglist/{id}', 'deleteBarang')->name('barang.destroy');
});

Route::controller(LogController::class)->middleware([OnlyMemberMiddleware::class, 'admin'])->group(function (){
    Route::get('/logs/activity', 'activityLogs')->name('logs.activity');
    Route::get('/logs/audit', 'auditItems')->name('logs.audit');
});

