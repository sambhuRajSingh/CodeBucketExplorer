<?php

Route::group(['namespace' => 'CodeExplorer'], function (){
    Route::get('/', ['uses' => 'CodeExplorerController@index']);
});