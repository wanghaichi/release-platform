<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    //
    protected $table = "rp_production";

    public function production()
    {
        return $this->hasMany('App\Models\Log', 'pid');
    }
}
