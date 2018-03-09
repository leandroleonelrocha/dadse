<?php
// modelo
$model = 'ayudaDirecta';

Route::group(['prefix' => $model], function() {

    //var controlador
    $controller = 'AyudaDirectaController';

    /*    
    Route::get('/nuevo',[
        'as' => 'ayuda_directa.index',
        'uses' => $controller.'@getIndex'
    ]);
    */    

    Route::get('/nuevo/{id?}/{edit?}',[
        'as' => 'ayudaDirecta.nuevo',
        'uses' => $controller.'@getNew',
       'middleware' => 'permission:ayuda.directa.prestaciones'
    ]);//->where('id','.*');


    Route::post('/crear', [
        'as' => 'ayudaDirecta.create',
        'uses' => $controller.'@postCreate'
    ]);
    
    Route::get('/pdf/{id}',[
         'as' => 'ayudaDirecta.pdf',
         'uses' => $controller.'@getPdf',
         'middleware' => 'permission:ayuda.directa.prestaciones' 
    ]);
   
    Route::group(['prefix' => '{id}'], function() use($controller) {

        Route::post('/update', [
            'as' => 'ayudaDirecta.update',
            'uses' =>  $controller.'@postUpdate'
        ]);

        Route::get('/delete',[
         'as' => 'ayudaDirecta.delete',
         'uses' => $controller.'@delete'
         //'middleware' => 'permission:ayuda.directa.prestaciones' 
        ]);


    });

    Route::post('/nuevo/consultar_importe',[

         'as'   => 'ayudaDirecta.consultar_importe',
         'uses' => $controller.'@consultar_importe' 
    ]);

    Route::get('/reporte',[
        'as'   => 'ayudaDirecta.lastPdf',
        'uses' => $controller.'@lastPdf' 

    ]);

    Route::get('/reporte-edit/{id}',[
        'as'   => 'ayudaDirecta.editPdf',
        'uses' => $controller.'@EditPdf' 

    ]);

});

