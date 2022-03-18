<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SliderGroupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestQuestionController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/home', function () {
    return view('admin.layouts.app');
});

Route::group(['middleware' => 'auth'], function(){

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admintype', AdminTypeController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('slidergroup', SliderGroupController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('answer', AnswerController::class);
    Route::resource('test', TestController::class);
    Route::resource('coupon', CouponController::class);
    Route::resource('page', PageController::class);
    Route::resource('seo', SeoController::class);
    Route::resource('order', OrderController::class);
    Route::resource('testquestion', TestQuestionController::class);

});

