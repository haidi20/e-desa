<?php

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('dashboard.index');
});

//get pengguna
Route::get('pengguna/reset','PenggunaController@reset')->name('pengguna.reset');
Route::get('pengguna/konfirmasi','PenggunaController@konfirmasi')->name('pengguna.konfirmasi');

//get kuisioner
Route::get('kuisioner','KuisionerController@index')->name('kuisioner.index');
Route::post('kuisioner/store','KuisionerController@store')->name('kuisioner.store');

//get kunci
Route::get('kunci','KunciController@index')->name('kunci.index');
Route::get('kunci/detail','KunciController@detail')->name('kunci.detail');
Route::get('kunci/simpan','KunciController@simpan')->name('kunci.simpan');

//resource
Route::resource('sekolah','SekolahController');
Route::resource('pengguna','PenggunaController');
Route::resource('dashboard','DashboardController');

//auth laravel
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
