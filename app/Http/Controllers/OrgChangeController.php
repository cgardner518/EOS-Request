<?php

namespace App\Http\Controllers;

use App\OrgRequest;
use Illuminate\Http\Request;
use NrlLaravel\Labcoat\Models\MenuItemAccess;

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
    public function firstTab()
    {
        //
        $menuName = 'orgChangeTabs';
        $suffix = "/112/edit";
        return view('org_changes.tabs.first', compact('menuName', 'suffix'));
    }
    public function secondTab()
    {
        //
        $menuName = 'orgChangeTabs';
        // $suffix = "/$id/edit";
        return view('org_changes.tabs.second', compact('menuName', 'suffix'));
    }
    public function thirdTab()
    {
        //
        $menuName = 'orgChangeTabs';
        // $suffix = "/$id/edit";
        return view('org_changes.tabs.third', compact('menuName', 'suffix'));
    }
    public function firstTabEdit($id)
    {
        //
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";
        return view('org_changes.tabs.first', compact('menuName', 'suffix', 'id'));
    }
    public function secondTabEdit($id)
    {
        //
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";
        // MenuItemAccess::set('thirdTab', $id, 'available');
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
    // public function tabs($tab)
    // {
    //     //
    //     if($tab == 1){
    //     }elseif ($tab == 2) {
    //     }elseif ($tab == 3) {
    //     }
    // }

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
        // dd($org_request->id);
        $id = $org_request->id;
        $menuName = 'orgChangeTabs';
        $suffix = "/$id/edit";

        return redirect()->action(
          'OrgChangeController@firstTabEdit', ['id'=>$id]
        );
        // return view('org_changes.tabs.first', compact('org_request', 'menuName', 'suffix', 'id'));
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
        $file1Name = $request->file('current_orgChart')->getClientOriginalName();
        $file2Name = $request->file('new_orgChart')->getClientOriginalName();

        $request->file('new_orgChart')->storeAs('newCharts/'.$id, $file2Name);
        $request->file('current_orgChart')->storeAs('oldCharts/'.$id, $file1Name);

        $orgRequest->title = $request['title'];
        $orgRequest->description = $request['description'];
        $orgRequest->current_orgChart = $request['current_orgChart'];
        $orgRequest->new_orgChart = $request['new_orgChart'];
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
    }
}
