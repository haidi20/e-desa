<?php

Route::get('/',function(){
  return view('dashboard.index');
});

//auth laravel
Auth::routes();
