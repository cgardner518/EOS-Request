<?php

namespace App\Http\Controllers;

use App\OrgRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use NrlLaravel\Labcoat\Models\MenuItemAccess;
use Symfony\Component\HttpFoundation\Response;

class OrgChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orgRequests = OrgRequest::all();

        return view('org_changes.index', compact('orgRequests'));
    }
    public function firstTabEdit($id)
    {
        //
        $org = OrgRequest::find($id);
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";
        return view('org_changes.tabs.first', compact('menuName', 'suffix', 'id', 'org'));
    }
    public function secondTabEdit($id)
    {
        //
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";
        
        return view('org_changes.tabs.second', compact('menuName', 'suffix', 'id'));
    }
    public function thirdTabEdit($id)
    {
        //
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";
        return view('org_changes.tabs.third', compact('menuName', 'suffix', 'id'));
    }
    public function fourthTabEdit($id)
    {
        //
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";
        return view('org_changes.tabs.fourth', compact('menuName', 'suffix', 'id'));
    }

    public function newChartDownload($id){
      $org = OrgRequest::findOrFail($id);
      $file = '../storage/app/newCharts/'.$id.'/'.$org->new_orgChart;

      return response(Storage::get('newCharts/'.$id.'/'.$org->new_orgChart))
                          ->header('Content-Description', 'File Transfer')
                          ->header('Content-Type', 'application/octet-stream')
                          ->header('Content-Disposition', 'attachment; filename="'.basename($file).'"')
                          ->header('Cache-Control', 'must-revalidate')
                          ->header('Pragma', 'public')
                          ->header('Content-Length', filesize($file))
                          ->header('Expires', '0');
    }
    public function oldChartDownload($id){
      $org = OrgRequest::findOrFail($id);
      $file = '../storage/app/oldCharts/'.$id.'/'.$org->current_orgChart;

      return response(Storage::get('oldCharts/'.$id.'/'.$org->current_orgChart))
                          ->header('Content-Description', 'File Transfer')
                          ->header('Content-Type', 'application/octet-stream')
                          ->header('Content-Disposition', 'attachment; filename="'.basename($file).'"')
                          ->header('Cache-Control', 'must-revalidate')
                          ->header('Pragma', 'public')
                          ->header('Content-Length', filesize($file))
                          ->header('Expires', '0');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $org_request = new OrgRequest;
        $org_request->save();
        $id = $org_request->id;

        return redirect()->action('OrgChangeController@firstTabEdit', ['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->all());
        $orgRequest = OrgRequest::findOrFail($id);
        if($request->file('current_orgChart')){
          $file1Name = $request->file('current_orgChart')->getClientOriginalName();
          $request->file('current_orgChart')->storeAs('oldCharts/'.$id, $file1Name);
          $orgRequest->current_orgChart = $file1Name;
        };
        if($request->file('new_orgChart')){
          $file2Name = $request->file('new_orgChart')->getClientOriginalName();
          $request->file('new_orgChart')->storeAs('newCharts/'.$id, $file2Name);
          $orgRequest->new_orgChart = $file2Name;
        }


        $orgRequest->title = $request['title'];
        $orgRequest->description = $request['description'];
        $orgRequest->save();

        return redirect('/org_changes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        OrgRequest::destroy($id);

        return redirect('/org_changes');
    }
}
