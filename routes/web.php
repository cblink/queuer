<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'QueueController@index')->name('queuer.delay.index');
Route::post('destroy', 'QueueController@destroy')->name('queuer.delay.destroy');