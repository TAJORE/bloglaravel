<?php

Route::get('/','postsController@index');
Route::get('/posts/{post}','postsController@show');








