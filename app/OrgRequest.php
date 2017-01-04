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

}
