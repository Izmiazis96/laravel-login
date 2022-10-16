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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
Route::get('/logout', 'DashboardController@logout')->name('dashboard.logout');
// Register
Route::get('/register', 'RegisterController@index')->name('register.index');
Route::post('/register', 'RegisterController@store')->name('register.store');
// LOGIN
Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@check_login')->name('login.check_login');
