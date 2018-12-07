<?php
Route::get('/',function(){
  // return redirect()->route('login');
  return view('dashboard');
});

Route::get('penduduk', function(){
  return view('penduduk.index');
});

//auth laravel
// Auth::routes();
