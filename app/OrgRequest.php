<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OrgRequest extends Model
{
    //
    public function getNewChartPathAttribute()
    {
      return '/chartDownload/'.$this->id.'/'.$this->new_orgChart;
      // return Storage::get($this->new_orgChart);
    }
    public function getOldChartPathAttribute()
    {
      return '/chartDownload/'.$this->id.'/'.$this->current_orgChart;
    }

    public function personnel()
    {
      return $this->hasMany(Personnel::class, 'org_request', 'id');
    }

    public function mission_statements()
    {
      return $this->hasMany(MissionStatement::class, 'org_request', 'id');
    }

    public function org_changes()
    {
      return $this->hasMany(OrgChange::class, 'org_request', 'id');
    }

}
