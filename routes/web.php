<?php

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('dashboard.index');
});

// pengguna
Route::get('pengguna/reset','PenggunaController@reset')->name('pengguna.reset');
Route::get('pengguna/konfirmasi','PenggunaController@konfirmasi')->name('pengguna.konfirmasi');

// kuisioner
Route::post('kuisioner/vue/store','KuisionerController@store');
Route::get('kuisioner/jawaban/vue','KuisionerController@jawaban');
Route::get('kuisioner/info/vue','KuisionerController@info');
Route::get('kuisioner','KuisionerController@index')->name('kuisioner.index');
Route::get('kuisioner/pertanyaan/vue','KuisionerController@pertanyaan')->name('kuisioner.pertanyaan');

// kunci
Route::get('kunci','KunciController@index')->name('kunci.index');
Route::get('kunci/detail','KunciController@detail')->name('kunci.detail');
Route::get('kunci/simpan','KunciController@simpan')->name('kunci.simpan');

// dashboard
Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

//kebutuhan vue
// Sekolah
Route::get('sekolah/vue','SekolahController@baca');
// kecamatan
Route::get('kecamatan/vue','KecamatanController@index');
// pendidikan
Route::get('pendidikan/vue','PendidikanController@index');

// resource :
// sekolah
Route::resource('sekolah','SekolahController');
// pengguna
Route::resource('pengguna','PenggunaController');

//import dari excel
Route::get('import','import@run');

//auth laravel
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
