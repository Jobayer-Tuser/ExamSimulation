<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SliderGroupController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/home', function () {
    return view('admin.layouts.app');
});


Route::resource('admintype', AdminTypeController::class);
Route::resource('admin', AdminController::class);
Route::resource('slider', SliderController::class);
Route::resource('slidergroup', SliderGroupController::class);
Route::resource('category', CategoryController::class);