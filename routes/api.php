<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('configuration', 'ConfigurationController@index')
    ->name('index');
Route::get('configuration/{id}', 'ConfigurationController@show')
    ->name('show');
Route::post('configuration', 'ConfigurationController@store')
    ->name('store');
Route::put('configuration/{id}', 'ConfigurationController@store')
    ->name('store');
Route::delete('configuration/{id}', 'ConfigurationController@destroy')
    ->name('destroy');

Route::get('personne', 'PersonneController@index')
    ->name('index');
Route::get('personne/{id}', 'PersonneController@show')
    ->name('show');
Route::post('personne', 'PersonneController@store')
    ->name('store');
Route::put('personne/{id}', 'PersonneController@store')
    ->name('store');
Route::delete('personne/{id}', 'PersonneController@destroy')
    ->name('destroy');
