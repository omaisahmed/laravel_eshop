@extends('website.layouts.main')    
    @section('content')
    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					@include('website.partials.sidebar')

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
                            
							<!-- product -->
                            @forelse ($search as $filter)
                            <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="{{asset('frontend/assets/uploads/products/'.$filter->image)}}" alt="{{$filter->meta_title}}" class="img-responsive product-image">
                                    <div class="product-label">
                                        {{-- <span class="sale">-30%</span> --}}
                                        @if ($filter->trending == 1)
                                         <span class="new">POPULAR</span>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{$filter->category->name}}</p>
                                    <h3 class="product-name"><a href="{{route('site.productdetail',$filter->name)}}">{{$filter->name}}</a></h3>
                                    <h4 class="product-price">${{$filter->selling_price}} <del class="product-old-price">${{$filter->original_price}}</del></h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-btns">
                                        <button class="add-to-wishlist"><a href="{{route('site.addtowishlist',$filter->id)}}"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a></button>
                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                        <button class="quick-view"><a href="{{route('site.productdetail',$filter->name)}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <button class="add-to-cart-btn"><a class="text-white" href="{{route('site.addtocart',$filter->id)}}"><i class="fa fa-shopping-cart"></i> add to cart</a></button>
                                </div>
                                
                            </div>
                            </div>
                            @empty
                            <div class="col-md-4 col-xs-6">
                                <p>No Record Found</p>   
                            </div>                     
                            @endforelse                            
                            <!-- /product -->
                            
							<div class="clearfix visible-sm visible-xs"></div>
	
						</div>
						<!-- /store products -->
					
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->		
    @endsection