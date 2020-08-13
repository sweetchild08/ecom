<?php

namespace App\Http\Controllers;

use App\Itempics;
use App\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItempicsController extends Controller
{
    
    public function store(Items $items)
    {
        //$img= request('photos')->store('items/image','public');
        //dd($items->itemspicsnextid());
        //return $items->itempicsnextid();
        if(request('images'))
        {
            $array = [];
            $i = 0;
            $id=$items->itempicsnextid();
            $array['success']=0;
            $array['failed']=0;
            foreach (request('images') as $photos => $a) {
                $ext= '.'.$a->getClientOriginalExtension();
                $path = $a->storeAs('items/image',$items->name.'-'.$id.$ext, 'public');
                $itempics=new Itempics([
                    'picture'=>$path,
                    'items_id'=>$items->id
                ]);
                $status="failed";
                if($a->isvalid()&&$itempics->save())
                {
                    $array['success']++;
                    $status="success";
                    if($items->itempics->count()==0)
                    {
                        $items->pic=$path;
                        $items->update();
                    }
                }
                else
                {
                    $array['failed']++;
                }
                $array[$i] = [
                    'imgname' => $a->getClientOriginalName(),
                    'ext' => $a->getClientOriginalExtension(),
                    'status' => $status,
                    'path' => $path
                ];
                $i++;
                $id++;
            }

            return response()->json($array);
        } 
        return response('failed');
    }
    public function show(Items $items)
    {
        foreach($items->itempics as $ind=>$pic)
            $pic['dp']=$pic->isdp()?true:false;
        return response()->json($items->itempics);
    }
    public function delete(Itempics $itempics)
    {
        $items=$itempics->items;
        if(Storage::disk('public')->delete($itempics->picture))
        {
            $itempics->delete();
            if($items->itempics->count()==0)
            {
                $items->pic=null;
                $items->save();
            }
            else if($items->pic==$itempics->picture)
            {
                $items->pic=$items->itempics[0]->picture;
                if($items->save())
                {
                    return response('updated dp');
                }
            }
            return response('deleted '.$itempics->picture);
        }
        return response('not deleted '.$itempics->picture);
    }
    public function edit(Itempics $itempics)
    {
        $itempics->items->pic=$itempics->picture;
        if($itempics->push())
            return response('success');
        return response('failed');
    }
    public function test(Itempics $itempics)
    {
        $itempics->items->pic=$itempics->picture;
        dd($itempics->push());
        //return view('admin.test',compact(['items']));
    }
}
