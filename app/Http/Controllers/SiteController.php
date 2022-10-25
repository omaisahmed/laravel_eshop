<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use App\Models\Orders;
use App\Models\Coupons;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Cartalyst\Stripe\Exception\CardErrorException;

class SiteController extends Controller
{
    public function index()
    {
        $products = Products::all()->where('status', '1');
        $categories = Category::all()->where('status', '1')->take(3);
        return view('website.pages.home', compact('products', 'categories'));
    }

    public function products()
    {
        $products = Products::orderBy('name', 'asc')->where('status', '1')->get();
        $pagination = Products::latest()->paginate(5);
        $categories = Category::orderBy('name', 'asc')->where('status', '1')->get();
        return view('website.pages.products', compact('products', 'pagination', 'categories'));
    }

    public function categories()
    {
        $products = Products::orderBy('name', 'asc')->where('status', '1')->get();
        $pagination = Products::latest()->paginate(5);
        $categories = Category::all()->where('status', '1');
        return view('website.pages.categories', compact('categories', 'products', 'pagination'));
    }
    
    public function categories_show(Request $request)
    {
        $postCategories = Products::where('slug',$request->cat)->get();
        $categories = Category::all()->where('status', '1');
        $products = Products::orderBy('name', 'asc')->where('status', '1')->get();
        return view('website.pages.categories-show', compact('categories','products','postCategories'));   
     
    }

    public function product_show($slug)
    {
        $products = Products::orderBy('name', 'asc')->where('status', '1')->get();
        $categories = Category::all()->where('status', '1');
        $pagination = Products::latest()->paginate(5);
        return view('website.pages.show', compact('products', 'pagination', 'categories', 'slug'));
    }

    public function product_detail($productdetail)
    {
        $products = Products::orderBy('name', 'asc')->where('name', $productdetail)->get();
        $categories = Category::all()->where('status', '1');
        $pagination = Products::latest()->paginate(5);
        $productsRelated = Products::where('name', '!=', $productdetail)->inRandomOrder()->take(4)->get();
        // $productsRelated = Products::relatedProducts(4, true)->get();
        return view('website.pages.product-details', compact('products', 'pagination', 'categories', 'productsRelated'));
    }

    public function about()
    {
        return view('website.pages.about');
    }

    public function contact()
    {
        return view('website.pages.contact');
    }
    
    public function privacy_policy()
    {
        return view('website.pages.privacy-policy');
    }
    public function terms_conditions()
    {
        return view('website.pages.terms-conditions');
    }

    public function cart($slug)
    {  
        $product = Products::where('slug', $slug)->first();
        return view('website.pages.cart',compact('product'));
    }

    public function addToCart($id)
    {
        $product = Products::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "qty" => 1,
                "selling_price" => $product->selling_price,
                "image" => $product->image,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->qty) {
            $cart = session()->get('cart');
            $cart[$request->id]["qty"] = $request->qty;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    
    public function wishlist()
    {  
        return view('website.pages.wishlist');
    }
    public function addToWishlist($id)
    {
        $product = Products::findOrFail($id);
        $wishlist = session()->get('wishlist', []);
        if (isset($wishlist[$id])) {
            $wishlist[$id]['qty']++;
        } else {
            $wishlist[$id] = [
                "name" => $product->name,
                "qty" => 1,
                "selling_price" => $product->selling_price,
                "image" => $product->image,
            ];
        }
        session()->put('wishlist', $wishlist);
        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }
    public function updateWishlist(Request $request)
    {
        if ($request->id && $request->qty) {
            $wishlist = session()->get('wishlist');
            $wishlist[$request->id]["qty"] = $request->qty;
            session()->put('wishlist', $wishlist);
            session()->flash('success', 'Product updated in wishlist successfully');
        }
    }

    public function removeWishlist(Request $request)
    {
        if ($request->id) {
            $wishlist = session()->get('wishlist');
            if (isset($wishlist[$request->id])) {
                unset($wishlist[$request->id]);
                session()->put('wishlist', $wishlist);
            }
            session()->flash('success', 'Product removed from wishlist successfully');
        }
    }

    public function checkoutForm($slug)
    {
        $product = Products::where('slug', $slug)->first();
        return view('website.pages.order-checkout', compact('product'));
    }

    public function checkout(Request $request)
    {
        $amount = session()->get('amount');
        $prod_slug = session()->get('prod_slug');
       
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
        ]);

        $order = Orders::create([
            'order_id' => random_int(100000, 999999),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'amount' => $amount,
            'slug' => $prod_slug,
            'transactionId' => 'null',
            'status' => 'unpaid',
            'comment' => $request->comment,
            'applied_coupon' => $request->coupon,
        ]);

        try {
        Stripe::setApiKey(config('services.stripe.secret'));

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        if ($amount > 0) {
            $charge = Charge::create ([
                "amount" => $amount,
                'currency' => 'USD',
                "source" => $request->stripeToken,
                "description" => $request->slug,
                'receipt_email' => $request->email, 
        ]);
            $order->status = 'paid';
            $order->transactionId = $charge['id'];
        } 
        else {
            $order->status = 'free';
            $order->transactionId = null;
        }

        $order->amount = $amount;
        $order->update();
        $product = Products::where('slug', $prod_slug)->first();
        return view('website.pages.order-invoice', compact('order', 'product', 'customer', 'charge'));
    }
    catch (CardErrorException $e) {
            return redirect()->back()->withErrors('Errors! ' . $e->getMessage());
        }

    }

    public function checkoutCoupon($slug, $coupon)
    {
        $amount = session()->get('amount');
        $product = Products::where('slug', $slug)->first();
        $coupon = Coupons::where('code', $coupon)->first();
        $original_price = $amount;
        $discounted_price = $coupon->percent;
        $total = $original_price - ($original_price * $discounted_price / 100);
        if ($coupon) {
            return view('website.pages.order-checkout', compact('product', 'coupon', 'total'));
        } else {
            return redirect()->route('site.checkoutform', ['slug' => $product->slug]);
        }
    }

    public function checkoutCouponSubmit(Request $request, $slug)
    {
        $coupon = Coupons::where('code', $request->coupon)->first();
        if ($coupon) {
            return redirect()->route('site.checkoutCoupon', ['slug' => $slug, 'coupon' => $coupon->code]);
        } else {
            return redirect()->back()->with('error', 'Invalid Coupon Code');
        }
    }

    public function searchFilter(Request $request){
        $categories = Category::all()->where('status', '1');
        $products = Products::orderBy('name', 'asc')->where('status', '1')->get();
        $search = Products::query();
        $name = $request->name;

        if($name) {
             $search->where('name','LIKE','%'.$name.'%')->orWhere('slug','LIKE','%'.$name.'%');
        }

       $data = [
        'name' => $name,
        'search' => $search->latest()->simplePaginate(20),
    ];

        return view('website.pages.search', compact('categories', 'products'), $data);
    }

}
