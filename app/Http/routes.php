<?php

Route::group(['middleware' => 'web'], function () {
    include('Routes/CodeExplorer.php');
});
