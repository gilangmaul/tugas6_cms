<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
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



Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('register', 'register')->name('register');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');

    Route::post('register', 'doRegister')->name('do.register');
    Route::post('login', 'doLogin')->name('do.login');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    });
});


Route::controller(ProductController::class)->prefix('products')->group(function () {

    Route::get('', 'index')->name('products');
    Route::get('create', 'create')->name('products.create');
    Route::post('create', 'store')->name('products.store');
    Route::get('edit/{id}', 'edit')->name('products.edit');
    Route::post('edit/{id}', 'update')->name('products.update');
    Route::get('destroy/{id}', 'destroy')->name('destroy');
});

Route::controller(CategorieController::class)->prefix('categories')->group(function () {

    Route::get('', 'index')->name('categories');
    Route::get('create', 'create')->name('create');
    Route::post('create', 'store')->name('categories.store');
    Route::get('edit/{id}', 'edit')->name('categories.edit');
    Route::post('edit/{id}', 'update')->name('categories.update');
    Route::get('destroy/{id}', 'destroy')->name('destroy');
});
