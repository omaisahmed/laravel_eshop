@extends('dashboard.layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('category.create')}}" type="button" class="btn btn-warning pull-left"><i class="fa fa-plus my-auto" style="font-size: 0.9rem;"></i> Add Category</a>
        </div>
    </div>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Category</h4>
                <p class="card-category"> All Categories</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    @if(Session::has('delete_category'))
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>
                        {{Session::get('delete_category')}}
                      </span>
                    </div>
                    @endif
                    @if(Session::has('create_category'))
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <i class="material-icons">close</i>
                        </button>
                      <span>
                         {{Session::get('create_category')}}
                      </span>
                      </div>
                    @endif
                    @if(Session::has('edit_category'))
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <i class="material-icons">close</i>
                        </button>
                      <span>
                         {{Session::get('edit_category')}}
                      </span>
                      </div>
                    @endif
                    <thead class="text-primary">
                      <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><img src="/frontend/assets/uploads/category/{{$category->image}}" class="img-responsive" width="100" height="100"></td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->status}}</td>
                            <td class="td-actions">
                              <a href="/edit-category/{{$category->id}}" type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Category">
                                <i class="material-icons">edit</i>
                              </a>
                              <a href="/delete-category/{{$category->id}}" type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove Category">
                                <i class="material-icons">close</i>
                              </a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      
      </div>
    </div>
  </div>

  @endsection