<?php

use App\Http\Controllers\Member\CourseController;
use App\Http\Controllers\Member\HomeController;
use Illuminate\Support\Facades\Route;

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
//Route::get('/course', [CourseController::class, 'index']);

Route::prefix('course')->name('course.')->group(function(){
    Route::controller(CourseController::class)->group(function (){
        Route::get('/' ,'index')->name('index');
        Route::get('/data' ,'getCourse')->name('getCourses');
    });
});
