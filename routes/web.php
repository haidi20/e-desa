<?php
Route::get('/',function(){
  return redirect()->route('login');
});
// Route::group(['middleware' => 'auth'],function(){
  Route::get('dashboard', function(){
    session()->put('aktif','dashboard');
    session()->put('aktiff','');
    return view('dashboard.index');
  })->name('dashboard');
// });
  Route::get('detail', function(){
  	return view('dashboard.detail');
  });

  Route::get('pengaturan', 'PengaturanController@index');

  // Route::resource('biodata', 'BiodataController');
  Route::get('biodata/create', function(){
  	return view('pengguna.form-biodata');
  });
  Route::get('biodata', function(){
  	return view('pengguna.biodata');
  });

  Route::resource('lowongan', 'LowonganController');

//auth laravel
Auth::routes();
