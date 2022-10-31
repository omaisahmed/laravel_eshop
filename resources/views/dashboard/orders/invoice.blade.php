<!DOCTYPE html>
<html>
<head>
    <title>Electro</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
    
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#{{$order->transactionId}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">#{{$order->order_id}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">{{$order->created_at->format('d-m-Y')}}</span></p>
    </div>
    <div class="w-50 float-left logo mt-10">
        {{-- <img src="{{asset('frontend/img/logo-dashboard.png')}}" alt="Eshop" class="img-responsive"> <span>Eletro.com</span>      --}}
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">From</th>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>Admin</p>
                    <p><a href="mailto:info@eletro.com">info@eletro.com</a></p>
                    <p>1734 Street Gulistan-e-Johar Road Karachi,</p>
                    <p>Pakistan</p>
                    <p>Contact : <a href="tel:+021-95-51-84">+021-95-51-84</a></p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>{{$order->name}}</p>
                    <p><a href="mailto:{{$order->email}}">{{$order->email}}</a></p>
                    <p>{{$order->address}}</p>
                    <p>{{$order->country}}</p>
                    <p>Contact : <a href="tel:{{$order->phone}}">{{$order->phone}}</a></p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Payment Method</th>
            <th class="w-50">Shipping Method</th>
        </tr>
        <tr>
            <td class="text-center">Cash On Delivery</td>
            <td class="text-center">Shipping - Free</td>
        </tr>
    </table>
</div>

<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Product Name</th>
            <th class="w-50">Total</th>
        </tr>
        <tr align="center">
            <td>{{$order->slug}}</td>
            <td>${{$order->amount}}</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">
                <div class="total-part text-center">
                        <p class="text-bold">Total Payable: <span>${{$order->amount}}</span></p>
                    <div style="clear: both;"></div>
                </div> 
            </td>
        </tr>
    </table>
</div>
</html>