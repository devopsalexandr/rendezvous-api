<?php

Route::post('login', 'Auth\\AuthController@login');
Route::post('register', 'Auth\\RegisterController@register');
