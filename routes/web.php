<?php

Route::get('/','postsController@index')->name('home');
Route::get('/posts/create','postsController@create');
Route::post('/posts','postsController@store');
Route::get('/posts/{post}','postsController@show');

Route::post('/posts/{post}/comments','CommentsController@store');
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');












