@extends('admin.layout.master')
@section('scripts')
<script>
  function setmodal(name,itemid,category,tags)
  {
    document.getElementById('itemname').innerHTML=name;
    document.getElementById('itemid').value=itemid;
    document.getElementById('itemcat').value=category;
    document.getElementById('itemtags').value=tags;
  }
  function setfrmaction(action)
  {
    document.getElementById('frmedititem').action=action;
  }
  let x=0;
</script>
@endsection
@section('content')

                    <!-- Modal-->
                    <div id="additem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <form method="post" action="{{ route('admin.storeitem') }}">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Add Item</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            @csrf
                              <div class="form-group">
                                <label class="form-control-label text-uppercase">Name</label>
                                <input type="text" name="name" placeholder="Item Name" class="form-control" value="{{ old('name') }}">
                                @error('name') <x-validation :message="$message"/> @enderror
                              </div>
                              <div class="form-group">
                              
                              <label class="form-control-label text-uppercase">Category</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend show">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-outline-primary dropdown-toggle">Dropdown</button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                      <a class="dropdown-item">Action</a>
                                      <a class="dropdown-item">Another action</a
                                      ><a class="dropdown-item">Something else here</a>
                                    </div>
                                  </div>
                                  <input type="text" name="category" id="category" aria-label="Text input with dropdown button" class="form-control" value="{{ old('category') }}">
                                </div>
                              @error('category') <x-validation :message="$message"/> @enderror
                              </div>

                              <div class="form-group">
                                <label class="form-control-label text-uppercase">tags</label>
                                <input type="text" name="tags[]" placeholder="tags Separated by comma(,)" class="form-control">
                              </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Add Item</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div id="edititem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Edit <span id="itemname" class="text-blue text-uppercase"></span></h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                          <form method="post" id="frmedititem">
                            @csrf
                             @method('patch')
                              <div class="form-group">
                                
                            <input type="hidden" name="updateitem">
                            <input type="hidden" name="itemid" id="itemid">
                              <label class="form-control-label text-uppercase">Category</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend show">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-outline-primary dropdown-toggle">Dropdown</button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                      <a class="dropdown-item">Action</a>
                                      <a class="dropdown-item">Another action</a
                                      ><a class="dropdown-item">Something else here</a>
                                    </div>
                                  </div>
                                  <input id="itemcat" type="text" name="category" id="category" aria-label="Text input with dropdown button" class="form-control">
                                </div>
                              @error('category') <x-validation :message="$message"/> @enderror
                              </div>

                              <div class="form-group">
                                <label class="form-control-label text-uppercase">tags</label>
                                <input id="itemtags" type="text" name="tags[]" placeholder="tags Separated by comma(,)" class="form-control">
                              </div>
                              
                          </form>
                              <div class="form-group">
                                <label class="form-control-label text-uppercase">Pictures</label><br>
                                  <upload-image></upload-image>
                                <img class="img-fluid bg-success border rounded border-success shadow" src="http://localhost:8000/bubly/img/avatar-6.jpg" loading="eager" width="100" height="100" style="margin: 5px;" />
                                <img class="img-fluid bg-success border rounded border-success shadow" src="http://localhost:8000/storage/img/9EnehDwyQImQ1J5KinugnYYENJZl1tnf9B0Ollxk.jpeg" loading="eager" width="100" height="100" style="margin: 5px;" />
                                <img class="img-fluid bg-success border rounded border-success shadow" src="http://localhost:8000/storage/img/9EnehDwyQImQ1J5KinugnYYENJZl1tnf9B0Ollxk.jpeg" loading="eager" width="100" height="100" style="margin: 5px;" />
                              </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('frmedititem').submit();">Update Item</button>
                          </div>
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
                <h6 class="text-uppercase mb-0">Items</h6>
              </div>
              <div class="">
                <span class="text-blue" data-target="#additem" data-toggle="modal"><i class="fa fa-plus"></i></span>
              </div>
            </div>
            
            
          </div>
          <div class="card-body">
            <table class="table card-text">
              <thead>
                <tr>
                  <th>Item name</th>
                  <th>Stocks</th>
                  <th>Category</th>
                  <th>Tags</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($items as $item)
                  <tr>
                    <td>{{ $item->name }}</td>
                    <td>
                      @foreach($item->totalstocks() as $unit=>$value)
                          @if($loop->first)
                            {{ $value.' '.$unit }}
                          @else
                            {{ ', '.$value.' '.$unit }}
                          @endif
                      @endforeach
                    </td>
                    <td>{{ $item->category }}</td>
                    <td></td>
                    <td>
                      <a href="/admin/item/{{ $item->id }}/stocks" class="mr-3 pr-3" style="border-right:1px solid black">view stocks</a>
                        <i class="fa fa-pencil text-blue pr-3" 
                        onclick="window.location.href='/admin/item/{{ $item->id }}/edit'"></i>
                      <x-Form method="delete" :action="'/admin/item/'.$item->id.'/delete'" :id="'item'.$item->id"/>
                      <i class="fa fa-trash-o text-red pr-3" onclick="alertify.confirm('Confirmation','Are you sure to delete?',()=>document.getElementById('item{{$item->id}}').submit(),()=>alertify.error('deleting canceled')).set('labels',{ok:'Yes',cancel:'No'});" ></i>
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
