<?php

Route::group(['namespace' => 'CodeExplorer'], function (){

    Route::get('/', ['uses' => 'CodeExplorerController@index']);

    Route::get('/commits', ['uses' => 'CodeExplorerController@commits']);

    Route::get('/contributors', ['uses' => 'CodeExplorerController@contributors']);

    Route::get('/branches', ['uses' => 'CodeExplorerController@branches']);
});