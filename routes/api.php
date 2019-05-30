<?php

Route::post('login', 'Auth\\AuthController@login');
Route::post('register', 'Auth\\RegisterController@register');

Route::group(['middleware' => 'auth:api'], function () {

    Route::post('logout', 'Auth\\AuthController@logout');
    Route::post('refresh', 'Auth\\AuthController@refresh');

});