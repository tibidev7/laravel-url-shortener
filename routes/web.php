<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UrlController;
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

Route::get('login', [LoginController::class, 'request'])->name('login');
Route::get('login/callback', [LoginController::class, 'callback'])->name('login.callback');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [UrlController::class, 'index'])->name('home');
Route::post('short', [UrlController::class, 'store'])->name('short');
Route::get('statistics', [UrlController::class, 'statistics'])->name('statistics');
Route::get('{token}', [UrlController::class, 'redirect'])->name('redirect');
