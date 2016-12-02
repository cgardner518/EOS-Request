<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Gate;
use File;
use Storage;
use App\Project;
use App\EOSRequest;
use Illuminate\Http\Request;
use App\Http\Requests\EditEosRequest;
use App\Http\Requests\CreateEosRequest;

class EOSRequestsController extends Controller
{
    public function index()
    {
        $eosrequests = EOSRequest::with('users')->get();

        $user = Auth::user();

        $projects = Project::allProjects();

      if(Gate::allows('eosAdmin')){
        return view('requests.index', compact('eosrequests', 'user', 'projects'));
      }
      return view('requests.limited.index', compact('eosrequests', 'user', 'projects'));
    }

    public function show($id)
    {
      $eos = EOSRequest::findOrFail($id);

      return view('requests.show', compact('eos'));
    }

    public function reject($id)
    {
      $eos = EOSRequest::find($id);

      $eos->status = 3;

      $eos->save();

      return redirect('/requests');
    }
    public function change($id)
    {
      $eos = EOSRequest::find($id);

      $eos->status ++;
      $eos->save();

      return redirect('/requests');
    }

    public function create(Request $request)
    {
      $eos = new EOSRequest;

      $projects = Project::projectsForUser();
      $projects[0] = 'Not a project';
      ksort($projects);

      return view('requests.create', compact('eos', 'projects'));
    }

    public function store(CreateEosRequest $request)
    {

      $thisRequest = $request->all();
      // The DB was acting up because of the dates being empty so..
      $thisRequest['needed_by'] = date('Y-m-d h:i:s');
      $thisRequest['completion_date'] = date('Y-m-d h:i:s');

      // Get uploaded file info
      $fileName = time() . '-' . $request->file('stl')->getClientOriginalName();
      $request->file('stl')->storeAs('stlFiles', $fileName);
      $thisRequest['stl'] = $fileName;

      // Save the EOS Request, save the world
      $eos = EOSRequest::create($thisRequest);
      $eos->user_id = Auth::user()->id;
      $eos->save();

      return redirect('/requests');
    }

    public function download($file_name)
    {
      $file = '../storage/app/stlFiles/'. $file_name;
      if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
      }

    }

    public function edit($id)
    {
      $eos = EOSRequest::findOrFail($id);

      $projects = Project::projectsForUser($eos->user_id);
      $projects[0] = 'Not A Project';
      ksort($projects);

      return view('requests.edit', compact('eos', 'projects'));
    }

    public function update(EditEosRequest $request, $id)
    {

      $eos = EOSRequest::findOrFail($id);

      // Change status from string to integer
      switch ($request->status){
        case 'pending':
          $request->status = 0;
          break;
        case 'in-process':
          $request->status = 1;
          break;
        case 'complete':
          $request->status = 2;
          break;
        default:
          $request->status = $eos->status;
      }
      // I set the status in the switch stateent so I'll leave it out in the update method
      $collection = collect($request->all());
      $eos->update($collection->forget('status')->toArray());
      
      $eos->status = $request->status;
      $eos->save();

       return redirect('/requests');
    }

    public function destroy($id)
    {
      EOSRequest::destroy($id);

      return redirect('/requests');
    }

}
