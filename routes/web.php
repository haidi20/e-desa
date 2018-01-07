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

Route::group(['namespace' => 'admin'], function (){
  Route::resource('admin/sekolah','SekolahController');
  Route::resource('admin/pengguna','PenggunaController');
  Route::resource('admin/dashboard','DashboardController');
  Route::resource('admin/kuisioner','KuisionerController');

  //kunci
  Route::get('admin/kunci','KunciController@index')->name('kunci.index');
  Route::get('admin/kunci/detail','KunciController@detail')->name('kunci.detail');
  Route::get('admin/kunci/simpan','KunciController@simpan')->name('kunci.simpan');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
