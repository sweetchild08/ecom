@extends('layouts.app')
        @section('content')
        <div class="main-content mt-6">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                            <div class="col-md-6 offset-md-3 mr-auto ml-auto">
                                <div class="card">
                                    <div class="card-header">
                                       Pizza Order number {{ $pizza->id }}
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{ url('pizza').'/'.$pizza->id }}" method="post" id="updatepizza">
                                        @csrf
                                        @method('PATCH')
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="name" value="{{ old('name') ?? $pizza->name }}" placeholder="Order name" class="form-control" >
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="base" class=" form-control-label">Base</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="base" id="base" class="form-control" >
                                                        <option value="base1" {{ $pizza->base=='base1'?'selected':'' }}>Please select</option>
                                                        <option value="base2" {{ $pizza->base=='base2'?'selected':'' }}>Option #2</option>
                                                        <option value="base3" {{ $pizza->base=='base3'?'selected':'' }}>Option #3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="type" class=" form-control-label">Type</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="type" id="type" class="form-control" >
                                                        <option value="type1" {{ $pizza->type=='type1'?'selected':'' }}>Option #1</option>
                                                        <option value="type2" {{ $pizza->type=='type2'?'selected':'' }}>Option #2</option>
                                                        <option value="type3" {{ $pizza->type=='type3'?'selected':'' }}>Option #3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Toppings</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <label for="checkbox1" class="form-check-label ">
                                                                <input {{ array_search('topping1',$pizza->toppings)!==false?'checked':'' }} type="checkbox" id="checkbox1" name="toppings[]" value="topping1" class="form-check-input"> topping 1
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkbox2" class="form-check-label ">
                                                                <input {{ array_search('topping2',$pizza->toppings)!==false?'checked':'' }} type="checkbox" id="checkbox2" name="toppings[]" value="topping2" class="form-check-input"> topping 2
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkbox3" class="form-check-label ">
                                                                <input {{ array_search('topping3',$pizza->toppings)!==false?'checked':'' }} type="checkbox" id="checkbox3" name="toppings[]" value="topping3" class="form-check-input"> topping 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-warning" onclick="document.getElementById('updatepizza').submit();">Update</button>
                                        <button class="btn btn-danger" onclick="window.location.href='{{ url('delete').'/'.$pizza->id }}';">Delete</button>
                                        <button class="btn btn-primary" onclick="window.location.href='{{ route('index') }}';">Back</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        @endsection
    
