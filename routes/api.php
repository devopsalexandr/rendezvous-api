<?php

Route::post('login', 'Auth\\AuthController@login');
Route::post('register', 'Auth\\RegisterController@register');

Route::group(['middleware' => 'auth:api'], function () {

    Route::post('logout', 'Auth\\AuthController@logout');
    Route::post('refresh', 'Auth\\AuthController@refresh');

    Route::post('search', 'SearchUsersController@index');

    Route::prefix('photos')->group(function () {

        Route::get('/', 'PhotosController@index');

        Route::post('/', 'PhotosController@store');

    });

    Route::prefix('profile')->group(function () {

        Route::get('/', 'ProfileController@index');

        Route::get('/{id}', 'ProfileController@show');

    });

});