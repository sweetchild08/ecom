<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\Stocks;

class StocksController extends Controller
{
    public function show(Items $items)
    {
        return view('admin.stocks',compact('items'));
    }
    public function store(Items $items,Request $request)
    {
        $data=$this->validate($request,[
            'stocks'=>'required',
            'unit'=>'required',
            'price'=>'required',
            'sellprice'=>'required'
        ]);
        $stocks=new Stocks(array_merge($data,[
            'items_id'=>$items->id
        ]));

        if($stocks->save())
        {
            return redirect('admin/item/'.$items->id.'/stocks')->with('msg.success','stocks added');
        }
        return redirect('admin/item/'.$items->id.'/stocks')->with('msg.danger','stocks adding failed');
    }
    public function delete(Stocks $stocks)
    {
        if($stocks->delete())
            return redirect('/admin/item/'.$stocks->items->id.'/stocks')->with('msg.success','Stocks Deleted');
        return redirect('/admin/item/'.$stocks->items->id.'/stocks')->with('msg.danger','Stocks not Deleted');
    }
}
