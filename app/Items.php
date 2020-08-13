<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    //
    protected $guarded=[];
    protected $casts=[
        'tags'=>'array'
    ];
    public function stocks()
    {
        return $this->hasMany(Stocks::class);
    }
    public function itempics()
    {
        return $this->hasMany(Itempics::class)->orderBy('created_at','DESC');
    }
    public function itempicsnextid()
    {
        $id=-1;
        foreach($this->itempics->where('items_id','=',$this->id ) as $pics)
        {
            $start=strpos($pics->picture,'-')+1;
            $end=strpos($pics->picture,'.');
            $length=$end-$start;
            $curr=substr($pics->picture,$start,$length);
            if($curr>$id)
                $id=$curr;
        }
        $id++;
        return $id;
    }
    public function totalstocks()
    {
        if($this->stocks->count()==0)
        {
            return [
                ''=>'none',
            ];
        }
        else
        {
            $data=[];
           foreach($this->stocks as $stocks)
           {
               if(!array_key_exists($stocks->unit,$data))
                    $data[$stocks->unit]=$stocks->stocks;
                else
                    $data[$stocks->unit]=$data[$stocks->unit]+$stocks->stocks;
           }
            return $data;
        }
    }
}
