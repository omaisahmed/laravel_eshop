@extends('dashboard.layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">

   <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Add Products</h4>
        <p class="card-products">Add your products here</p>
      </div>
      <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('products.edit.submit', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-12 my-3">
                  <div class="form-group">
                    <select class="form-control" name="cat_id">
                        <option value="" disabled>Select a Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>

          <div class="row">
            <div class="col-md-6 my-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Name</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}">
              </div>
            </div>

            <div class="col-md-6 my-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Slug</label>
                <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 my-3">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Small Description</label>
                  <textarea rows="4" class="form-control" name="small_description" value="{{$product->small_description}}"></textarea>
                </div>
              </div>
            <div class="col-md-6 my-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Description</label>
                <textarea rows="4" class="form-control" name="description" value="{{$product->description}}"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 my-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Original Price</label>
                <input type="number" class="form-control" name="original_price" value="{{$product->original_price}}">
              </div>
            </div>
            <div class="col-md-6 my-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Selling Price</label>
                <input type="number" class="form-control" name="selling_price" value="{{$product->selling_price}}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 my-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Quantity</label>
                <input type="number" class="form-control" name="qty" value="{{$product->qty}}">
              </div>
            </div>
            <div class="col-md-6 my-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Tax</label>
                <input type="number" class="form-control" name="tax" value="{{$product->tax}}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 my-3">
                <div class="form-group bmd-form-group">
                  <div class="form-check">
                      <label class="form-check-label">Status
                        <input class="form-check-input" type="checkbox" name="status" value="{{$product->status}}">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                </div>
              </div>
              <div class="col-md-6 my-3">
                <div class="form-group bmd-form-group">
                  <div class="form-check">
                      <label class="form-check-label">Trending
                        <input class="form-check-input" type="checkbox" name="trending" value="{{$product->trending}}">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12 my-3">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Meta Title</label>
                  <input type="text" class="form-control" name="meta_title" value="{{$product->meta_title}}">
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12 my-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Meta Description</label>
                <textarea rows="4" class="form-control" name="meta_description" value="{{$product->meta_description}}"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 my-3">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Meta Keywords</label>
                  <input type="text" class="form-control" name="meta_keywords" value="{{$product->meta_keywords}}">
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12 my-3">
              <div class="bmd-form-group">
                <label class="bmd-label-floating">Image</label><br>
                <input type="file" class="form-control" name="image" value="{{$product->image}}">
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary pull-right">Submit</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>

      </div>
    </div>
</div>

@endsection