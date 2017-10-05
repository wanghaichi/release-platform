<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $table = "rp_log";
    protected $fillable = ['pid', 'content', 'time', 'version', 'type', 'path', 'version_code'];

    public function production()
    {
        return $this->belongsTo('App\Models\Production', 'pid');
    }
}
