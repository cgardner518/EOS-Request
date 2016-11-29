<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use File;
use Storage;
use App\EOSRequest;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEosRequest;
class EOSRequestsController extends Controller
{
    public function index()
    {

      $eosrequests = EOSRequest::with('users')->get();
      // dd($eosrequests);
      // $user = Auth::user();

      return view('requests.index', compact('eosrequests'));

    }

    public function show(EOSRequest $request)
    {
      return view('requests.show', compact('request'));
    }

    public function status($id, Request $request)
    {
      $modalId = $request->modalId;

      return view('requests.modals.changeStatus', compact('modalId', 'id'));
    }

    public function reject($id)
    {
      // dd($id);
      $eos = EOSRequest::find($id);

      $eos->status = 3;

      $eos->save();

      $eosrequests = EOSRequest::with('users')->get();

      // return view('requests.index', compact('eosrequests'));
      return $this->index();

    }

    public function create(Request $request)
    {
      $modalId = $request->modalId;

      $eos = new EOSRequest;
      // dd($modalId);

      return view('requests.modals.create', compact('modalId', 'eos'));
    }

    public function store(CreateEosRequest $request)
    {

      $thisRequest = $request->all();

      $thisRequest['needed_by'] = date('Y-m-d h:i:s');
      $thisRequest['completion_date'] = date('Y-m-d h:i:s');
      // $thisRequest['user_id'] = Auth::user()->id;
      $thisRequest['project_id'] = 3;
      $thisRequest['status'] = 0;
      // dd(request()->file('stl'));
      // Get uploaded file info
      // dd($request->stl);
      if($request->file('stl'))
      {
        $fileName = time() . '-' . $request->file('stl')->getClientOriginalName();
        Storage::disk('local')->put('stlFiles/'.$fileName,File::get($request->file('stl')));

        // $request->stl->store('stlFiles');



        // $thisRequest['stl'] = $fileName;

        $filePath = $request->file('stl')->path();

      }
      dd([$thisRequest, $request->file('stl')]);
      $eos = EOSRequest::create($thisRequest);

      $eos->user_id = Auth::user()->id;
      $eos->save();

      // Get all EOSRquests.. again
      $eosrequests = EOSRequest::all();

      return view('requests.index', compact('eosrequests'));
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
      $modalId = 'edit_' . $id;
      $eos = EOSRequest::findOrFail($id);
      // dd($modalId);

      return view('requests.modals.edit', compact('modalId', 'eos'));
    }

    public function update(Request $request, $id)
    {
      $eos = EOSRequest::findOrFail($id);

      $eos->update($request->all());

      return $this->index();
    }

}
