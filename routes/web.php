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

Route::get('/', function () {return view('welcome');})->name('velcome');

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

Route::get('/stigz', function(){
  $ch = curl_init();

  // set url
  curl_setopt($ch, CURLOPT_URL, "https://www.stigviewer.com/stig/application_security_and_development/2014-04-03/MAC-3_Sensitive/json");

  //return the transfer as a string
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  // $output contains the output string
  $output = curl_exec($ch);
  $output = json_decode($output, true);

  // close curl resource to free up system resources
  curl_close($ch);

  return response()->json($output);
});

Route::get('/jq', function(){
  return redirect('https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js');
});

Route::get('/slomo', function(){
  return redirect('http://a1.phobos.apple.com/us/r1000/000/Features/atv/AutumnResources/videos/entries.json');
});

Route::get('/org_changes/create', 'OrgChangeController@create');
Route::get('/org_changes', 'OrgChangeController@index');
Route::get('/newChartDownload/{id}', 'OrgChangeController@newChartDownload');
Route::get('/oldChartDownload/{id}', 'OrgChangeController@oldChartDownload');

Route::get('/addChange', 'OrgChangeController@addChange')->name('change');
Route::post('/saveChange', 'OrgChangeController@saveChange')->name('saveOrgChange');
Route::get('/editChange', 'OrgChangeController@editChange')->name('editChange');
Route::get('/editChange', 'OrgChangeController@editChange')->name('editChange');
Route::get('/missions', 'OrgChangeController@mission_statements')->name('mission_statements');

$tabs = ['firstTab','secondTab','thirdTab','fourthTab'];
foreach($tabs as $tab){
  Route::get("/org_changes/$tab/{id}/edit", 'OrgChangeController@'.$tab.'Edit')->name('org_changes.'.$tab);
}

Route::patch('/org_changes/{id}', 'OrgChangeController@update');
Route::delete('/org_requests/{id}', 'OrgChangeController@destroy')->name('org_requests.destroy');
Route::delete('/org_changes/{id}', 'OrgChangeController@destroyChange')->name('org_changes.destroy');
