<?php

Route::group(['prefix' => 'hospitales'], function() {

    Route::get('',[
        'as' => 'hospitales.index',
        'uses' => 'HospitalesController@index',
        'middleware' => 'permission:listar.hospitales'
    ]);

    Route::get('/nuevo',[
        'as' => 'hospitales.nuevo',
        'uses' => 'HospitalesController@create',
        'middleware' => 'permission:crear.hospitales'
    ]);

    Route::post('/crear', [
        'as' => 'hospitales.create',
        'uses' => 'HospitalesController@store'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('/editar', [
            'as' => 'hospitales.editar',
            'uses' => 'HospitalesController@edit',
            'middleware' => 'permission:editar.hospitales'
        ]);

        Route::get('/eliminar', [
            'as' => 'hospitales.eliminar',
            'uses' => 'HospitalesController@destroy',
            'middleware' => 'permission:borrar.hospitales'
        ]);

        Route::post('/update', [
            'as' => 'hospitales.update',
            'uses' => 'HospitalesController@update'
        ]);

        Route::get('/detalle', [
            'as' => 'hospitales.detalle',
            'uses' => 'HospitalesController@show',
            //'middleware' => 'permission:detalle.medico'
        ]);
    });
 
});
