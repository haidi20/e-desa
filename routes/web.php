<?php

Route::get('/',function(){
  // return redirect()->route('dashboard');
  return redirect()->route('login');
});

Route::group(['middleware' => 'auth'],function(){
  Route::get('dashboard',function(){
    session()->put('aktif','dashboard');
    session()->put('aktiff','');
    return view('dashboard.index');
  })->name('dashboard');

  // route untuk keperluan fitur" topsis //
  Route::group(['prefix' => 'topsis','namespace' => 'Topsis'],function(){
    Route::get('pembagi','PembagiController@index')->name('topsis.pembagi.index');
    Route::get('normalisasi','NormalisasiController@index')->name('topsis.normalisasi.index');
    Route::get('terbobot','TerbobotController@index')->name('topsis.terbobot.index');
  });

  // route untuk keperluan input data dan ajax //
  Route::get('data/sekolah','DataController@dataSekolah')->name('data.sekolah');
  Route::group(['prefix' => 'input'],function(){
    Route::get('kinerja','DataController@inputKinerja')->name('input.kinerja');
    Route::get('peringkat','DataController@inputPeringkat')->name('input.peringkat');
    Route::get('normalisasi','DataController@inputNormalisasi')->name('input.normalisasi');
    // route untuk keperluan input data bagian topsis //
    Route::get('topsis/normalisasi','DataController@inputNormalisasiTopsis')->name('topsis.input.normalisasi');
    Route::get('topsis/terbobot','DataController@inputTerbobotTopsis')->name('topsis.input.terbobot');
  });

  // route untuk keperluan fitur" di aplikasi //
  Route::resource('sekolah','SekolahController');
  Route::resource('kreteria','KreteriaController');
  Route::resource('alternatif','AlternatifController');
  Route::get('analisa','AnalisaController@index')->name('analisa.index');
  Route::get('kinerja','KinerjaController@index')->name('kinerja.index');
  Route::get('normalisasi','NormalisasiController@index')->name('normalisasi.index');
});

//auth laravel
Auth::routes();
