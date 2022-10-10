@extends('website.layouts.main')    
    @section('content')
        <!-- BREADCRUMB -->
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="breadcrumb-header">Checkout</h3>
                        <ul class="breadcrumb-tree">
                            <li><a href="{{route('site.index')}}">Home</a></li>
                            <li class="active">Checkout</li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- BREADCRUMB -->

        @php
            $stripe_key = 'pk_test_51LbOBhC61iZeeTzo30iGvN9GbCxKh4kZJ75ItDm3hXxWHZENxSMuxfimitKiM8rOnhMDqlYGvTY2kNU3ZJ4VxRNm00GvmavDoK';
        @endphp

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger px-5">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-danger px-5">
                       <p>{{session::get('error')}}</p>
                    </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <form action="{{route('site.checkout')}}" method="POST" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{config('services.stripe.key')}}" id="payment-form">
                    @csrf
                    <input type="hidden" name="coupon" value="@if(!empty($coupon->code)) {{$coupon->code}} @else {{'none'}} @endif">
                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Billing address</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="phone" placeholder="Telephone" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Country" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Address" required>
                            </div>                                                      
                        </div>
                    
                        <!-- /Billing Details -->

                        <!-- Order notes -->
                        <div class="order-notes">
                            <textarea class="input" placeholder="Order Notes" name="comment"></textarea>
                        </div>
                        <!-- /Order notes -->

                        <!-- Payment Details -->
                        <div class="payment-method">
                            <div class="caption">

                                <div class="form-row">
                                    <h4 class="payment-txt">
                                        Pay with your Credit or Debit Card
                                    </h4>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <input class='input' size='4' type='text' placeholder="Name on Card">
                                    </div>
                                </div>
          
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <input autocomplete='off' class='input card-number' size='20' type='text' placeholder="Card Number">
                                    </div>
                                </div>
          
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <input autocomplete='off' class='input card-cvc' placeholder='CVC(ex. 311)' size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <input class='input card-expiry-month' placeholder='Expiration Month(MM)' size='2' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <input class='input card-expiry-year' placeholder='Expiration Year(YYYY)' size='4' type='text'>
                                    </div>
                                </div>
          
                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try
                                            again.</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Payment Details -->
                        <button type="submit" class="primary-btn order-submit">Place order</button>

                    </div>
                    </form>

                    <!-- Order Details -->
                    <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">Your Order</h3>
                        </div>
                        
                        <div class="order-summary">
                            <div class="order-col">
                                <div><strong>PRODUCT</strong></div>
                                <div><strong>TOTAL</strong></div>
                            </div>
                            
                            <div class="order-products">
                                @php $total = 0 @endphp
                                @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                @php $total += $details['selling_price'] * $details['qty'] @endphp
                                <div class="order-col">
                                    <div>{{ $details['qty'] }}x {{ $details['name'] }}</div>
                                    <div>${{ $details['selling_price'] * $details['qty'] }}</div>
                                    @php session()->put('cart_products',$details['name']); @endphp
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="order-col">
                                <div>Shipping</div>
                                <div><strong>FREE</strong></div>
                            </div>
                            @if(!empty($coupon))
                            <div class="order-col">
                                <div><strong>Sub Total</strong></div>
                                <div><strong class="order-total">${{$total}}</strong></div>
                            </div>

                            <div class="order-col">
                                <div><strong>You're saving</strong></div>
                                <div><strong class="order-total">${{$total * $coupon->percent / 100}}</strong></div>
                            </div>
                            @endif

                            <div class="order-col">
                                <div><strong>TOTAL</strong></div>
                                @if(!empty($coupon->code))
                                @php $net_total = $total-($total * $coupon->percent / 100); @endphp  
                                <div><strong class="order-total">${{$net_total}}</strong></div>
                                @else
                                <div><strong class="order-total">${{$total}}</strong></div>
                                @endif

                                @php
                                if(!empty($coupon->code)){
                                    session()->put('amount', $net_total);
                                }
                                else{
                                    session()->put('amount', $total);
                                } 
                                
                                $slug_checkout = $product->slug;
                                session()->put('prod_slug', $slug_checkout);                                                    
                                @endphp
                            </div>
                        </div>
                                              
                        <form action="{{route('site.checkoutCouponSubmit',['slug' => $product->slug])}}" method="post">
                        @if(!empty($coupon))
                        <div class="order-summary applied-coupon-text">
                            <div class="order-col">
                                <div><strong>Applied Coupon ({{$coupon->code}})</strong></div>
                                <div><strong class="order-total"> {{$coupon->percent}}%</strong></div>
                            </div>
                        </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="coupon">
                                Have a Coupon?
                            </label>
                            <input type="text" class="input" placeholder="Coupon Code" name="coupon" required @if(!empty($coupon)) {{__('disabled')}} @endif >
                            <button type="submit" class="primary-btn bg-black coupon-btn" @if(!empty($coupon)) {{__('disabled')}} @endif>Apply</button>
                        </div>                   
                        </form>
                        
                    </div>
                    <!-- /Order Details -->
                    
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
    <!-- Checkout Form --->

  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script type="text/javascript">
    $(function() {      
        var $form = $(".require-validation");    
        $('form.require-validation').bind('submit', function(e) {
            var $form         = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                             'input[type=text]', 'input[type=file]',
                             'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid         = true;
            $errorMessage.addClass('hide');
      
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
              var $input = $(el);
              if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
              }
            });
       
            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }
      
      });
      
      function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                   
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
       
    });
    </script>

    @endsection

