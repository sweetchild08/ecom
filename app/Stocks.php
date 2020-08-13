<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    protected $guarded=[];
    public function items()
    {
        return $this->belongsTo(Items::class);
    }
}
