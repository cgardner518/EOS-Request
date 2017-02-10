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


Route::get('/', function(){
  Auth::loginUsingId('855bf786-c83c-11e5-a306-08002777c33d');
  return redirect('/about');
});

Route::get('/v', function () {return view('welcome');})->name('velcome');
Route::get('/jq', function(){
  return redirect('https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js');
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
Route::get('/practice', function () {
  return view('pract');
});

// *------------------------------------------------------------------------------------------------------------------------------*
// EOS Request routes
// *------------------------------------------------------------------------------------------------------------------------------*

Route::get('/requests', 'EOSRequestsController@index');
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

// *------------------------------------------------------------------------------------------------------------------------------*
// End EOS Request routes
// *------------------------------------------------------------------------------------------------------------------------------*



Route::get('/org_changes/create', 'OrgChangeController@create');
Route::get('/org_changes', 'OrgChangeController@index');
Route::patch('/org_changes/{id}', 'OrgChangeController@update');
Route::delete('/org_changes/{id}', 'OrgChangeController@destroyChange')->name('org_changes.destroy');
Route::get('/newChartDownload/{id}', 'OrgChangeController@newChartDownload');
Route::get('/oldChartDownload/{id}', 'OrgChangeController@oldChartDownload');

Route::get('/addChange', 'OrgChangeController@addChange')->name('change');
Route::post('/saveChange', 'OrgChangeController@saveChange')->name('saveOrgChange');
Route::get('/editChange', 'OrgChangeController@editChange')->name('editChange');
Route::patch('/updateChange', 'OrgChangeController@updateChange')->name('updateChange');

Route::get('/missions', 'OrgChangeController@mission_statements')->name('mission_statements');
Route::post('/saveMission', 'OrgChangeController@save_mission_statement')->name('save_mission_statement');
Route::get('/editMission', 'OrgChangeController@edit_mission_statement')->name('edit_mission_statement');
Route::patch('/updateMission', 'OrgChangeController@update_mission_statement')->name('update_mission_statement');
Route::delete('/missions/{id}', 'OrgChangeController@destroyMission')->name('missions.destroy');

Route::get('/personnel', 'OrgChangeController@personnel')->name('personnel');
Route::post('/savePersonnel', 'OrgChangeController@savePersonnel')->name('savePersonnel');

$tabs = ['overview','changes','mission','personnel', 'review'];
foreach($tabs as $tab){
  Route::get("/org_changes/$tab/{id}/edit", 'OrgChangeController@'.$tab.'Edit')->name('org_changes.'.$tab);
}

Route::delete('/org_requests/{id}', 'OrgChangeController@destroy')->name('org_requests.destroy');



// *------------------------------------------------------------------------------------------------------------------------------*
//  Org Structure Routes
// *------------------------------------------------------------------------------------------------------------------------------*
Route::delete('/fakeDestroy', function(){
  return ;
})->name('fakery');

Route::post('/changeOrgInfo', 'OrgStructureController@change_org_info')->name('change_org_info');

Route::get('/structure', 'OrgStructureController@index')->name('structure');

Route::get('structure/{id}', 'OrgStructureController@show');
Route::get('/structure/{id}/{role_id}/editAssignment/{assignment}', 'OrgStructureController@edit_role_assignment')->name('edit_role_assignment');
Route::get('/structure/{id}/edit', 'OrgStructureController@edit_org_info')->name('edit_org_info');
Route::get('/structure/{id}/editrole/{role_id}', 'OrgStructureController@edit_org_role')->name('edit_org_role');

// *------------------------------------------------------------------------------------------------------------------------------*
//  End Org Structure Routes
// *------------------------------------------------------------------------------------------------------------------------------*
