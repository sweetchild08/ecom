<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    //
    protected $guarded=[];
    protected $casts=[
        'toppings'=>'array'
    ];
}
