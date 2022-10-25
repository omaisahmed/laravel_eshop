@extends('dashboard.layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('coupon.create')}}" type="button" class="btn btn-warning pull-left"><i class="fa fa-plus my-auto" style="font-size: 0.9rem;"></i> Create Coupon</a>
        </div>
    </div>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Coupons</h4>
                <p class="card-category"> All Coupons</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    @if(Session::has('delete_coupon'))
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>
                        {{Session::get('delete_coupon')}}
                      </span>
                    </div>
                    @endif
                    @if(Session::has('create_coupon'))
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <i class="material-icons">close</i>
                        </button>
                      <span>
                         {{Session::get('create_coupon')}}
                      </span>
                      </div>
                    @endif
                    <thead class="text-primary">
                      <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Discount</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{$coupon->id}}</td>
                            <td>{{$coupon->code}}</td>
                            <td>{{$coupon->percent}}%</td>
                            <td class="td-actions">
                              <a href="{{route('coupon.delete',$coupon->id)}}" type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove Coupon">
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