<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTypeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SliderGroupController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\TestQuestionController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes...
Route::group(['prefix' => 'admin'], function(){
    // Authentication Routes...
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login_page');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
    // Password Reset Routes...
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);
});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function(){
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

    Route::post('upload/slider-image', [SliderController::class, 'filePondTemp'])->name('slider.file');
    Route::post('update/slider-status/{slider}', [SliderController::class, 'updateSliderStatus'])->name('slider.status.update');

    Route::post('question-image', [AnswerController::class, 'imageAnswerUpload'])->name('answer.image.upload');
});