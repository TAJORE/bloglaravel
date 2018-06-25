<?php

Route::get('/','postsController@index')->name('home');
Route::get('/posts/create','postsController@create');
Route::post('/posts','postsController@store');
Route::get('/posts/{post}','postsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit');

Route::post('/posts/update/{post}', 'PostsController@update');

Route::get('/posts/{post}/delete', 'PostsController@destroy');

Route::get('/comments/{comment}/edit', 'CommentsController@edit');
Route::post('/comments/update/{comment}', 'CommentsController@update');


Route::get('/comments/{comment}/delete', 'CommentsController@destroy');

Route::post('/posts/{post}/comments','CommentsController@store');
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');












