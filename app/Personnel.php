<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    //
    protected $fillable = [
      'user_id',
      'new_code',
      'new_title',
      'new_level',
      'new_series',
      'org_request'
    ];

    // static function allPersonnel()
    // {
    //   return User::get()->all();
    // }
}
