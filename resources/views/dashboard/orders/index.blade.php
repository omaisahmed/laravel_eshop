@extends('dashboard.layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
    {{-- <div class="row">
        <div class="col-lg-12">
            <a href="{{route('orders.create')}}" type="button" class="btn btn-warning pull-left"><i class="fa fa-plus my-auto" style="font-size: 0.9rem;"></i> Add Orders</a>
        </div>
    </div> --}}
      <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Orders</h4>
                <p class="card-category"> All Orders</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    @if(Session::has('delete_order'))
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>
                        {{Session::get('delete_order')}}
                      </span>
                    </div>
                    @endif
                    <thead class="text-primary">
                      <tr>
                        <th>ID</th>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>#{{$order->order_id}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->amount}}</td>
                            <td><input data-id="{{$order->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Paid" data-off="Unpaid" {{ $order->status === 'paid' ? 'checked' : '' }}></td>
                            <td class="td-actions">
                              <a href="{{route('order.delete',$order->id)}}" type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove Order">
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

  @push('custom-scripts')
  <script>
    $(function(){
        $('.toggle-class').on('change', function() {
          var status = $(this).is(':checked') === true ? 'paid' : 'unpaid'; 
          var id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/admin/order-status',
              data: {'status': status, 'id': id},
              success: function(data){
                console.log(data.success)
              }
          });
      });
    });
  </script>
  @endpush

  @endsection