<?php

Route::group(['prefix' => 'cuenta_corriente'], function() {

    Route::get('',[
        'as' => 'cuenta_corriente.index',
        'uses' => 'CuentaCorrienteController@index',
        'middleware' => 'permission:ver.cuenta_corriente.configuracion'
    ]);

    Route::get('/nuevo',[
        'as' => 'cuenta_corriente.nuevo',
        'uses' => 'CuentaCorrienteController@nuevo'
    ]);

    Route::post('/crear/{id?}', [
        'as' => 'cuenta_corriente.store',
        'uses' => 'CuentaCorrienteController@store'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('/editar', [
            'as' => 'cuenta_corriente.edit',
            'uses' => 'CuentaCorrienteController@edit'
        ]);

        Route::get('/eliminar', [
            'as' => 'cuenta_corriente.eliminar',
            'uses' => 'CuentaCorrienteController@delete'
        ]);

        Route::post('/update', [
            'as' => 'cuenta_corriente.update',
            'uses' => 'CuentaCorrienteController@update'
        ]);

     
    });

});

