<?php

Route::get('/',function(){
  return redirect()->route('dashboard');
});

Route::get('dashboard',function(){
  session()->put('aktif','dashboard');
  return view('dashboard.index');
})->name('dashboard');

Route::resource('sekolah','SekolahController');
Route::resource('kreteria','KreteriaController');
Route::get('analisa','AnalisaController@index')->name('analisa.index');
Route::get('kinerja','KinerjaController@index')->name('kinerja.index');
Route::get('alternatif','AlternatifController@index')->name('alternatif.index');

//auth laravel
Auth::routes();
