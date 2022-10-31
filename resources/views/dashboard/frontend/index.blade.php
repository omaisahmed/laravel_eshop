@extends('dashboard.layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">visibility</i>
              </div>
              <p class="card-category">Total Views</p>
              <h3 class="card-title">49/50
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">visibility</i>Total Visitors
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">attach_money</i>
              </div>
              <p class="card-category">Revenue</p>
              <h3 class="card-title">${{$totalRevenue}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last Month
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">category</i>
              </div>
              <p class="card-category">Total Categories</p>
              <h3 class="card-title">{{$category}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">category</i> Total Categories in Shop
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Total Products</p>
              <h3 class="card-title">{{$product}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">store</i> Total Products in Shop
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">people</i>
              </div>
              <p class="card-category">Total Users</p>
              <h3 class="card-title">{{$users}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">people</i> Total Users
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">sell</i>
              </div>
              <p class="card-category">Total Sales</p>
              <h3 class="card-title">${{$totalSales}}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i>Today
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">sell</i>
              </div>
              <p class="card-category">Today Sales</p>
              <h3 class="card-title">${{$todaySales}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Today
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">attach_money</i>
              </div>
              <p class="card-category">Today Revenue</p>
              <h3 class="card-title">${{$todayRevenue}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Today
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
           <div class="card">
             <div class="card-header card-header-primary">
               <h4 class="card-title ">Latest Orders</h4>
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
                       <th>Address</th>
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
                             <a href="{{route('order.view',$order->id)}}" type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="View Order">
                               <i class="material-icons">visibility</i>
                             </a>
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
  
  
      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              {{-- <div class="ct-chart" id="dailySalesChart"></div>    --}}
              <div id="dailySales" class="chartGraph">
                {!! $today_sales_chart->container() !!}
              </div>
              @push('custom-scripts')
              <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
              <script>
                  var app = new Vue({
                      el: '#dailySales',
                  });
              </script>
              @endpush     
              {!! $today_sales_chart->script() !!}
            </div>
            <div class="card-body">
              <h4 class="card-title">Daily Sales</h4>
              <p class="card-category">Today Sales.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated a ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              {{-- <div class="ct-chart" id="websiteViewsChart"></div> --}}
              <div id="monthlyRevenue" class="chartGraph">
                {!! $monthly_revenue_chart->container() !!}
              </div>
              @push('custom-scripts')
              <script>
                var app = new Vue({
                    el: '#monthlyRevenue',
                });
            </script>
              @endpush
              {!! $monthly_revenue_chart->script() !!}
            </div>
            <div class="card-body">
              <h4 class="card-title">Monthly Revenue</h4>
              <p class="card-category">Last Month Revenue</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated a ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              {{-- <div class="ct-chart" id="completedTasksChart"></div> --}}
              <div id="monthlySales" class="chartGraph">
                {!! $monthly_sales_chart->container() !!}
              </div>
              @push('custom-scripts')
              <script>
                var app = new Vue({
                    el: '#monthlySales',
                });
            </script>
              @endpush        
              {!! $monthly_sales_chart->script() !!}
            </div>
            <div class="card-body">
              <h4 class="card-title">Monthly Sales</h4>
              <p class="card-category">Last Month Sales</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated a ago
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