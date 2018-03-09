<?php
// modelo
$model = 'users';

Route::group(['prefix' => $model], function() {

    //var controlador
    $controller = 'UsersController';

    Route::get('/',[
        'as' => 'users.index',
        'uses' => $controller.'@index',
        'middleware' => 'permission:listar.usuarios.configuracion'
    ]);

    Route::get('/nuevo',[
        'as' => 'users.nuevo',
        'uses' => $controller.'@getNew',
        'middleware' => 'permission:crear.usuarios.configuracion'
    ]);

    Route::post('/crear', [
        'as' => 'users.create',
        'uses' => $controller.'@postCreate'
    ]);

      Route::group(['prefix' => '{id}'], function() {

        Route::get('/editar', [
            'as' => 'users.editar',
            'uses' => 'UsersController@getEdit',
            'middleware' => 'permission:listar.usuarios.configuracion'
        ]);

        Route::get('/eliminar', [
            'as' => 'users.eliminar',
            'uses' => 'UsersController@getDelete',
            'middleware' => 'permission:borrar.usuarios.configuracion'
        ]);

        Route::post('/update', [
            'as' => 'users.update',
            'uses' => 'UsersController@postUpdate'
        ]);
    });

});

