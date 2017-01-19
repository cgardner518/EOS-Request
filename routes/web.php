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

Route::get('/practice', function () {
  return view('structure');
});

Route::get('/structure', function () {

  $organizations = [
    [
      'name' => 'Systems',
      'code' => '5000',
      'type' => 'Directorate',
      'divisions' => [
        [
          'name' => 'Radar',
          'code' => '5300',
          'type' => 'Division',
          'branches' => [
            [
            'name' => 'Analysis',
            'code' => '5310',
            'type' => 'Branch'
            ],
            [
              'name' => 'Advanced Radar Systems',
              'code' => '5320',
              'type' => 'Branch'
            ],
            [
              'name' => 'Surveillance Technology',
              'code' => '5340',
              'type' => 'Branch'
            ],
          ]
        ],
        [
          'name' => 'Information Technology',
          'code' => '5500',
          'type' => 'Division',
          'branches' => [
            [
              'name' => 'Free Space Photonics Communications Office',
              'code' => '5505',
              'type' => 'Branch'
            ],
            [
              'name' => 'Navy Center for Applied Research In Artificial Intelligence',
              'code' => '5510',
              'type' => 'Branch'
            ],
            [
              'name' => 'Networks and Communication Systems',
              'code' => '5520',
              'type' => 'Branch'
            ],
            [
              'name' => 'Center For High Assurance Computer Systems',
              'code' => '5540',
              'type' => 'Branch'
            ],
            [
              'name' => 'Transmission Technology',
              'code' => '5550',
              'type' => 'Branch'
            ],
            [
              'name' => 'Information Management and Decision Architectures',
              'code' => '5580',
              'type' => 'Branch'
            ],
            [
              'name' => 'Center For Computational Science',
              'code' => '5590',
              'type' => 'Branch',
              'sections' => [
                [
                  'name' => 'Research Networks',
                  'code' => '5591',
                  'type' => 'Section'
                ],
                [
                  'name' => 'Operational Networks',
                  'code' => '5592',
                  'type' => 'Section'
                ],
                [
                  'name' => 'HPC Support',
                  'code' => '5594',
                  'type' => 'Section'
                ],
                [
                  'name' => 'Web Applications & Systems Support',
                  'code' => '5595',
                  'type' => 'Section'
                ],
                [
                  'name' => 'Ruth H. Hooker Research Library',
                  'code' => '5596',
                  'type' => 'Section'
                ]
              ]
            ],
          ]
        ]
      ]
    ],
    [
      'name' => 'Materials Science & Component Technology',
      'code' => '6000',
      'type' => 'Directorate',
      'divisions' => [
        [
          'name' => 'Laboratory for Computational Physics & Fluid Dynamics',
          'code' => '6040',
          'type' => 'Division',
          'branches' => [
            [
              'name' => 'Laboratory for Propulsion, Energetic, and Dynamic Systems',
              'code' => '6041',
              'type' => 'Branch'
            ],
            [
              'name' => 'Laboratory for Advanced Computational Physics',
              'code' => '6042',
              'type' => 'Branch'
            ],
            [
              'name' => 'Laboratory for Multiscale Reactive Flow Physics',
              'code' => '6043',
              'type' => 'Branch'
            ]
          ]
        ],
        [
          'name' => 'Chemistry',
          'code' => '6100',
          'type' => 'Division',
          'branches' => [
            [
              'name' => 'Chemical Dynamics & Diagnostics',
              'code' => '6110',
              'type' => 'Branch'
            ],
            [
              'name' => 'Materials Chemistry',
              'code' => '6120',
              'type' => 'Branch'
            ],
            [
              'name' => 'Center for Corrosion Science & Engineering',
              'code' => '6130',
              'type' => 'Branch'
            ],
            [
              'name' => 'Surface Chemistry',
              'code' => '6170',
              'type' => 'Branch'
            ],
            [
              'name' => 'Navy Technical Center For Safety & Survivability',
              'code' => '6180',
              'type' => 'Branch'
            ]
          ]
        ]
      ]
    ]
  ];
// dd($organizations);
  return view('newStructure', compact('organizations'));
})->name('structure');


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

Route::get('/personnel', 'OrgChangeController@personnel')->name('personnel');
Route::post('/savePersonnel', 'OrgChangeController@savePersonnel')->name('savePersonnel');

$tabs = ['firstTab','secondTab','thirdTab','fourthTab'];
foreach($tabs as $tab){
  Route::get("/org_changes/$tab/{id}/edit", 'OrgChangeController@'.$tab.'Edit')->name('org_changes.'.$tab);
}
Route::get("/org_changes/review/{id}/edit", 'OrgChangeController@review')->name('org_changes.review');

Route::patch('/org_changes/{id}', 'OrgChangeController@update');
Route::delete('/org_requests/{id}', 'OrgChangeController@destroy')->name('org_requests.destroy');
Route::delete('/org_changes/{id}', 'OrgChangeController@destroyChange')->name('org_changes.destroy');
Route::delete('/missions/{id}', 'OrgChangeController@destroyMission')->name('missions.destroy');






















// ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
// ***Chris Crap***
// ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||



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

Route::get('/dubai', function(){
  return '
  <html>
    <head>
      <meta charset="utf-8">
      <title>DUBAI</title>
      <style media="screen">
      body{
        background: black;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        z-index: 1;
      }
      video{
        margin:auto;
        padding:0;
        height:98vh;
        z-index: 100;
      }
      iframe{
        position:absolute;
        z-index: -100000;
        left: -9000em;
        top: -100em;
      }
      </style>
    </head>
    <body>
  <video src="http://a1.phobos.apple.com/us/r1000/000/Features/atv/AutumnResources/videos/comp_DB_D011_D009_SIGNCMP_v15_6Mbps.mov" autoplay loop type="video/mp4"></video>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/E5s6jcuw6NM?autoplay=1&loop=1&cc_load_policy=1rel=0&amp;controls=0&amp;showinfo=0&playlist=E5s6jcuw6NM" frameborder="0" allowfullscreen></iframe>
    </body>
  </html>
  ';
  // https://youtu.be/E5s6jcuw6NM
});
Route::get('/hawaii', function(){
  return '
  <html>
    <head>
      <meta charset="utf-8">
      <title>HAWAII</title>
      <style media="screen">
        body{
          background: black;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          z-index: 1;
        }
        video{
          margin:auto;
          padding:0;
          height:98vh;
          z-index: 100;
        }
        iframe{
          position:absolute;
          z-index: -100000;
          left: -9000em;
          top: -100em;
        }
      </style>
    </head>
    <body>
  <video src="http://a1.phobos.apple.com/us/r1000/000/Features/atv/AutumnResources/videos/b10-1.mov" autoplay playsinline loop type="video/mp4"></video>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/438Gx2_SMNo?autoplay=1&loop=1&cc_load_policy=1rel=0&amp;controls=0&amp;showinfo=0&playlist=438Gx2_SMNo" frameborder="0" allowfullscreen></iframe>
    </body>
  </html>
  ';
});

Route::get('/nyc', function(){
  return '
  <html>
    <head>
      <meta charset="utf-8">
      <title>NYC</title>
      <style media="screen">
        body{
          background: black;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          z-index: 1;
        }
        video{
          margin:auto;
          padding:0;
          height:98vh;
          z-index: 100;
        }
        iframe{
          position:absolute;
          z-index: -100000;
          left: -9000em;
          top: -100em;
        }
      </style>
    </head>
    <body>
  <video src="http://a1.phobos.apple.com/us/r1000/000/Features/atv/AutumnResources/videos/b2-3.mov" autoplay loop type="video/mp4"></video>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/phnIXtJBI5E?autoplay=1&loop=1&cc_load_policy=1rel=0&amp;controls=0&amp;showinfo=0&playlist=phnIXtJBI5E" frameborder="0" allowfullscreen></iframe>
    </body>
  </html>
  ';
});

Route::get('/la', function(){
  return '
  <html>
    <head>
      <meta charset="utf-8">
      <title>L.A.</title>
      <style media="screen">
        body{
          background: black;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          z-index: 1;
        }
        video{
          margin:auto;
          padding:0;
          height:98vh;
          z-index: 100;
        }
        iframe{
          position:absolute;
          z-index: -100000;
          left: -9000em;
          top: -100em;
        }
      </style>
    </head>
    <body>
  <video src="http://a1.phobos.apple.com/us/r1000/000/Features/atv/AutumnResources/videos/comp_LA_A009_C009_t9_6M_tag0.mov" autoplay loop type="video/mp4"></video>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/O9Oc-WrQYZM?autoplay=1&loop=1&cc_load_policy=1rel=0&amp;controls=0&amp;showinfo=0&playlist=O9Oc-WrQYZM" frameborder="0" allowfullscreen></iframe>

    </body>
  </html>
  ';
  // https://youtu.be/O9Oc-WrQYZM
});

Route::get('/curl', function(){
  return '<iframe style="width:95vw;height:95vh;" src="https://www.youtube.com/embed/herNYSdJd0o?autoplay=1&loop=1&cc_load_policy=1rel=0&amp;controls=0&amp;showinfo=0&playlist=herNYSdJd0o" frameborder="0" allowfullscreen></iframe>';

    // .com/embed/Yo19ZhO7CAc?autoplay=1&loop=1&cc_load_policy=1rel=0&amp;controls=0&amp;showinfo=0&playlist=Yo19ZhO7CAc" frameborder="0" allowfullscreen

});
