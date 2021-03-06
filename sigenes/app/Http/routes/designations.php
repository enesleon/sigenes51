<?php

// Views routes
Route::group(['middleware' => ['auth', 'employee']], function () {
    Route::resource('designations', 'DesignationController',
        ['only' => ['index', 'create', 'edit']]);

});

// API routes

Route::group(['prefix' => 'api/v1', 'middleware' => ['auth', 'employee']], function () {

    Route::post('designations', 'PartnerController@store');
    Route::put('designations', 'PartnerController@update');
    Route::delete('designations/{id}', 'PartnerController@destroy');
    Route::get('designations', 'DesignationController@getAllData');

});