<?php

Route::group(['namespace' => 'CodeExplorer'], function (){

    Route::get('/', ['uses' => 'CodeExplorerController@index']);

    Route::post('/', ['uses' => 'CodeExplorerController@store']);

    Route::get('/contributors', ['uses' => 'CodeContributorExplorerController@index']);

    Route::get('/branches', ['uses' => 'CodeBranchExplorerController@index']);
});