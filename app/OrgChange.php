<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrgChange extends Model
{
    //

    protected $fillable = [
      'from_title',
      'from_code',
      'to_title',
      'to_code',
      'org_request'
    ];

    public static function allOrganizations()
    {
      return [
         'Information Technology Division',
         'Center for Computational Science',
         'Chemistry'
      ];
    }

    public static function allOrgCodes()
    {
      return [
         '5500',
         '5590',
         '6100'
      ];
    }


}
