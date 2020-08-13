@extends('admin.layout.master')
@section('scripts')
<script>
  
  const item={{ $items->id }}
</script>
@endsection
@section('content')

                    <!-- Modal-->
                  
<section class="py-5">
  <div class="row">
      <div class="col-lg-12 mb-4">
        <div class="card">
          <div class="card-header justify-content-between">
            <div class="row justify-content-between">
            <div class="col-md-4">
                <h6 class="text-uppercase mb-0">Item Name: <a href="{{route('admin.item')}}" class="text-blue">{{$items->name}}</a></h6>
              </div>
              
            </div>
            
          </div>
          <div class="card-body">
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
            <view-images></view-images>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
            <button type="button" class="btn btn-primary" onclick="document.getElementById('frmedititem').submit();">Update Item</button>
          </div>
          </div>
        </div>
      </div>
   
  </div>
</section>
  
@endsection
