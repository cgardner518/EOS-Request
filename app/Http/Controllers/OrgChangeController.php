<?php

namespace App\Http\Controllers;

use App\User;
use App\OrgChange;
use App\Personnel;
use App\OrgRequest;
use App\MissionStatement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use NrlLaravel\Labcoat\Models\MenuItemAccess;
use Symfony\Component\HttpFoundation\Response;

class OrgChangeController extends Controller
{
    public function index()
    {
        //
        $orgRequests = OrgRequest::all();

        return view('org_changes.index', compact('orgRequests'));
    }

    public function create()
    {
        $org_request = new OrgRequest;
        $org_request->save();
        $id = $org_request->id;

        return redirect()->action('OrgChangeController@firstTabEdit', ['id'=>$id]);
    }

    public function reviewEdit($id)
    {
      //
      $org = OrgRequest::find($id);
      $orgs = OrgChange::allOrganizations();
      $codes = OrgChange::allOrgCodes();
      $organizations = [];
        foreach ($codes as $key => $value){
          $organizations= array_add($organizations, $codes[$key], $orgs[$key]);
        }
      $missions = $org->mission_statements;
      $changes = $org->org_changes;
      $menuName = 'orgChangeTabs';
      $suffix = "/$id/edit";
      return view('org_changes.tabs.review', compact('menuName', 'suffix', 'id', 'org', 'missions', 'changes', 'organizations'));
    }

    public function destroy($id)
    {
        OrgRequest::destroy($id);

        return redirect('/org_changes');
    }


    // -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // ******
    // * UNIT CHANGES
    // ******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    public function changesEdit($id)
    {
      //
      $org = OrgRequest::find($id);
      $codes = OrgChange::allOrgCodes();
      $orgs = OrgChange::allOrganizations();
      $orgChanges = OrgChange::where('org_request', $id)->get()->toArray();
      $menuName = 'orgChangeTabs';
      $suffix = "/$id/edit";

      return view('org_changes.tabs.changes', compact('menuName', 'suffix', 'id', 'org', 'orgs', 'orgChanges', 'codes'));
    }
    public function addChange(Request $request)
    {
      $id = $request->id;
      $modalId = $request->modalId;
      $orgs = OrgChange::allOrganizations();
      $codes = OrgChange::allOrgCodes();

      return view('org_changes.modals.orgChange', compact('modalId', 'id', 'orgs', 'codes'));
    }



    public function editChange(Request $request)
    {
      $modalId = $request->modalId;

      $unitChange = OrgChange::find($request->id);
      $id = $unitChange->org_request;


      $orgs = OrgChange::allOrganizations();
      $codes = OrgChange::allOrgCodes();

      return view('org_changes.modals.editOrgChange', compact('modalId', 'id', 'unitChange', 'orgs', 'codes'));
    }

    public function updateChange(Request $request)
    {
      $orgChange = OrgChange::find($request->id);

      $orgChange->from_title = OrgChange::allOrganizations()[$request->from_title];
      $orgChange->from_code = OrgChange::allOrgCodes()[$request->from_code];
      $orgChange->org_request = $request->org_request;

      if (!$request->to_code) {
        $orgChange->to_code = $orgChange->from_code;
      }else{
        $orgChange->to_code = $request->to_code;
      }

      if (!$request->to_title) {
        $orgChange->to_title = $orgChange->from_title;
      }else{
        $orgChange->to_title = $request->to_title;
      }

      $orgChange->save();

      return redirect()->action('OrgChangeController@changesEdit', ['id'=>$request->org_request]);
    }

    public function saveChange(Request $request)
    {
      $orgChange = new OrgChange;

      $orgChange->from_title = OrgChange::allOrganizations()[$request->from_title];
      $orgChange->from_code = OrgChange::allOrgCodes()[$request->from_code];
      $orgChange->org_request = $request->org_request;

      if (!$request->to_code) {
        $orgChange->to_code = $orgChange->from_code;
      }else{
        $orgChange->to_code = $request->to_code;
      }

      if (!$request->to_title) {
        $orgChange->to_title = $orgChange->from_title;
      }else{
        $orgChange->to_title = $request->to_title;
      }
      // dd($orgChange);
      $orgChange->save();

      return redirect()->action('OrgChangeController@changesEdit', ['id'=>$request->org_request]);
    }

    public function destroyChange($id)
    {
      $org = OrgChange::find($id);
      $tabID = $org->org_request;

      OrgChange::destroy($id);

      return redirect("/org_changes/changes/$tabID/edit");
    }

    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // ******
    // * END UNIT CHANGES
    // ******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    // -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // ******
    // * MISSION STATEMENTS
    // ******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    public function missionEdit($id)
    {
        //
        $org = OrgRequest::find($id);
        $missions = MissionStatement::where('org_request', $id)->get()->toArray();
        $orgs = OrgChange::allOrganizations();
        $codes = OrgChange::allOrgCodes();
        $organizations = [];
          foreach ($codes as $key => $value){
            $organizations= array_add($organizations, $codes[$key], $orgs[$key]);
          }
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";

        return view('org_changes.tabs.mission', compact('menuName', 'suffix', 'id', 'missions', 'organizations', 'org'));
    }

    public function mission_statements(Request $request)
    {
      $id = $request->id;
      $modalId = $request->modalId;
      $orgs = OrgChange::allOrganizations();
      $codes = OrgChange::allOrgCodes();
      $organizations = [];
        foreach ($codes as $key => $value){
          $organizations= array_add($organizations, $codes[$key], $orgs[$key]);
        }
      return view('org_changes.modals.mission_statements', compact('modalId', 'organizations', 'id'));
    }

    public function save_mission_statement(Request $request)
    {
      $mission = new MissionStatement;
      $mission->statement = $request->proposed;
      $mission->code = $request->for;
      $mission->org_request = $request->org_request;
      $mission->save();

      return redirect()->route('org_changes.mission', ['id'=>$request->org_request]);

    }

    public function edit_mission_statement(Request $request)
    {
      $mission = MissionStatement::find($request->id);
      $org_request = $mission->org_request;
      $id = $mission->id;
      $modalId = $request->modalId;
      $orgs = OrgChange::allOrganizations();
      $codes = OrgChange::allOrgCodes();
      $organizations = [];
        foreach ($codes as $key => $value){
          $organizations= array_add($organizations, $codes[$key], $orgs[$key]);
        }

      return view('org_changes.modals.edit_mission_statements', compact('modalId', 'organizations', 'id', 'mission', 'org_request'));
    }
    public function update_mission_statement(Request $request)
    {
      $mission = MissionStatement::find($request->id);
      $mission->org_request = $request->org_request;
      $mission->statement = $request->proposed;
      $mission->code = $request->for;
      $mission->save();

      return redirect()->action('OrgChangeController@missionEdit', ['id'=>$request->org_request]);
    }

    public function destroyMission($id)
    {
      $mission = MissionStatement::find($id);
      $tabID = $mission->org_request;

      MissionStatement::destroy($id);

      return redirect()->action('OrgChangeController@missionEdit', ['id'=>$tabID]);
    }

    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // ******
    // * END MISSION STATEMENTS
    // ******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    // -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // *******
    // * PERSONNEL
    // *******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    public function personnel(Request $request)
    {
      // dd($request->all());
      $id = $request->id;
      $modalId = $request->modalId;
      $usersGetter = User::all()->toArray();
      $users = [];
      foreach ($usersGetter as $user) {
        $users = array_add($users, $user['id'], $user['name']);
      }

      return view('org_changes.modals.personnel', compact('modalId', 'id', 'users'));

    }

    public function savePersonnel(Request $request)
    {
      dd($request->all());
    }

    public function personnelEdit($id)
    {
        //
        $personnel = Personnel::where('org_request', $id)->get()->toArray();
        $org = OrgRequest::find($id);
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";

        // dd($personnel);

        return view('org_changes.tabs.personnel', compact('menuName', 'suffix', 'id', 'personnel', 'org'));
    }

    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // *******
    // * END PERSONNEL
    // *******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    // -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // *******
    // * OVERVIEW
    // *******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    public function overviewEdit($id)
    {
        //
        $org = OrgRequest::find($id);
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";
        return view('org_changes.tabs.overview', compact('menuName', 'suffix', 'id', 'org'));
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

    public function update(Request $request, $id)
    {
        //
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


    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // *******
    // * END OVERVIEW
    // *******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


}
