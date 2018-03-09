<?php


Route::group(['prefix' => 'auth'], function() {

    Route::group(['middleware' => ['guest', 'use.ssl']], function() {

        Route::get('login', [
            'as' => 'auth.login',
            'uses' => 'AuthController@login'
        ]);

        Route::get('validate', [
            'as' => 'auth.validate',
            'uses' => 'AuthController@validateLogin'
        ]);

    });

});