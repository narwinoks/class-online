<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\MentorController;
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
use App\Http\Controllers\Admin\RoadMapController;

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
        Route::get('/categories', 'categories')->name('categories');
        Route::get('/road-map', 'roadMap')->name('roadMap');
        Route::get('/course', 'course')->name('course');
    });
    Route::controller(AdminDashboardController::class)->middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    Route::controller(BannerController::class)->prefix('/banner')->middleware('auth')->name('banner.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::delete('/{id}', 'delete')->name('delete');
        Route::put("/", 'update')->name('update');
    });
    Route::controller(CategoryController::class)->prefix('/categories')->middleware('auth')->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::put('/', 'update')->name('update');
    });
    // roadMap routes
    Route::controller(RoadMapController::class)->prefix('/roadmap')->name('roadmap.')->middleware('auth')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
    // MENTOR ROUTE
    Route::controller(MentorController::class)->prefix('/mentor')->name('mentor.')->middleware('auth')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
    });
    // COURSE ROUTE
    Route::controller(AdminCourseController::class)->prefix('/course')->name('course.')->middleware('auth')->group(function () {
        Route::get('/', 'index')->name('index');
    });
});
