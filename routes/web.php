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
Route::get('/', 'Auth\AuthController@login')->name('login');
Route::post('/loginCheck', 'Auth\AuthController@login_check')->name('login_check');
Route::post('/logout', 'Auth\AuthController@logout')->name('logout');

Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');
