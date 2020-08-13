@extends('admin.layout.master')

@section('content')
                    <!-- Modal-->
                    <div id="addstock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <form method="post" action="addstock">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Add Stocks</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            @csrf
                              <div class="form-group">
                                <label class="form-control-label text-uppercase">Quantity</label>
                                <input type="number" name="stocks" placeholder="Quantity" class="form-control">
                                @error('stocks') <x-validation :message="$message"/> @enderror
                              </div>
                              <div class="form-group">
                                <label class="form-control-label text-uppercase">Unit</label>
                                <input type="text" name="unit" placeholder="Unit" class="form-control">
                                @error('unit') <x-validation :message="$message"/> @enderror
                              </div><div class="form-group">
                                <label class="form-control-label text-uppercase">Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control">
                                @error('price') <x-validation :message="$message"/> @enderror
                              </div><div class="form-group">
                                <label class="form-control-label text-uppercase">SellPrice</label>
                                <input type="number" name="sellprice" placeholder="Selling Price" class="form-control">
                                @error('sellprice') <x-validation :message="$message"/> @enderror
                              </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Add Stocks</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
  
<section class="py-5">
  <div class="row">
      @if($errors->any())
        <div class="col-md-12">
          <x-Alert type="danger" message="There are some errors"/>
        </div>
      @endif
      <div class="col-lg-12 mb-4">
        <div class="card">
          <div class="card-header justify-content-between">
            <div class="row justify-content-between">
              <div class="col-md-4">
                <h6 class="text-uppercase mb-0">Item Name: <a href="/admin/home/items" class="text-blue">{{$items->name}}</a></h6>
                <h6 class="text-uppercase mb-0">Category: <span class="text-blue">{{$items->category}}</span></h6>
                <h6 class="text-uppercase mb-0">Tags: <span class="text-blue">{{$items->Tags}}</span></h6>
              </div>
              <div class="">
                <span class="text-blue" data-target="#addstock" data-toggle="modal"><i class="fa fa-plus"></i></span>
              </div>
            </  >
            
            
          </div>
          <div class="card-body">
            <table class="table card-text">
              <thead>
                <tr>
                  <th>Quantity</th>
                  <th>Unit</th>
                  <th>Price</th>
                  <th>Selling Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($items->stocks as $stocks)
                  <tr>
                    <td>{{ $stocks->stocks }}</td>
                    <td>{{ $stocks->unit }}</td>
                    <td>{{ $stocks->price }}</td>
                    <td>{{ $stocks->sellprice }}</td>
                    <td>
                      <x-Form method="delete" :action="'/admin/stock/'.$stocks->id.'/delete'" :id="'stocks'.$stocks->id"/>
                      <i onclick="alertify.confirm('Confirmation','Are you sure to delete?',()=>document.getElementById('stocks{{$stocks->id}}').submit(),()=>alertify.error('deleting canceled')).set('labels',{ok:'Yes',cancel:'No'});" class="fa fa-trash-o text-red"></i>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
   
  </div>
</section>
  
@endsection
