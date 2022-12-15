<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateCategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('dashboard.category.index',compact('categories'));
    }
    public function create_category()
    {
        return view('dashboard.category.create');
    }
    public function create_category_submit(CreateCategoryRequest $request){

        if($request->hasFile('image')){
        $file = $request->file('image');     
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->storeAs('frontend/assets/uploads/category' , $filename);
        $path = $file->storeAs('' , $filename);
        }
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == TRUE ? '1':'0';
        $category->popular = $request->popular == TRUE ? '1':'0';
        $category->image = $path;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        return redirect()->route('category.index')->with('create_category','Category Added Successfully!');
    }

    public function edit_category($id){
        $category = Category::find($id);
        return view('dashboard.category.edit', compact('category'));
    }
    public function edit_category_submit(CreateCategoryRequest $request, $id){

        if($request->hasFile('image')){
        $file = $request->file('image');     
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->storeAs('frontend/assets/uploads/category' , $filename);
        $path = $file->storeAs('' , $filename);
        }
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == TRUE ? '1':'0';
        $category->popular = $request->popular == TRUE ? '1':'0';
        $category->image = $path;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->update();
        return redirect()->route('category.index')->with('edit_category','Category Updated Successfully!');
    }
    public function delete_category($id){
        $category = Category::find($id);
        $image_path = "frontend/assets/uploads/category/".$category->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $category->delete();
        return redirect()->back()->with('delete_category','Category Deleted Successfully!');
    }
}
