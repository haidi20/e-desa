<?php
Route::get('/',function(){
  // return redirect()->route('dashboard');
  return redirect()->route('login');
});
// Route::group(['middleware' => 'auth'],function(){
  Route::get('dashboard',function(){
    session()->put('aktif','dashboard');
    session()->put('aktiff','');
    return view('dashboard.index');
  })->name('dashboard');
// });

  Route::get('pengaturan', 'PengaturanController@index');

//auth laravel
Auth::routes();
