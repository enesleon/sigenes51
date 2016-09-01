<?php
/**
 * Created by PhpStorm.
 * User: taxque
 * Date: 27/02/16
 * Time: 08:35 PM
 */

// Views routes
Route::group(['middleware' => ['auth', 'employee']], function () {
    Route::resource('countrys', 'CountryController',
        ['only' => ['index', 'create', 'edit']]);

});

// API routes

Route::group(['prefix' => 'api/v1'], function () {

    Route::get('countrys', 'CountryController@getAllData');
    Route::get('getNameCountry/{id}', 'CountryController@getNameCountry');
    Route::post('countrys', 'CountryController@store');
    Route::put('countrys', 'CountryController@update');
    Route::delete('countrys/{id}', 'CountryController@destroy');
});