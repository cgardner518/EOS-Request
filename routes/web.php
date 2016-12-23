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
// Route::get('/requests/changeStatus/{id}', 'EOSRequestsController@status')->name('request.changeStatus');
Route::get('/reject', 'EOSRequestsController@reject')->name('request.reject');
Route::post('/reject/{id}', 'EOSRequestsController@rejected');
Route::post('/change/{id}', 'EOSRequestsController@change');
Route::get('/requests/create', 'EOSRequestsController@create')->name('request.create');
Route::get('/requests/{id}', 'EOSRequestsController@show');
Route::patch('/requests/{id}', 'EOSRequestsController@update')->name('request.update');
Route::delete('/requests/{id}', 'EOSRequestsController@destroy')->name('request.destroy');
Route::get('/requests/{id}/edit', 'EOSRequestsController@edit')->name('request.edit');

Route::post('/requests', 'EOSRequestsController@store')->name('request.store');
Route::get('/download/{id}/{file_name}', 'EOSRequestsController@download');

Route::get('/loggery', 'EOSRequestsController@loggery');
Route::get('/solo', 'EOSRequestsController@solo');
Route::get('/peasant', function(){
  Auth::loginUsingId('c5ad9b2d-b59e-11e6-8fb9-0aad45e20ffe');
  return redirect('/requests');
});


Route::get('/org_changes/create', 'OrgChangeController@create');
Route::get('/org_changes', 'OrgChangeController@index');
// Route::get('/org_changes/firstTab', 'OrgChangeController@firstTab');
Route::get('/org_changes/firstTab/{id}/edit', 'OrgChangeController@firstTabEdit');
Route::get('/org_changes/secondTab/{id}/edit', 'OrgChangeController@secondTabEdit');
Route::get('/org_changes/thirdTab/{id}/edit', 'OrgChangeController@thirdTabEdit');
Route::get('/org_changes/fourthTab/{id}/edit', 'OrgChangeController@fourthTabEdit');
Route::patch('/org_changes/{id}', 'OrgChangeController@update');
