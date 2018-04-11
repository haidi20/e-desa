<?php

Route::get('/',function(){
  return redirect()->route('dashboard');
});

Route::get('dashboard',function(){
  session()->put('aktif','dashboard');
  session()->put('aktiff','');
  return view('dashboard.index');
})->name('dashboard');

Route::get('data/sekolah','DataController@dataSekolah')->name('data.sekolah');
Route::get('input/kinerja','DataController@inputKinerja')->name('input.kinerja');
Route::get('input/peringkat','DataController@inputPeringkat')->name('input.peringkat');
Route::get('input/normalisasi','DataController@inputNormalisasi')->name('input.normalisasi');

Route::resource('sekolah','SekolahController');
Route::resource('kreteria','KreteriaController');
Route::resource('alternatif','AlternatifController');
Route::get('analisa','AnalisaController@index')->name('analisa.index');
Route::get('kinerja','KinerjaController@index')->name('kinerja.index');
Route::get('normalisasi','NormalisasiController@index')->name('normalisasi.index');

//auth laravel
Auth::routes();
