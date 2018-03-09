<?php
/*
// modelo
$model = 'proveedores';

Route::group(['prefix' => $model], function() {

    //var controlador
    $controller = 'ProveedoresController';

    Route::get('/',['as' => 'proveedores.index', 'uses' => $controller.'@getIndex']);
    Route::get('/nuevo_proveedores',['as' => 'proveedores.nuevo', 'uses' => $controller.'@getNew']);
    Route::get('/detalle_proveedor/{proveddores_id}',['as'=>'proveedores.detalle','uses' => $controller.'@getDetalle']);


    Route::post('/create',['as' => 'proveedores.create','uses' => $controller.'@postCreate']);


});


*/

Route::group(['prefix' => 'proveedores'], function() {

    Route::get('',[
        'as' => 'proveedores.index',
        'uses' => 'ProveedoresController@getIndex',
        'middleware' => 'permission:listar.sector.proveedores'
    ]);

    Route::get('/nuevo',[
        'as' => 'proveedores.nuevo',
        'uses' => 'ProveedoresController@getNew'
    ]);

    Route::post('/crear', [
        'as' => 'proveedores.create',
        'uses' => 'ProveedoresController@postCreate'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('/ayudaDirecta/{estado}', [
            'as' => 'proveedores.ayudaDirecta',
            'uses' => 'ProveedoresController@getAyudaDirecta'
        ]);
        
        Route::get('/editar', [
            'as' => 'proveedores.editar',
            'uses' => 'ProveedoresController@getEdit',
            'middleware' => 'permission:editar.sector.proveedores'
        ]);

        Route::get('/eliminar', [
            'as' => 'proveedores.eliminar',
            'uses' => 'ProveedoresController@getDelete',
            'middleware' => 'permission:borrar.sector.proveedores'
        ]);

        Route::post('/update', [
            'as' => 'proveedores.update',
            'uses' => 'ProveedoresController@postUpdate'
        ]);
        Route::get('/detalle_proveedor',[
            'as'=>'proveedores.detalle','uses' => 'ProveedoresController@getDetalle','middleware' => 'permission:detalles.sector.proveedores']);

        Route::get('/crearFactura',['as'=> 'proveedores.crearFactura', 'uses'=>'ProveedoresController@crearFactura']);
        Route::post('/crearFactura',['as'=> 'proveedores.postCrearFactura', 'uses'=>'ProveedoresController@postCrearFactura']);

        Route::post('/addItems',['as'=> 'proveedores.postAddItems', 'uses'=>'ProveedoresController@postAddItems']);
       
        
    });


    // facturacion
    Route::get('/addItems/{facturasId?}',['as'=> 'proveedores.addItems', 'uses'=>'ProveedoresController@addItems']);
    Route::get('/deleteItem/{id}',['as'=>'proveedores.deleteItem', 'uses'=>'ProveedoresController@deleteItem']);
    Route::get('/findFacturas/{id?}',['as'=> 'proveedores.findFacturas', 'uses'=>'ProveedoresController@findFacturas']);
    
    Route::get('/factura/{nro}',[ 'as' => 'proveedores.detalle_factura', 'uses' => 'ProveedoresController@detalleFactura' ]);
    Route::post('/autorizarPago/{facturaId?}',[ 'as' => 'proveedores.autorizarPago', 'uses' => 'ProveedoresController@autorizarPago' ]);
    Route::get('autorizacion_pago/{facturaId}',[ 'as' => 'proveedores.lastAutorizacion_pago', 'uses' => 'ProveedoresController@lastAutorizacion_pago' ]);

    Route::post('/subirExcel/{id?}',[ 'as' => 'proveedores.subir.excel', 'uses' => 'ProveedoresController@subirExcel' ]);
    Route::post('/procesarExcel/{id?}',[ 'as' => 'proveedores.procesar.excel', 'uses' => 'ProveedoresController@procesarExcel' ]);

    Route::post('/subirPresupuestos/{id?}',[ 'as' => 'proveedores.subir.presupuesto', 'uses' => 'ProveedoresController@subirPresupuesto']);

    Route::post('/procesarPresupuesto/{id?}',[ 'as' => 'proveedores.procesar.presupuesto', 'uses' => 'ProveedoresController@procesarPresupuesto' ]);
    
    Route::get('/descarga',['as'=>'descargaFarmaciaExcel','uses'=>'ProveedoresController@descargaFarmaciaExcel']); 
    // proveedores anexo
    // proveedores providencia
    Route::get('/providencia/{liquidacion_id}',['as'=>'proveedores.getProvidencia','uses'=>'ProveedoresController@getProvidencia']);

    Route::get('/resolucion/{liquidacion_id}', ['as'=>'proveedores.getResolucion', 'uses'=>'ProveedoresController@getResolucion']);
    
    Route::post('/liquidacion',['as'=>'proveedores.procesarLiquidacion','uses'=>'ProveedoresController@procesarLiquidacion']);
    Route::get('/liquidacion/{liquidacion_id}/{xls?}',['as'=>'proveedores.getLiquidacion','uses'=>'ProveedoresController@getLiquidacion']);

    Route::get('/anexo/{liquidacion_id}',['as'=>'proveedores.getAnexo','uses'=>'ProveedoresController@getAnexo']);
    Route::get('/getLiquidacionAjax/{liquidacion_id?}',['as'=>'proveedores.getLiquidacionAjax','uses'=>'ProveedoresController@getLiquidacionAjax']);

    Route::get('/historico/{id?}',['as'=>'proveedores.liquidaciones_historico','uses'=>'ProveedoresController@getliquidacionesHistorico']);

    Route::get('/deleteLiquidacion/{id}', ['as'=>'proveedores.liquidaciones.borrar','uses'=>'ProveedoresController@deleteLiquidacion',]);

    Route::get('/armaExcel', ['as'=>'proveedores.buildExcel','uses'=>'PrestacionesController@buildExcel']);

    Route::post('/subirCompulsas', ['as'=>'proveedores.subir.compulsas','uses'=>'ProveedoresController@subirCompulsas']);
    Route::get('/actaDeApertura/{prestacionesId?}',['as'=>'proveedores.actaDeApertura', 'uses'=>'ProveedoresController@actaDeApertura']);
    /*
    Route::get('/test',function(){

     foreach (\App\Entities\Presupuestos::where('estado', 8)->get()->groupBy('file_name') as $a => $pres )
        {


            $file = storage_path('Presupuestos/') . $a;

            Mail::send('casos.prestaciones.mails.mail_presupuesto_proveedor', [ 'pres'=> $pres], function ($message) use ($pres, $file)
            {
                $message->from(env('MAIL_AYUDA_DIRECTA'));

                $message->to($pres->first()->Proveedores->EmailLists())
                    ->subject('COMPULSA DE MEDICAMENTOS ')
                    ->replyTo(env('MAIL_SECTOR_PRESUPUESTOS'), 'DADSE');

                    if (!is_null($file))
                        $message->attach($file);
            });

                foreach ($pres  as $p)
                {
                    $p->estado = 9;
                    $p->save();
                }
        }

    });
    */
});


