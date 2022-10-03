@extends('website.layouts.main')    
    @section('content')
        <!-- BREADCRUMB -->
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="breadcrumb-header">Cart</h3>
                        <ul class="breadcrumb-tree">
                            <li><a href="{{route('site.index')}}">Home</a></li>
                            <li class="active">Cart</li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- BREADCRUMB -->

        <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                    <table id="cart" class="table table-hover table-condensed table-responsive">
                        <thead>
                            <tr>
                                <th style="width:50%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:8%">Quantity</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['selling_price'] * $details['qty'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                                <div class="col-sm-9">
                                                    <h4 class="nomargin cart-product-txt">{{ $details['name'] }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price" class="cart-product-txt">${{ $details['selling_price'] }}</td>
                                        <td data-th="Quantity" class="cart-product-txt">
                                            <input type="number" value="{{ $details['qty'] }}" class="form-control quantity update-cart" />
                                        </td>
                                        <td data-th="Subtotal" class="text-center cart-product-txt">${{ $details['selling_price'] * $details['qty'] }}</td>
                                        <td class="actions cart-product-txt" data-th="">
                                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">
                                    <a href="{{ route('site.index') }}" class="primary-btn bg-black"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                                    <button class="primary-btn cta-btn">Checkout</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>


				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

    @endsection

    @section('scripts')
    <!--Cart Update/Delete -->
    <script>
    $(".update-cart").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: "{{ route('site.updatecart') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                qty: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
            window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('site.removecart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });	
    </script>	  
    <!--Cart Update/Delete -->
    @endsection
