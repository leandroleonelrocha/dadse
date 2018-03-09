<?php
Route::group(['prefix' => 'protesis'], function() {

    Route::get('',[
        'as' => 'protesis.index',
        'uses' => 'ProtesisController@getIndex',
        'middleware' => 'permission:listar.protesis'
    ]);

    Route::get('/nuevo',[
        'as' => 'protesis.nuevo',
        'uses' => 'ProtesisController@getNew'
    ]);

    Route::post('/crear', [
        'as' => 'protesis.create',
        'uses' => 'ProtesisController@postCreate'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('/editar', [
            'as' => 'protesis.editar',
            'uses' => 'ProtesisController@getEdit'
        ]);

        Route::get('/eliminar', [
            'as' => 'protesis.eliminar',
            'uses' => 'ProtesisController@getDelete'
        ]);

        Route::post('/update', [
            'as' => 'protesis.update',
            'uses' => 'ProtesisController@postUpdate'
        ]);

        Route::get('/detalle', [
            'as' => 'protesis.detalle',
            'uses' => 'ProtesisController@getDetalle'
        ]);
    });

});

Route::get('search_protesis/{search}',['as' => 'protesis.search', 'uses' => 'ProtesisController@getSearch']);




