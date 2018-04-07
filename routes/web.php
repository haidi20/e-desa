<?php

Route::get('/',function(){
  return redirect()->route('dashboard');
});

Route::get('dashboard',function(){
  session()->put('aktif','dashboard');
  session()->put('aktiff','');
  return view('dashboard.index');
})->name('dashboard');

Route::resource('sekolah','SekolahController');
Route::resource('kreteria','KreteriaController');
Route::resource('alternatif','AlternatifController');
Route::get('analisa','AnalisaController@index')->name('analisa.index');
Route::get('kinerja','KinerjaController@index')->name('kinerja.index');
Route::get('normalisasi','NormalisasiController@index')->name('normalisasi.index');

//auth laravel
Auth::routes();
