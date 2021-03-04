<?php

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

Route::get('/login/customer', [App\Http\Controllers\Auth\LoginController::class, 'showLogin'])->name('customer.showLogin');
Route::post('/login/customer/confirm', [App\Http\Controllers\Auth\LoginController::class, 'confirmLogin'])->name('customer.confirmLogin');

Route::get('/register/customer', [App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])->name('customer.showRegisterForm');
Route::post('/register/customer/confirm', [App\Http\Controllers\Auth\RegisterController::class, 'confirmRegister'])->name('customer.confirmRegister');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth','verified']);
Route::view('/customer', 'customer')->middleware(['auth','verified']);