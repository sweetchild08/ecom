<?php

namespace App\Http\Controllers;

use App\Items;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{
    public function index()
    {
        $items=Items::all();
        return view("admin.home",compact(['items']));
    }
    
}
