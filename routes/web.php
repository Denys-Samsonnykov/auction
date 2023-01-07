<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LotController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::controller(LotController::class)->name('lots.')->middleware('auth')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/lots/{lot}/edit', 'edit')->name('edit');
    Route::put('/lots/{lot}/update', 'update')->name('update');
    Route::delete('/lots/{lot}', 'destroy')->name('delete');
    Route::get('/lots/new', 'create')->name('create');
    Route::post('/lots', 'store')->name('store');
});

Route::controller(CategoryController::class)->name('categories.')->middleware('auth')->group(function() {
    Route::get('/categories', 'index')->name('index');
    Route::get('/categories/{category}/edit', 'edit')->name('edit');
    Route::put('/categories/{category}/update', 'update')->name('update');
    Route::delete('/categories/{category}', 'destroy')->name('delete');
    Route::get('/categories/new', 'create')->name('create');
    Route::post('/categories', 'store')->name('store');
});
