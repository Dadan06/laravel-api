<?php

Route::group([
    'prefix' => 'authentication'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group(['prefix' => 'role'], function() {
    Route::get('/', 'RoleController@getPaginatedList');
    Route::get('/all', 'RoleController@getAll');
    Route::post('/', 'RoleController@create');
    Route::get('/{id}', 'RoleController@get');
    Route::delete('/{id}', 'RoleController@delete');
    Route::put('/{id}', 'RoleController@update');
});

Route::group(['prefix' => 'user'], function() {
    Route::get('/', 'UserController@getPaginatedList');
    Route::post('/', 'UserController@create');
    Route::get('/{id}', 'UserController@get');
    Route::delete('/{id}', 'UserController@delete');
    Route::put('/{id}', 'UserController@update');
});
