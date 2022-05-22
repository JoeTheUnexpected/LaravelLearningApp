<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InnerPagesController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/account', [InnerPagesController::class, 'account'])->name('account')->middleware('auth');

Route::resource('/news', NewsController::class);

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/products/{car}', [CatalogController::class, 'show'])->name('catalog.show');
Route::get('/catalog/{category}', [CatalogController::class, 'category'])->name('catalog.category');

Auth::routes();
