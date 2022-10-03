<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Session;

class SiteController extends Controller
{
   public function index(){
    $products = Products::all()->where('status', '1');
    $categories = Category::all()->where('status', '1')->take(3);
    return view('website.pages.home',compact('products','categories'));
   }

   public function products(){
    $products = Products::orderBy('name', 'asc')->where('status', '1')->get();
    $pagination = Products::latest()->paginate(5);
    $categories = Category::orderBy('name', 'asc')->where('status', '1')->get();
    return view('website.pages.products',compact('products','pagination','categories'));
   }

   public function categories(){
      $products = Products::orderBy('name', 'asc')->where('status', '1')->get();
      $pagination = Products::latest()->paginate(5);
      $categories = Category::all()->where('status', '1');
      return view('website.pages.categories',compact('categories','products','pagination'));
     }
   
   public function show($slug)
   {
      $products = Products::orderBy('name', 'asc')->where('status', '1')->get();
      $categories = Category::all()->where('status', '1');
      $pagination = Products::latest()->paginate(5);
      return view('website.pages.show',compact('products','pagination','categories','slug'));
   }

   public function product_detail($productdetail)
   {
      $products = Products::orderBy('name', 'asc')->where('name',$productdetail)->get();
      $categories = Category::all()->where('status', '1');
      $pagination = Products::latest()->paginate(5);
      $productsRelated = Products::where('name', '!=', $productdetail)->inRandomOrder()->take(4)->get();
      // $productsRelated = Products::relatedProducts(4, true)->get();
      return view('website.pages.product-details',compact('products','pagination','categories','productsRelated'));
   }

   public function about(){
      return view('website.pages.about');
   }

   public function contact(){
      return view('website.pages.contact');
   }

   public function cart()
    {
        return view('website.pages.cart');
    }

    public function addToCart($id)
    {
        $product = Products::findOrFail($id);         
        $cart = session()->get('cart', []);   
        if(isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "qty" => 1,
                "selling_price" => $product->selling_price,
                "image" => $product->image
            ];
        }         
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->qty){
            $cart = session()->get('cart');
            $cart[$request->id]["qty"] = $request->qty;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

}
