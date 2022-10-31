@extends('dashboard.layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('products.create')}}" type="button" class="btn btn-warning pull-left"><i class="fa fa-plus my-auto" style="font-size: 0.9rem;"></i> Add Product</a>
        </div>
    </div>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Products</h4>
                <p class="card-category"> All Products</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    @foreach ($prod as $pro)
                      {{$pro->visit_count_total}}
                    @endforeach
                    @if(Session::has('delete_products'))
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>
                        {{Session::get('delete_products')}}
                      </span>
                    </div>
                    @endif
                    @if(Session::has('create_products'))
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                        </button>
                        <span>
                           {{Session::get('create_products')}}
                        </span>
                      </div>
                    @endif
                    @if(Session::has('edit_products'))
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                        </button>
                        <span>
                           {{Session::get('edit_products')}}
                        </span>
                      </div>
                    @endif
                    <thead class="text-primary">
                      <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Selling Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td><img src="/frontend/assets/uploads/products/{{$product->image}}" class="img-responsive" width="100" height="100"></td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->selling_price}}</td>
                            <td class="td-actions">
                              <a href="{{route('products.edit',$product->id)}}" type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Product">
                                <i class="material-icons">edit</i>
                              </a>
                              <a href="{{route('products.delete',$product->id)}}" type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove Product">
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