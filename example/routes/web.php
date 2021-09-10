<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
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



Route::get('/header', function () {
    return view('header');
});


Route::get('/admin', function () {
    return view('admin');
});

//Auth::routes();
Route::get('/category', [CategoryController::class, 'data']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('ajaxRequest', [CategoryController::class, 'ajaxRequest']);
Route::get('/status', [CategoryController::class, 'ajaxRequestStatus']);
Route::POST('/edit',[CategoryController::class,'ajaxEdit']);
Route::POST('/insert',[CategoryController::class,'ajaxInsert']);




Route::get('/subcategory', [SubCategoryController::class, 'data']);
Route::get('tableData', [SubCategoryController::class, 'tableData']);
