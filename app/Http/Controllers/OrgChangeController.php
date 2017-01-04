<?php

namespace App\Http\Controllers;

use App\OrgRequest;
use App\OrgChange;
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
        // dd(OrgChange::allOrganizations()[1]);
        $org = OrgRequest::find($id);
        $codes = OrgChange::allOrgCodes();
        $orgs = OrgChange::allOrganizations();
        $orgChanges = OrgChange::where('org_request', $id)->get()->toArray();
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";

        return view('org_changes.tabs.second', compact('menuName', 'suffix', 'id', 'org', 'orgs', 'orgChanges', 'codes'));
    }
    public function thirdTabEdit($id)
    {
        //
        $org = OrgRequest::find($id);
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";
        return view('org_changes.tabs.third', compact('menuName', 'suffix', 'id'));
    }
    public function fourthTabEdit($id)
    {
        //
        $org = OrgRequest::find($id);
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";
        return view('org_changes.tabs.fourth', compact('menuName', 'suffix', 'id'));
    }

    public function addChange(Request $request)
    {
      // dd($request->all());
      $id = $request->id;
      $modalId = $request->modalId;
      $orgs = OrgChange::allOrganizations();
      $codes = OrgChange::allOrgCodes();
      // dd($orgs[1]);
      return view('org_changes.modals.orgChange', compact('modalId', 'id', 'orgs', 'codes'));
    }

    public function editChange(Request $request)
    {
      $modalId = $request->modalId;

      $unitChange = OrgChange::find($request->id);

      $id = $unitChange->org_request;
      // dd($unitChange);
      $orgs = OrgChange::allOrganizations();
      $codes = OrgChange::allOrgCodes();

      return view('org_changes.modals.editOrgChange', compact('modalId', 'id', 'unitChange', 'orgs', 'codes'));
    }

    public function updateChange(Request $request)
    {
      // dd($request->all());
      $orgChange = OrgChange::find($request->id);

      if ($request->type == 0) {


        $orgChange->type = 0;
        $orgChange->from = OrgChange::allOrganizations()[$request->from];
        $orgChange->to = $request->to;
        $orgChange->org_request = $request->org_request;

        $orgChange->save();

      }else{

        $orgChange->type = 1;
        $orgChange->from = OrgChange::allOrgCodes()[$request->from];
        $orgChange->to = $request->to;
        $orgChange->org_request = $request->org_request;

        $orgChange->save();
      }

      return redirect()->action('OrgChangeController@secondTabEdit', ['id'=>$request->org_request]);
    }

    public function saveChange(Request $request)
    {

      $orgChange = new OrgChange;

      if ($request->type == 0) {
        $orgChange->type = 0;
        $orgChange->from = OrgChange::allOrganizations()[$request->from];
        $orgChange->to = $request->to;
        $orgChange->org_request = $request->org_request;

        $orgChange->save();

      }else {

        $orgChange->type = 1;
        $orgChange->from = OrgChange::allOrgCodes()[$request->from];
        $orgChange->to = $request->to;
        $orgChange->org_request = $request->org_request;

        $orgChange->save();
      }

      return redirect()->action('OrgChangeController@secondTabEdit', ['id'=>$request->org_request]);
    }

    // ******
    // * MISSION STATEMENTS
    // ******

    public function mission_statements(Request $request)
    {
      $modalId = $request->modalId;
      $orgs = OrgChange::allOrganizations();
      $codes = OrgChange::allOrgCodes();

      // dd($modalId);
      return view('org_changes.modals.mission_statements', compact('modalId', 'orgs', 'codes'));
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

    public function destroyChange($id)
    {
      $org = OrgChange::find($id);
      $tabID = $org->org_request;

      // dd($tabID);

      OrgChange::destroy($id);

      return redirect("/org_changes/secondTab/$tabID/edit");
    }
}
