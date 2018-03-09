<?php


Route::group(['prefix' => 'dictamenMedico'], function() {

    Route::get('/{id?}',[
        'as' => 'dictamenMedico.index',
        'uses' => 'DictamenMedicoController@getIndex'
    ])->where('id','.*');

    Route::post('presupuestoAdjudicado',[
        'as' => 'dictamenMedico.presupuestoAdjudicado',
        'uses' => 'DictamenMedicoController@presupuestoAdjudicado'
    ]);

    Route::get('{id}/noAdjudicar',[
        'as' => 'dictamenMedico.noAdjudicar',
        'uses' => 'DictamenMedicoController@noAdjudicar'
    ]);

    Route::post('/anularAdjudicar',['as' => 'dictamenMedico.anularAdjudicar', 'uses'=> 'DictamenMedicoController@anularAdjudicar']);
  
});
Route::get('imprimirAdjudicacion/{prestacionesId}',[
    'as' => 'dictamenMedico.imprimirAdjudicacion',
    'uses' => 'DictamenMedicoController@imprimirAdjudicacion'
]);

