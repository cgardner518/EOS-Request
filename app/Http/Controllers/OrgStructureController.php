<?php

namespace App\Http\Controllers;
use App\Unit;
use Illuminate\Http\Request;

class OrgStructureController extends Controller
{
    //
    public function index()
    {
      $unit = new Unit;
      $organizations = $unit->organizations;
      return view('orgStructure.index', compact('organizations'));
    }

    public function show($org)
    {
      // $org = Unit::oneOrg($code);
      $unit = new Unit;
      if ($org === '1000') {
        $value = [
          0 => $unit->organizations
        ];
      }else{
      $ray = collect($unit->organizations['departments']);
      $current_unit = $ray->map(function($item, $key) use($org){
        if($item['code'] == $org){
          return $item;
        }elseif (isset($item['departments'])){
          foreach ($item['departments'] as $v) {
            if($v['code'] == $org){
              return $v;
            }elseif (isset($v['departments'])){
              foreach($v['departments'] as $val){
                if($val['code'] == $org){
                  return $val;
                }elseif(isset($val['departments'])){
                  foreach ($val['departments'] as $value) {
                    if ($value['code'] == $org) {
                      return $value;
                    }elseif (isset($value['departments'])) {
                      foreach ($value['departments'] as $dep) {
                        if ($dep['code'] == $org) {
                          $value = $dep;
                          return $value;
                        }
                      }
                    }
                  }
                }
              }
            }else{
              return false;
            }
          }
        }else{
          return false;
        }
      })
      ->filter(function($val, $key){
        return $val;
      });
      $value = array_values($current_unit->toArray());
    }
    // dd($value);

      return view('orgStructure.show', compact('value'));
    }

    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // *******
    // * EDIT ORGANIZATION INFO
    // *******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    public function edit_org_info(Request $request)
    {
      // dd($request->all());
      $modalId = $request->modalId;
      $org = $request->id;
      $unit = new Unit;
      if ($org === '1000') {
        $value = [
          0 => $unit->organizations
        ];
      }else{
      $ray = collect($unit->organizations['departments']);
      $current_unit = $ray->map(function($item, $key) use($org){
        if($item['code'] == $org){
          return $item;
        }elseif (isset($item['departments'])){
          foreach ($item['departments'] as $v) {
            if($v['code'] == $org){
              return $v;
            }elseif (isset($v['departments'])){
              foreach($v['departments'] as $val){
                if($val['code'] == $org){
                  return $val;
                }elseif(isset($val['departments'])){
                  foreach ($val['departments'] as $value) {
                    if ($value['code'] == $org) {
                      return $value;
                    }elseif (isset($value['departments'])) {
                      foreach ($value['departments'] as $dep) {
                        if ($dep['code'] == $org) {
                          $value = $dep;
                          return $value;
                        }
                      }
                    }
                  }
                }
              }
            }else{
              return false;
            }
          }
        }else{
          return false;
        }
      })
      ->filter(function($val, $key){
        return $val;
      });
      $value = array_values($current_unit->toArray());
    }
      return view('orgStructure.modals.editOrgInfo', compact('modalId', 'value'));
    }

    public function change_org_info(Request $request)
    {
      dd($request->all());
    }



    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // *******
    // * END EDIT ORGANIZATION INFO
    // *******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // *******
    // * EDIT ORGANIZATION ROLE INFO
    // *******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    public function edit_org_role(Request $request)
    {
      // dd($request->role_id,$request->id);

      $modalId = studly_case($request->modalId);
      $org = $request->id;
      $unit = new Unit;
      if ($org === '1000') {
        $value = [
          0 => $unit->organizations
        ];
      }else{
      $ray = collect($unit->organizations['departments']);
      $current_unit = $ray->map(function($item, $key) use($org){
        if($item['code'] == $org){
          return $item;
        }elseif (isset($item['departments'])){
          foreach ($item['departments'] as $v) {
            if($v['code'] == $org){
              return $v;
            }elseif (isset($v['departments'])){
              foreach($v['departments'] as $val){
                if($val['code'] == $org){
                  return $val;
                }elseif(isset($val['departments'])){
                  foreach ($val['departments'] as $value) {
                    if ($value['code'] == $org) {
                      return $value;
                    }elseif (isset($value['departments'])) {
                      foreach ($value['departments'] as $dep) {
                        if ($dep['code'] == $org) {
                          $value = $dep;
                          return $value;
                        }
                      }
                    }
                  }
                }
              }
            }else{
              return false;
            }
          }
        }else{
          return false;
        }
      })
      ->filter(function($val, $key){
        return $val;
      });
      $value = array_values($current_unit->toArray());
    }
    foreach ($value[0]['roles'] as $rol) {
      if ($rol['name'] == $request->role_id) {
        $role = $rol;
      }
    }
    // dd($value[0]['roles']);
    // dd(studly_case($modalId));
      return view('orgStructure.modals.editOrgRole', compact('modalId', 'value','role'));
    }

    public function change_org_role(Request $request)
    {
      dd($request->all());
    }



    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // *******
    // * END EDIT ORGANIZATION ROLE INFO
    // *******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // *******
    // * EDIT ROLE ASSIGNMENT INFO
    // *******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    public function edit_role_assignment(Request $request)
    {
      // dd($request->role_id,$request->id);

      $modalId = studly_case($request->modalId);
      $org = $request->id;
      $unit = new Unit;
      if ($org === '1000') {
        $value = [
          0 => $unit->organizations
        ];
      }else{
      $ray = collect($unit->organizations['departments']);
      $current_unit = $ray->map(function($item, $key) use($org){
        if($item['code'] == $org){
          return $item;
        }elseif (isset($item['departments'])){
          foreach ($item['departments'] as $v) {
            if($v['code'] == $org){
              return $v;
            }elseif (isset($v['departments'])){
              foreach($v['departments'] as $val){
                if($val['code'] == $org){
                  return $val;
                }elseif(isset($val['departments'])){
                  foreach ($val['departments'] as $value) {
                    if ($value['code'] == $org) {
                      return $value;
                    }elseif (isset($value['departments'])) {
                      foreach ($value['departments'] as $dep) {
                        if ($dep['code'] == $org) {
                          $value = $dep;
                          return $value;
                        }
                      }
                    }
                  }
                }
              }
            }else{
              return false;
            }
          }
        }else{
          return false;
        }
      })
      ->filter(function($val, $key){
        return $val;
      });
      $value = array_values($current_unit->toArray());
    }
    foreach ($value[0]['roles'] as $rol) {
      if ($rol['name'] == $request->role_id) {
        $role = $rol;
      }
    }
    foreach ($role['assignments'] as $assignment) {
      if ($assignment['name'] == $request->assignment) {
        $assigned = $assignment;
      }
    }
    // dd($value[0]['roles']);
    // dd(studly_case($modalId));
      return view('orgStructure.modals.editRoleAssignment', compact('modalId', 'value','role', 'assigned'));
    }

    public function change_role_assignment(Request $request)
    {
      dd($request->all());
    }



    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    // *******
    // * END EDIT ROLE ASSIGNMENT INFO
    // *******
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

}
