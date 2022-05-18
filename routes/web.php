<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InnerPagesController;
use App\Http\Controllers\NewsController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [InnerPagesController::class, 'about'])->name('about');
Route::get('/contact', [InnerPagesController::class, 'contact'])->name('contact');
Route::get('/sales', [InnerPagesController::class, 'sales'])->name('sales');
Route::get('/financial', [InnerPagesController::class, 'financial'])->name('financial');
Route::get('/clients', [InnerPagesController::class, 'clients'])->name('clients');

Route::resource('/news', NewsController::class);
