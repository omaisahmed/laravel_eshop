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

						<!-- row -->
						<div class="row">
							<!-- shop -->
							@foreach ($categories as $category)
							<div class="col-md-4 col-xs-6">
								<div class="shop">
									<div class="shop-img">
										<img src="{{asset('frontend/assets/uploads/category/'.$category->image)}}" alt="{{$category->meta_title}}">
									</div>
									<div class="shop-body">
										<h3>{{$category->name}}<br>Collection</h3>
										<a href="{{route('site.show',$category->slug)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
							@endforeach
							<!-- /shop -->
						</div>
						<!-- /row -->

                        <div class="text-right">
                        {!! $pagination->links() !!}
                        </div>
	
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->		
    @endsection