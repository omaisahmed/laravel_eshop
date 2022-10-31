<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index()
    {
       $prod = Products::withTotalVisitCount()->get();
    //    dd($prod->visit_count_total);
        $products = Products::all();
        return view('dashboard.products.index',compact('products','prod'));
    }

    public function create_product()
    {
        $categories = Category::all();
        return view('dashboard.products.create',compact('categories'));
    }
    public function create_product_submit(Request $request){
        $request->validate([
            'cat_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'small_description' => 'required',
            'description' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'image' => 'required',
            'qty' => 'required',
            'tax' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ]);

        if($request->hasFile('image')){
        $file = $request->file('image');     
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->storeAs('frontend/assets/uploads/products' , $filename);
        $path = $file->storeAs('' , $filename);
        }
        $products = new Products();
        $products->cat_id = $request->cat_id;
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->small_description = $request->small_description;
        $products->description = $request->description;
        $products->original_price = $request->original_price;
        $products->selling_price = $request->selling_price;
        $products->image = $path;
        $products->qty = $request->qty;
        $products->tax = $request->tax;
        $products->status = $request->status == TRUE ? '1':'0';
        $products->trending = $request->trending == TRUE ? '1':'0';
        $products->meta_title = $request->meta_title;
        $products->meta_description = $request->meta_description;
        $products->meta_keywords = $request->meta_keywords;
        $products->save();
        return redirect()->route('products.index')->with('create_products','Product Added Successfully!');
    }

    public function edit_product($id){
        $categories = Category::all();
        $product = Products::find($id);
        return view('dashboard.products.edit',compact('product','categories'));
    }
    public function edit_product_submit(Request $request, $id){
        $request->validate([
            'cat_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'small_description' => 'required',
            'description' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'image' => 'required',
            'qty' => 'required',
            'tax' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ]);

        if($request->hasFile('image')){
        $file = $request->file('image');     
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->storeAs('frontend/assets/uploads/products' , $filename);
        $path = $file->storeAs('' , $filename);
        }
        $products = Products::find($id);
        $products->cat_id = $request->cat_id;
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->small_description = $request->small_description;
        $products->description = $request->description;
        $products->original_price = $request->original_price;
        $products->selling_price = $request->selling_price;
        $products->image = $path;
        $products->qty = $request->qty;
        $products->tax = $request->tax;
        $products->status = $request->status == TRUE ? '1':'0';
        $products->trending = $request->trending == TRUE ? '1':'0';
        $products->meta_title = $request->meta_title;
        $products->meta_description = $request->meta_description;
        $products->meta_keywords = $request->meta_keywords;
        $products->update();
        return redirect()->route('products.index')->with('edit_products','Product Updated Successfully!');
    }
    public function delete_product($id){
        $product = Products::find($id);
        $image_path = "frontend/assets/uploads/products/".$product->image;
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $product->delete();
        return redirect()->back()->with('delete_products','Product Deleted Successfully!');
    }

}
