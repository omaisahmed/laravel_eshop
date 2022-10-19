	<!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                </ul>
                {{-- <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                    <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                </ul> --}}
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="{{asset('frontend/img/logo.png')}}" alt="Eshop">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="{{route('search.filter')}}" method="get">
                                {{-- <select class="input-select">
                                    <option value="0">All Categories</option>
                                    <option value="1">Category 01</option>
                                    <option value="1">Category 02</option>
                                </select> --}}
                                <input class="input" placeholder="Search here" name="name">
                                <button type="submit" class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="{{route('site.wishlist')}}">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <div class="qty">{{ count((array) session('wishlist')) }}</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    @php $total = 0 @endphp
                                        @foreach((array) session('cart') as $id => $details)
                                            @php $total += $details['selling_price'] * $details['qty'] @endphp                                           
                                        @endforeach
                                        <div class="qty">{{ count((array) session('cart')) }}</div>                                    
                                </a>
                                
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                        <div class="product-widget" data-id="{{ $id }}">
                                            <div class="product-img">
                                                <img src="{{asset('frontend/assets/uploads/products/'.$details['image'])}}">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="{{route('site.productdetail',$details['name'])}}">{{ $details['name'] }}</a></h3>
                                                <h4 class="product-price"><span class="qty">{{ $details['qty'] }}x</span>${{ $details['selling_price'] }}</h4>
                                            </div>
                                            <button class="delete remove-from-cart"><i class="fa fa-close"></i></button>
                                            
                                        </div>
                                        @endforeach
                                        @endif                                                                               
                                    </div>
                                    <div class="cart-summary">
                                        <small>{{ count((array) session('cart')) }} Item(s) selected</small>
                                        <h5>SUBTOTAL: ${{ $total }}</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="{{route('site.cart', ['slug' => 'laptops'])}}">View Cart</a>
                                        {{-- @php $product_slug = session()->get('prod_slug') @endphp   --}}
                                        <a href="{{ route('site.checkoutform', ['slug' => 'laptops']) }}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                                              
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="{{ Route::is('site.index') ? 'active' : '' }}"><a href="{{route('site.index')}}">Home</a></li>
						<li class="{{ Route::is('site.products') ? 'active' : '' }}"><a href="{{route('site.products')}}">Products</a></li>
						<li class="{{ Route::is('site.categories') ? 'active' : '' }}"><a href="{{route('site.categories')}}">Categories</a></li>
						<li class="{{ Route::is('site.about') ? 'active' : '' }}"><a href="{{route('site.about')}}">About</a></li>
						<li class="{{ Route::is('site.contact') ? 'active' : '' }}"><a href="{{route('site.contact')}}">Contact</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

        @section('scripts')
        <!--Cart Delete -->
        <script>   
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
    
            var ele = $(this);
    
            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('site.removecart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("div").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });	
        </script>	  
        <!--Cart Delete -->
        @endsection
    
