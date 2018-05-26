<?php

Route::get('/','postsController@index');
Route::get('/posts/create','postsController@create');
Route::post('/posts','postsController@store');
Route::get('/posts/{post}','postsController@show');

Route::post('/posts/{post}/comments','CommentsController@store');












