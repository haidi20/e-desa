<?php

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

Route::group(['namespace' => 'admin','prefix' => 'admin'], function (){

  //get pengguna
  Route::get('pengguna/reset','PenggunaController@reset')->name('pengguna.reset');
  Route::get('pengguna/konfirmasi','PenggunaController@konfirmasi')->name('pengguna.konfirmasi');

  //resource
  Route::resource('sekolah','SekolahController');
  Route::resource('pengguna','PenggunaController');
  Route::resource('dashboard','DashboardController');

  //kuisioner
  Route::get('kuisioner','KuisionerController@index')->name('kuisioner.index');
  Route::post('kuisioner/store','KuisionerController@store')->name('kuisioner.store');

  //kunci
  Route::get('kunci','KunciController@index')->name('kunci.index');
  Route::get('kunci/detail','KunciController@detail')->name('kunci.detail');
  Route::get('kunci/simpan','KunciController@simpan')->name('kunci.simpan');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
