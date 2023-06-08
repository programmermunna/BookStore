<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view("admin.products",compact('products'));
    }
    public function Add(){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view("admin.add-product",compact('categories','subcategories'));
    }
    public function Store(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'price' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'quantity' => 'required',
            'img' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $img = $request->file('img');
        $img_name = hexdec(uniqid()).'.'. $img->getClientOriginalExtension();
        $request->img->move(public_path('upload'),$img_name);
        $img_url = 'upload/'.$img_name;

        $category_id = $request->product_category_id;
        $category_name = Category::where('id',$category_id)->value('category_name');

        $subcategory_id = $request->product_subcategory_id;
        $subcategory_name = Subcategory::where('id',$subcategory_id)->value('subcategory_name');        

        Product::insert([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'product_category_name' => $category_name,
            'product_category_id' => $request->price,
            'product_subcategory_name' => $subcategory_name,
            'product_subcategory_id' => $request->price,
            'product_img' => $img_url,
            'quantity' => $request->quantity,
        ]);

        Category::where('id',$category_id)->increment('product_count',1);
        Subcategory::where('id',$subcategory_id)->increment('subcategory_product_count',1);
        return redirect()->route('add-product')->with('message','Product added successfully');        
    }
    public function Edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.edit-product',compact('product','categories','subcategories'));
    }
    public function Update(Request $request){
        $product_id = $request->product_id;
        $request->validate([
            'product_name' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'price' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'quantity' => 'required',
        ]);
        
        $img = $request->file('img');
        if(empty($img)){
        $img_url = Product::where('id',$product_id)->value('product_img');
        }else{
        $img_name = hexdec(uniqid()).'.'. $img->getClientOriginalExtension();
        $request->img->move(public_path('upload'),$img_name);
        $img_url = 'upload/'.$img_name;
        }        

        $category_id = $request->product_category_id;
        $category_name = Category::where('id',$category_id)->value('category_name');

        $subcategory_id = $request->product_subcategory_id;
        $subcategory_name = Subcategory::where('id',$subcategory_id)->value('subcategory_name');        

        Product::findOrFail($product_id)->update([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'product_category_name' => $category_name,
            'product_category_id' => $request->price,
            'product_subcategory_name' => $subcategory_name,
            'product_subcategory_id' => $request->price,
            'product_img' => $img_url,
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('products')->with('message','Product Updated successfully');        
    }
    public function Delete($id){
        $category_id = Product::where('id',$id)->value('product_category_id');
        $subcategory_id = Product::where('id',$id)->value('product_subcategory_id');

        Category::where('id',$category_id)->decrement('product_count',1);   
        Subcategory::where('id',$subcategory_id)->decrement('subcategory_product_count',1); 
        
        
        Product::findOrFail($id)->delete();
        return redirect()->route('products')->with('message','Product Deleted successfully');        
        
    }
}
