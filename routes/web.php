<?php
Route::get('/',function(){
  // return redirect()->route('login');
  return view('dashboard');
});

Route::resource('penduduk', 'PendudukController');
Route::resource('dusun', 'DusunController');
Route::resource('kartukeluarga', 'KartuKeluargaController');
Route::resource('kematian', 'KematianController');
Route::resource('kelahiran', 'KelahiranController');
Route::resource('mutasi', 'MutasiController');
Route::resource('surat', 'SuratController');

//auth laravel
// Auth::routes();
