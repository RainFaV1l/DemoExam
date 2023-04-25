<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

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

Route::group([

    'controller' => IndexController::class,
    'as' => 'page.'

], function () {

    Route::get('/', 'home')->name('home');
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');

    // Страница с продуктами
    Route::get('/products', 'allProducts')->name('allProducts');

});

Route::group([

    'controller' => AuthController::class,
    'as' => 'auth.',
    'prefix' => '/auth'

], function () {

    Route::post('/create', 'createUser')->name('createUser');
    Route::post('/login', 'loginUser')->name('loginUser');
    Route::get('/logout', 'logoutUser')->name('logoutUser');

});
