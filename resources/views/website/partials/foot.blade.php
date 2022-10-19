<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Eshop established in 1998 and based in Redmond, Wash., is a wholly owned subsidiary of Nintendo Co., Ltd. We are committed to delivering best-in-class products and services to our customers.</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                            <li><a href="tel:+021-95-51-84"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                            <li><a href="mailto:info@eshop.com"><i class="fa fa-envelope-o"></i>info@eshop.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>                            
                        <ul class="footer-links">
                            @foreach ($cats as $cat)
                            <li><a href="/products/{{$cat->slug}}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="{{route('site.about')}}">About Us</a></li>
                            <li><a href="{{route('site.contact')}}">Contact Us</a></li>
                            <li><a href="{{route('site.privacy-policy')}}">Privacy Policy</a></li>
                            <li><a href="{{route('site.terms-conditions')}}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            {{-- <li><a href="#">My Account</a></li> --}}
                            <li><a href="{{route('site.cart', ['slug' => "laptops"])}}">View Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                            {{-- <li><a href="#">Track My Order</a></li> --}}
                            <li><a href="{{route('site.contact')}}">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | Made by <a href="https://omaisahmed.github.io/folio" target="_blank">Omais Ahmed</a>
                    </span>
                </div>
            </div>
                <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->
