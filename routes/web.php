<?php
Route::get('/',function(){
  return redirect()->route('login');
//   return redirect('dashboard');
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
	Route::resource('penduduk', 'PendudukController');
	Route::resource('dusun', 'DusunController');
	Route::resource('kartukeluarga', 'KartuKeluargaController');
	Route::resource('detailkartukeluarga', 'DetailKartuKeluargaController');
	Route::resource('kematian', 'KematianController');
	Route::resource('kelahiran', 'KelahiranController');
	Route::resource('mutasi', 'MutasiController');
	Route::resource('surat', 'SuratController');
	Route::resource('user', 'UserController');

	Route::get('persetujuan/{id}/{fungsi}/{kondisi}', 'SupportController@persetujuan')->name('persetujuan');
	Route::get('file/{id}/{fungsi}', 'SupportController@file')->name('file');
});
//auth laravel
Auth::routes();

// Route::group(['prefix' => 'kematian'], function(){
// 	Route::get('persetujuan/{id}/{kondisi}', 'KematianController@persetujuan')->name('kematian.persetujuan');
// 	Route::get('file/{id}', 'KematianController@file')->name('kematian.file');
// });
