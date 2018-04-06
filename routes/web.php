<?php

Route::get('/',function(){
  return redirect()->route('dashboard');
});

Route::get('dashboard',function(){
  session()->put('aktif','dashboard');
  return view('dashboard.index');
})->name('dashboard');

Route::resource('sekolah','SekolahController');
Route::get('alternatif','AlternatifController@index')->name('alternatif.index');

//auth laravel
Auth::routes();
