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

// dashboard
Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

// master jabatan
Route::match(['get', 'post'], '/master-jabatan', 'Jabatan\JabatanController@index')->name('jabatan');
Route::get('/jabatan-destroy/{id}', 'Jabatan\JabatanController@destroy')->name('hapus.jabatan');
Route::get('/get-jabatan/{id}', 'Jabatan\JabatanController@get')->name('get.jabatan');
Route::post('edit-jabatan', 'Jabatan\JabatanController@editPost')->name('edit.jabatan');

// master karyawan
Route::get('/master-karyawan', 'Karyawan\KaryawanController@index')->name('karyawan');

// master penggajian
Route::get('/penggajian', 'Penggajian\PenggajianController@index')->name('penggajian');

// master pinjaman
Route::get('/pinjaman', 'Pinjaman\PinjamanController@index')->name('pinjaman');
