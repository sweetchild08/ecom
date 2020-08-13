<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itempics extends Model
{
    protected $guarded=[];
    public function items()
    {
        return $this->belongsTo(Items::class);
    }
    public function isdp()
    {
        if($this->items->pic==$this->picture)
            return true;
        return false;
    }
}
