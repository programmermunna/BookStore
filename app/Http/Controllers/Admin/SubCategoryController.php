<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        $subcategories = SubCategory::latest()->get();
        return view("admin.sub-categories",compact('subcategories'));
    }
    public function Add(){
       $categories = Category::latest()->get();
        return view("admin.add-sub-category",compact('categories'));
    }
    public function Store(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',
            'category_id' => 'required',
        ]);
        // $categories = Category::findOrFail($request->category_id);
        $category_id = $request->category_id;
        $category_name = Category::where('id',$category_id)->value('category_name');
        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'category_id' => $request->category_id,
            'category_name' => $category_name,
        ]);
        Category::where('id',$category_id)->increment('sub_category_count',1);
        return redirect()->route('add-sub-category')->with('message','Sub category insert successfully');
    }
    public function Edit($id){        
        $data = Subcategory::findOrFail($id);
        $categories = Category::latest()->get();
        return view('admin.edit-sub-category',compact('data','categories'));
    }
    public function Update(Request $request){ 
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',
            'category_id' => 'required',
        ]);
        $id = $request->subcategory_id;
        $category_id = $request->category_id;
        $category_name = Category::where('id',$category_id)->value('category_name');
        SubCategory::findOrFail($id)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'category_id' => $request->category_id,
            'category_name' => $category_name,
        ]);
        return redirect()->route('sub-categories')->with('message','Subcategory update successfully');        
        
    }
    public function Delete($id){
        $category_id = Subcategory::where('id',$id)->value('category_id');
        Category::where('id',$category_id)->decrement('sub_category_count',1);   
        Subcategory::findOrFail($id)->delete();
        return redirect()->route('sub-categories')->with('message','Subcategory Deleted successfully');        
        
    }
}
