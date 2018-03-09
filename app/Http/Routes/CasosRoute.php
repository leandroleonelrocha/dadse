<?php
// modelo
$model = 'casos';

Route::group(['prefix' => $model], function() {

    //var controlador
    $controller = 'CasosController';

    Route::get('', [
        'as' => 'casos.index',
        'uses' => 'CasosController@index',
        'middleware' => 'permission:listar.casos'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('', [
            'as' => 'casos.show',
            'uses' => 'CasosController@show',
            'middleware' => 'permission:ver.casos'
        ]);

        
    //cerrar caso
    Route::get('/cerrarCaso',['as' => 'casos.cerrar', 'uses' => 'CasosController@cerrarCaso']);
    Route::get('/anularCaso',['as' => 'casos.anularCaso', 'uses' => 'CasosController@anularCaso']);
    });

    Route::get('/nuevoCaso',['as' => 'casos.nuevo', 'uses' => $controller.'@getNew']);

    Route::post('/solicitarAltoCosto',['as'=>'casos_alto_costo','uses'=>$controller.'@solicitarAltoCosto']);

    Route::post('/nuevaNota',['as' => 'casos.nueva.nota', 'uses'=> $controller.'@postNuevaNota']);

    Route::get('/documento/{id}',['as'=>'casos.documento','uses'=>$controller.'@verDocumento']);

    Route::get('/documento/download/{id}/{fileExtension}',['as' => 'casos.documento.download', 'uses' => 'CasosController@documentoDownload']);

    //FACTURACION
    Route::get('/facturacion/{id}',['as' => 'casos.facturacion', 'uses' => 'CasosController@facturacion']);
    Route::get('/voucher/{id}',['as' => 'casos.voucher', 'uses' => 'CasosController@voucher']);
    Route::post('/numeroExpediente',[ 'as'=>'casos.numero.expediente', 'uses'=> 'CasosController@numeroExpediente']);
    
    //historial personas
    Route::get('/personas/{id}',['as' => 'casos.personas', 'uses' => 'CasosController@personas']);
    //detalle prestacion altoCosto
    
});
    Route::get('/finalizados', ['as'=>'casos.finalizados', 'uses'=>'CasosController@casosFinalizados']);    



