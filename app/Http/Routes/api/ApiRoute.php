<?php

    Route::get('cuenta-corriente/{id}',[
        'as' => 'api.cuentaCorriente',
        'uses' => 'PersonaFisicaController@cuentaCorriente'
    ]);
