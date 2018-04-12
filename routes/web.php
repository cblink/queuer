<?php

use Illuminate\Support\Facades\Route;

Route::prefix('delay')->group(function () {
    Route::get('/', 'DelayJobController@index')->name('queuer.delay.index');
    Route::post('destroy', 'DelayJobController@destroy')->name('queuer.delay.destroy');
});
//Route::prefix('fail')->group(function () {
//    Route::get('/', 'FailJobController@index')->name('queuer.fail.index');
//    Route::post('destroy', 'FailJobController@destroy')->name('queuer.fail.destroy');
//});

Route::resource('fail', 'FailJobController')->names('queuer.fail');