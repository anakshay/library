<?php

use App\Http\Controllers\LibarayController;
use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [LibarayController::class, 'attach'])->name('home');

// Route::get('add',[LibarayController::class,'addbooks']);
Route::get('library',[LibarayController::class,'attach']);
Route::group(['middleware' => 'auth'], function (){
Route::get('review/{id}',[LibarayController::class,'review']);
Route::post('review/save/{id}',[LibarayController::class,'reviewsave']);
});
// ->middleware('auth')
Route::get('cancle/{id}',[LibarayController::class,'cancle']);
Route::get('view/details/{id}',[LibarayController::class,'viewdetails']);
