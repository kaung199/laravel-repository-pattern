<?php

use Illuminate\Support\Facades\Route;

/*
 | user route
 | routes are loaded by the RouteServiceProvider
*/
Route::name('users.')->group(function() {

    Route::get('/', 'NewController@index')->name('lists');
    Route::get('/create/{user?}', 'NewController@create')->name('create');
    Route::post('/store/{user?}', 'NewController@store')->name('store');
    Route::get('/delete/{user}', 'NewController@delete')->name('delete');

});