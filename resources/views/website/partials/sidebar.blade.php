<!-- ASIDE -->
<div class="catFilters"></div>

<div id="aside" class="col-md-3">
    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Categories</h3>
        <div class="checkbox-filter">
            <form action="{{route('site.categories_show')}}" method="GET"> 
            @foreach ($categories as $category)
            <div class="input-checkbox">
                <input type="checkbox" onclick="this.form.submit()" name="cat[]" value="{{ $category->slug }}" id="{{$category->id}}" >
                
                <label for="{{$category->id}}">
                    <span></span>
                    {{$category->name}}
                    <small>({{ $category->products->count() }})</small>
                </label>
            </div>
            @endforeach
            </form>					
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

@section('scripts')
<script>
    function categoryCheckbox(id) {
        $('.catFilters').empty();
        $.ajax({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            type: 'GET',
            url: '/categories-filter/' + id,
            success: function(response) {
                console.log(response);
            },
        });
    }
</script>


{{-- <script>

// var categories = [];
// $('input[name="category[]"]').on('change', function (e) {
//     e.preventDefault();
//     categories = []; 
//     $('input[name="category[]"]:checked').each(function()
//     {
//         categories.push($(this).val());
//     });
//     $.ajax({
//         headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
//         type:'POST',
//         url: '/categories-filter',
//         data:{categories,_token: $('meta[name="csrf-token"]').attr('content')
//         },
//         success:function(data){
//             alert(categories);
//         }
//     });
//     });

</script> --}}
@endsection