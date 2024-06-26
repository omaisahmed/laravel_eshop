@extends('dashboard.layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">

   <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Add Category</h4>
        <p class="card-category">Add your category here</p>
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
        <form action="{{route('category.create.submit')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-md-6 my-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Name</label>
                <input type="text" class="form-control" name="name">
              </div>
            </div>
            <div class="col-md-6 my-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Slug</label>
                <input type="text" class="form-control" name="slug">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 my-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Description</label>
                <textarea rows="4" class="form-control" name="description"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 my-3">
                <div class="form-group bmd-form-group">
                  <div class="form-check">
                      <label class="form-check-label">Status
                        <input class="form-check-input" type="checkbox" name="status">
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
                      <label class="form-check-label">Popular
                        <input class="form-check-input" type="checkbox" name="popular">
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
                  <input type="text" class="form-control" name="meta_title">
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12 my-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Meta Description</label>
                <textarea rows="4" class="form-control" name="meta_description"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 my-3">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Meta Keywords</label>
                  <input type="text" class="form-control" name="meta_keywords">
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12 my-3">
              <div class="bmd-form-group">
                <label class="bmd-label-floating">Image</label><br>
                <input type="file" class="form-control" name="image">
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