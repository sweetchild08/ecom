<?php

namespace App\Http\Controllers;
use App\Items;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function create()
    {
        $items=Items::all();
        return view("admin.additem",compact(['items']));
    }
    public function store(Request $request)
    {
        $data=$this->validate(request(),[
            'name'=>'required|string',
            'category'=>'required|string',
            'tags'=>''
        ]);
        $item=new Items($data);
        if($item->save())
            return redirect(route('admin.additem'))->with('msg.success','successfully added item');
        return redirect(route('admin.additem'))->with('msg.danger','Failed adding item');
    }
    public function delete(Items $items)
    {
        if($items->delete())
            return redirect(route('admin.additem'))->with('msg.success','Deleted Successfully');
        return redirect(route('admin.additem'))->with('msg.danger','Failed Deleting Item');
    }
    public function edit(Items $items)
    {
        return view('admin.edititem',compact(['items']));   
    }
}
