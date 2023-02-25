<?php

use App\Http\Controllers\Member\CourseController;
use App\Http\Controllers\Member\HomeController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Member\AuthController;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\OrderController;
use App\Http\Controllers\Member\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::controller(AuthController::class)->name('auth.')->group(function () {
    Route::get('/login', 'index')->name('index');
    Route::get('/register', 'register')->name('register');
    Route::post('/login', 'prosesLogin')->name('prosesLogin');
    Route::post('/register', 'prosesRegister')->name('prosesRegister');
    Route::delete('/logout','logout')->name('prosesLogout');
});
Route::prefix('learn')->name('member.')->group(function () {
    Route::name('dashboard.')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/test','test')->name('test');
    });
    Route::prefix('/profile')-> name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::put('/','updateProfile')->name('update');
        Route::put('/change-password','changePassword')->name('changePassword');
    });
});


Route::prefix('course')->name('course.')->group(function () {
    Route::controller(CourseController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/data', 'getCourse')->name('getCourses');
        Route::get('/{slug}', 'detail')->name('detail');
    });

    Route::controller(OrderController::class)->name('order.')->prefix('/order')->group(function(){
        Route::post('/','post')->name('post');
    });
});

// Route::get('/test', [AuthController::class, 'test'])->name('test');
