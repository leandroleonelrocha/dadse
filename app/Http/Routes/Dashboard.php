<?php

Route::get('', [
    'as' => 'dashboard.index',
    'uses' => 'HomeController@index'
]);

