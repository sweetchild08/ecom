@extends('layouts.app')
        @section('content')
        <div class="main-content mt-6">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                            <div class="col-md-6 offset-md-3 mr-auto ml-auto">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Order a </strong> PIZXa
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{ route('create') }}" method="post" class="form-horizontal" id="form">
                                            @csrf
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="name" placeholder="Order name" class="form-control">
                                                    <small class="form-text text-muted">This is a help text</small>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="base" class=" form-control-label">Base</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="base" id="base" class="form-control">
                                                        <option value="base1">Please select</option>
                                                        <option value="base2">Option #2</option>
                                                        <option value="base3">Option #3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="type" class=" form-control-label">Type</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="type" id="type" class="form-control">
                                                        <option value="type1">Option #1</option>
                                                        <option value="type2">Option #2</option>
                                                        <option value="type3">Option #3</option>
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
                                                                <input type="checkbox" id="checkbox1" name="toppings[]" value="topping1" class="form-check-input"> topping 1
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkbox2" class="form-check-label ">
                                                                <input type="checkbox" id="checkbox2" name="toppings[]" value="topping2" class="form-check-input"> topping 2
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkbox3" class="form-check-label ">
                                                                <input type="checkbox" id="checkbox3" name="toppings[]" value="topping3" class="form-check-input"> topping 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button  class="btn btn-primary btn-sm" onclick="document.getElementById('form').submit();">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        @endsection
    
