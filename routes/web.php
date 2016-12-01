<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/requests', 'EOSRequestsController@index');
Route::post('/reject/{id}', 'EOSRequestsController@reject');
Route::post('/change/{id}', 'EOSRequestsController@change');
Route::get('/requests/create', 'EOSRequestsController@create')->name('request.create');
Route::get('/requests/{id}', 'EOSRequestsController@show');
Route::patch('/requests/{id}', 'EOSRequestsController@update')->name('request.update');
Route::delete('/requests/{id}', 'EOSRequestsController@destroy')->name('request.destroy');
Route::get('/requests/{id}/edit', 'EOSRequestsController@edit')->name('request.edit');

// Route::get('/requests/changeStatus/{id}', 'EOSRequestsController@status')->name('request.changeStatus');
Route::post('/requests', 'EOSRequestsController@store')->name('request.store');
Route::get('/download/{file_name}', 'EOSRequestsController@download');
