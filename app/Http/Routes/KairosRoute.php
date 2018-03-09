<?php


    Route::get('search_kairos/{id}',[
        'as' => 'kairos.search',
        'uses' => 'KairosController@getSearch'
    ]);

    Route::get('search_kairos_presentaciones/{id}',[
        'as' => 'kairos.search.presentaciones',
        'uses' => 'PrestacionesController@getSearchPresentaciones'
    ]);



