<?php

Route::group(['namespace' => 'Dulat\ErrorHandler\Http\Controllers'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/detail/{id?}', 'HomeController@detail')->name('detail');
    Route::delete('/clear', 'HomeController@clear')->name('clear');
    Route::delete('/{id}', 'HomeController@destroy')->name('destroy');
});