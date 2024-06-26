@extends('website.layouts.main')    
    @section('content')		
        <!-- SECTION -->
		<div class="section pt-0 pb-0" style="padding:0">
			<!-- container -->
			<div class="container-fluid">
				<!-- row -->
				<div class="row">
			
                    <!-- HOT DEAL SECTION -->
                    <div id="hot-deal" class="section mt-0">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hot-deal">
                                        <ul class="hot-deal-countdown">
                                            <li>
                                                <div>
                                                    <h3>02</h3>
                                                    <span>Days</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h3>10</h3>
                                                    <span>Hours</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h3>34</h3>
                                                    <span>Mins</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h3>60</h3>
                                                    <span>Secs</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <h2 class="text-uppercase">hot deal this week</h2>
                                        <p>New Collection Up to 50% OFF</p>
                                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                    </div>
                    <!-- /HOT DEAL SECTION -->
                </div>
            </div>
        </div>
    
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