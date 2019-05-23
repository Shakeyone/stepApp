<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Friends extends Pivot
{
    protected $guarded = [];
    protected $table = 'friends';

    
    public function friends()
    {
        return $this->belongsToMany('App\User');
    }

}
