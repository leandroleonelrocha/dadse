<?php

$model = 'prestaciones';

Route::group(['prefix' => $model], function(){

    //var controlador
    $controller = 'PrestacionesController';

    //Informes medicos
    Route::get('/prestaciones_informes/{idPrestaciones?}',['as' => 'prestaciones.informes', 'uses' => $controller.'@getInformes']);
    Route::post('/prestaciones_informes',['as' => 'prestaciones.post.informes', 'uses' => $controller.'@postInformes']);
    Route::get('/informe_multiple/{data?}',['as' => 'prestaciones.informe_multiple', 'uses' => $controller.'@informe_multiple']);
    
    Route::post('/prestaciones_informes_edit',['as' => 'prestaciones.postUpdateinformes', 'uses' => $controller.'@postUpdateinformes']);
    Route::get('/prestaciones_asignar/{idPrestaciones?}/{edit?}/{intervencion?}',['as' => 'prestaciones.asignar', 'uses' => $controller.'@getAsignar']);
    Route::post('/prestaciones_asignar/{idPrestaciones?}',['as' => 'prestaciones.post.asignar', 'uses' => $controller.'@postAsignar']);
    Route::post('/postUpdateAsignar/{edit?}',['as' => 'prestaciones.postUpdateAsignar', 'uses' => $controller.'@postUpdateAsignar']);
    Route::post('/getObservacion',['as' => 'prestaciones.getObservacion', 'uses' => $controller.'@getObservacion']);

    Route::get('/solicitud_presupuesto/{idPrestaciones?}',['as' => 'solicitud_presupuesto', 'uses' => $controller.'@getSolicitudPresupuesto']);


    Route::get('/prestaciones_asignar/asignar_producto/{tipo?}/{idPrestaciones?}/{idProducto?}/{idPresentacion?}',['as' => 'prestaciones.asignar_producto', 'uses' => $controller.'@getAsignarProducto']);

    Route::get('/prestaciones_asignar/search_kairos/{search_text?}',$controller.'@getSearch');
    Route::get('/prestaciones_asignar/search_kairos_producto/{id_producto?}',$controller.'@getProducto');

    Route::get('/prestaciones_delete/{id?}',['as'=>'prestacionesProductosDelete','uses'=>$controller.'@getPrestacionesProductosDelete']);

    Route::post('/solicitud_presupuesto/{idPrestaciones?}',['as' => 'postSolicitudPresupuesto', 'uses' => $controller.'@postSolicitudPresupuesto']);


    Route::get('/presupuesto_detalle/{idPrestaciones?}',['as'=>'presupuestoDetalle','uses'=>$controller.'@getPresupuestoDetalle']);

    Route::get('/altoCosto/{idPresentaciones?}',['as'=>'altoCosto','uses'=>$controller.'@altoCosto', 'middleware' => 'permission:alto.costo.prestaciones']);


    Route::post('/solicitarAltoCosto/{idPresentaciones?}',['as'=>'solicitar_alto_costo','uses'=>$controller.'@solicitarAltoCosto']);


    // adelantos
    Route::get('/adelantos/{idPrestaciones?}',['as'=>'prestaciones.adelantos','uses'=> $controller.'@adelantos']);
    Route::post('/adelantos',['as'=>'prestaciones_post_adelantos','uses'=> $controller.'@postAdelantos']);
    Route::get('/getAdelantos/{adelantos_id}/{prestaciones_id}',['as'=>'getAdelantos','uses'=> $controller.'@getAdelantos']);
   
    Route::get('autorizacionAdelanto/{adelantos_id?}/{prestaciones_id?}', ['as'=>'prestaciones.autorizacion.adelantos','uses'=> $controller.'@postAdelantos']);
    

    // factura
    Route::get('/facturar/{idPrestaciones}',['as'=>'prestaciones.facturar','uses'=> $controller.'@facturar']);
    Route::post('/asignarFactura',['as'=>'prestaciones.asignarFactura','uses'=> $controller.'@asignarFactura']);
    

    //impresion de presupuestos enviados
    Route::get('/imprimirPresupuestos/{idPrestaciones}',['as'=>'prestaciones.imprimirPresupuestos','uses'=> $controller.'@imprimirPresupuestos']);


    // resolucion
    Route::get('/asignarResolucion/{idPrestaciones?}',['as'=>'prestaciones.asignarResolucion','uses'=> $controller.'@asignarResolucion'])->where('idPrestaciones','.*');
    Route::post('/asignarResolucion',['as'=>'prestaciones.post.asignarResolucion','uses'=> $controller.'@postAsignarResolucion']);

    Route::get('/imprimirResolucion/{prestacionesId}',['as'=>'prestaciones.imprimirResolucion','uses'=> $controller.'@imprimirResolucion']);


    // detalles de la prestacion
    Route::get('/detalles/{id}',['as'=>'prestaciones.detalles','uses'=> $controller.'@detalles']);

    // asignacion evaluacion social
    Route::get('/evaluacionSocial/{idPrestaciones?}',['as'=>'prestacion.evaluacionSocial','uses'=>$controller.'@evaluacionSocial' ])->where('idPrestaciones','.*');;
    Route::post('/postevaluacionSocial',['as'=>'prestacion.postEvaluacionSocial','uses'=>$controller.'@postEvaluacionSocial']);
    Route::post('/postEditEvaluacionSocial',['as'=>'prestacion.postEditEvaluacionSocial','uses'=>$controller.'@postEditEvaluacionSocial']);

    // Impresion evaluacion social
    Route::get('/imprimir/resolucion_social/{id}',['as'=>'prestaciones.imprimirResolucionSocial','uses'=>$controller.'@imprimirEvaluacionSocial']);
    Route::post('/cancelar',['as' => 'prestaciones.cancelar','uses' => $controller.'@getCancelar']);

    Route::get('/asignar/intervencion/{idPrestaciones?}/{tipo?}',['as'=>'prestaciones.asignar_intervencion','uses'=>$controller.'@getAsignarIntervencion']);
    Route::post('/asignar/postIntervencion', ['as'=>'prestaciones.postAsignarIntervencion', 'uses'=>$controller.'@postAsignarIntervencion']);
    Route::post('/generarPedido', ['as'=>'prestaciones.generar.pedido', 'uses'=>$controller.'@generarPedido']);
    // reporte dictamen
     Route::get('/dictamen/{idPrestaciones?}',['as'=>'prestaciones.dictamen_medico','uses'=>$controller.'@getDictamenMedico']);
    
     
});

