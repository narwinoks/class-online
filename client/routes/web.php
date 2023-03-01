<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Member\CourseController;
use App\Http\Controllers\Member\HomeController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Member\AuthController;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\MyCourseController;
use App\Http\Controllers\Member\MyOrderController;
use App\Http\Controllers\Member\MyRoadmapController;
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
    Route::delete('/logout', 'logout')->name('prosesLogout');
});
Route::prefix('learn')->name('member.')->group(function () {
    Route::name('dashboard.')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/test', 'test')->name('test');
    });
    Route::prefix('/profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/', 'updateProfile')->name('update');
        Route::put('/change-password', 'changePassword')->name('changePassword');
    });
    Route::prefix('/order')->name('order.')->controller(MyOrderController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/data-order', 'getOrder')->name('data');
    });
    Route::prefix('/my-course')->name('my-course.')->controller(MyCourseController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get("/embed", "getEmbed")->name("embed");
        Route::get('/{slug}', 'detail')->name('detail');
    });
    Route::prefix('/my-roadmap')->name('my-roadmap.')->controller(MyRoadmapController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});


Route::prefix('course')->name('course.')->group(function () {
    Route::controller(CourseController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/data', 'getCourse')->name('getCourses');
        Route::get('/{slug}', 'detail')->name('detail');
    });

    Route::controller(OrderController::class)->name('order.')->prefix('/order')->group(function () {
        Route::post('/', 'post')->name('post');
    });
});

// ADMIN ROUTES
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::controller(AdminAuthController::class)->prefix('/')->name('auth.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'login')->name('login');
    });
    Route::controller(DataController::class)->prefix('/data')->name('data.')->group(function () {
        Route::get('/banner', 'banner')->name('banner');
    });
    Route::controller(AdminDashboardController::class)->middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    Route::controller(BannerController::class)->prefix('/banner')->middleware('auth')->name('banner.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/data', 'data')->name('data');
    });
});
