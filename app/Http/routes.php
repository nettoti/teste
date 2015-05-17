<?php

Route::get('/', 'SalesController@index');
Route::get('list', 'SalesController@listSales');
Route::post('upload', 'SalesController@Upload');
Route::get('create/{fileName}', 'SalesController@create');
Route::get('destroy/{id}', 'SalesController@destroy');

Route::get('home', 'SalesController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);