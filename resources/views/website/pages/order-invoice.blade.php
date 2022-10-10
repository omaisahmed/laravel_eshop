@extends('website.layouts.main')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="jumbotron text-center">
                    <h1 class="display-3">Thank You!</h1>
                    <p class="lead"><strong>Good News!</strong> Your order is received. One of our representatives will get
                        in touch with you shortly.</p>
                    <div class="container">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2"><strong><h3 class="title">Billing Details</h3></strong></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $order->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $charge->receipt_email }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $order->phone }}</td>
                            </tr>
                            <tr>
                                <td>Product</td>
                                <td>{{ $order->slug }}</td>                                                               
                            </tr>
                            <td>Total Amount</td>
                            <td>${{ $charge->amount }}</td>
                            </tr>

                        </table>
                    </div>
                    <hr>
                    <h4>
                        Having trouble? <a class="primary-btn" href="{{ route('site.contact') }}">Contact us</a>
                    </h4>
                        <a class="primary-btn bg-black" href="{{ route('site.index') }}" role="button"><i class="fa fa-angle-left"></i> Continue to
                            Homepage</a>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection

