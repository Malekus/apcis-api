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

Route::get('partenaire', 'PartenaireController@index')
    ->name('index');
Route::get('partenaire/{id}', 'PartenaireController@show')
    ->name('show');
Route::post('partenaire', 'PartenaireController@store')
    ->name('store');
Route::put('partenaire/{id}', 'PartenaireController@store')
    ->name('store');
Route::delete('partenaire/{id}', 'PartenaireController@destroy')
    ->name('destroy');
