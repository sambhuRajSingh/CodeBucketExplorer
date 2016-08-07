<?php

Route::group(['namespace' => 'CodeExplorer'], function (){

    Route::get('/', ['uses' => 'CodeExplorerController@index']);

    Route::post('/', ['uses' => 'CodeExplorerController@store']);

    Route::get('/lastCommit', ['uses' => 'CodeExplorerController@lastCommit']);

    Route::get('/commits', ['uses' => 'CodeExplorerController@commits']);

    Route::get('/contributors', ['uses' => 'CodeExplorerController@contributors']);

    Route::get('/branches', ['uses' => 'CodeExplorerBranchController@index']);
});