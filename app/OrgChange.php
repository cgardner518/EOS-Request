<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrgChange extends Model
{
    //

    protected $fillable = [
      'type',
      'from',
      'to',
      'org_request'
    ];

    public static function allOrganizations()
    {
      return [
         'ABC Systems',
         '123 Systems',
         'The Actual Batcave, like from Batman'
      ];
    }

    public static function allOrgCodes()
    {
      return [
         '9990',
         '9980',
         '6660'
      ];
    }
}
