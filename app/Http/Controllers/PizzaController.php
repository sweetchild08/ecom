<?php

    namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    //
    public function create()
    {
        return view('pizza.order');
    }
    public function index()
    {
        $pizzas=Pizza::all();
        return view('pizza.index',['pizzas'=>$pizzas]);
    }
    public function store()
    {
        $pizzas=new Pizza();
        $pizzas->name=request('name');
        $pizzas->base=request('base');
        $pizzas->type=request('type');
        $pizzas->toppings=request('toppings');

        if($pizzas->saveOrFail())
            return redirect('home')->with('msg','order added');
        return redirect('home')->with('msg','order failed');
    }
    public function edit($id)
    {
        $pizza=Pizza::findOrFail($id);
        return view('pizza.show',['pizza'=>$pizza]);
    }
    public function update(Pizza $pizza)
    {
        $data=request()->validate(([
            'name'=>'required',
            'base'=>'required',
            'type'=>'required',
            'topping'=>''
        ]));
        if($pizza->update($data))
            return redirect('index')->with('msg','order updated');
        return redirect('index')->with('msg','update failed');
    }
}
