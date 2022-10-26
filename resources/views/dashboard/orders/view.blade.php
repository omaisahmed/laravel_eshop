@extends('dashboard.layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('orders.index')}}" type="button" class="btn btn-warning pull-left"><i class="fa fa-long-arrow-left my-auto" style="font-size: 0.9rem;"></i> Back</a>
            <a href="{{route('order.invoice',$order->id)}}" type="button" class="btn btn-success pull-left"><i class="fa fa-download my-auto" style="font-size: 0.9rem;"></i> Generate Invoice</a>
        </div>
    </div>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Orders</h4>
                <p class="card-category"> View Order</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table text-center">
                      <tr>
                        <th>Order ID</th>
                        <td>#{{$order->order_id}}</td>
                      </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$order->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$order->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$order->phone}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$order->address}}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{$order->country}}</td>
                        </tr>
                       <tr>
                        <th>Amount</th>
                        <td>{{$order->amount}}</td>
                       </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$order->status}}</td>
                        </tr>
                        <tr>
                            <th>Transaction ID</th>
                            <td>{{$order->transactionId}}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{$order->created_at}}</td>
                        </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
      
      </div>
    </div>
  </div>
  @endsection