<!-- ASIDE -->
<div id="aside" class="col-md-3">
    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Categories</h3>
        <div class="checkbox-filter">
            @foreach ($categories as $category)
            <div class="input-checkbox">
                <input type="checkbox" id="category-1">
                <label for="category-1">
                    <span></span>
                    {{$category->name}}
                    <small>({{ $category->products->count() }})</small>
                </label>
            </div>
            @endforeach						
        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Price</h3>
        <div class="price-filter">
            <div id="price-slider"></div>
            <div class="input-number price-min">
                <input id="price-min" type="number">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
            <span>-</span>
            <div class="input-number price-max">
                <input id="price-max" type="number">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Top selling</h3>
        @foreach ($products->slice(0,5) as $product)
        @if($product->trending == 1)
        <div class="product-widget">
            <div class="product-img">
                <img src="{{asset('frontend/assets/uploads/products/'.$product->image)}}" alt="{{$product->meta_title}}">
            </div>
            <div class="product-body">
                <p class="product-category">{{$product->category->name}}</p>
                <h3 class="product-name"><a href="{{route('site.productdetail',$product->name)}}">{{$product->name}}</a></h3>
                <h4 class="product-price">${{$product->selling_price}} <del class="product-old-price">${{$product->original_price}}</del></h4>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <!-- /aside Widget -->
</div>
<!-- /ASIDE -->