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
  // route untuk keperluan input data dan ajax //
  Route::get('data/sekolah','DataController@dataSekolah')->name('data.sekolah');
  Route::group(['prefix' => 'input'],function(){
    Route::get('kinerja','DataController@inputKinerja')->name('input.kinerja');
    Route::get('peringkat','DataController@inputPeringkat')->name('input.peringkat');
    Route::get('normalisasi','DataController@inputNormalisasi')->name('input.normalisasi');
    // inputan khusus bagian" topsis //
    Route::get('alphaPositif','DataController@inputAlphaPositif')->name('topsis.input.alphaPositif');
    Route::get('alphaNegatif','DataController@inputAlphaNegatif')->name('topsis.input.alphaNegatif');
    Route::get('deltaPositif','DataController@inputDeltaPositif')->name('topsis.input.deltaPositif');
    Route::get('deltaNegatif','DataController@inputDeltaNegatif')->name('topsis.input.deltaNegatif');
  });
  // route untuk keperluan fitur" topsis //
  Route::group(['prefix' => 'topsis','namespace' => 'Topsis'],function(){
    Route::get('pembagi','PembagiController@index')->name('topsis.pembagi.index');
    Route::get('terbobot','TerbobotController@index')->name('topsis.terbobot.index');
    Route::get('peringkat','PeringkatController@index')->name('topsis.peringkat.index');
    Route::get('pebantu/delta','PembantuController@delta')->name('topsis.pembantu.delta');
    Route::get('pembantu/alpha','PembantuController@alpha')->name('topsis.pembantu.alpha');
    Route::get('normalisasi','NormalisasiController@index')->name('topsis.normalisasi.index');
  });
  // route untuk keperluan fitur" di saw //
  Route::resource('sekolah','SekolahController');
  Route::resource('kreteria','KreteriaController');
  Route::resource('alternatif','AlternatifController');
  Route::get('analisa','AnalisaController@index')->name('analisa.index');
  Route::get('kinerja','KinerjaController@index')->name('kinerja.index');
  Route::get('normalisasi','NormalisasiController@index')->name('normalisasi.index');
});

//auth laravel
Auth::routes();
