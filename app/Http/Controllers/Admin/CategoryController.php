<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
       $categories = Category::latest()->get();
        return view("admin.categories",compact('categories'));
    }
    public function Add(){
        return view("admin.add-category");
    }
    public function Store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-', $request->category_name)),
        ]);
        return redirect()->route('add-category')->with('message','Category Insert Successfully');
    }
    public function Edit($id){
        $data = Category::findOrFail($id);
        return view('admin.edit-category',compact('data'));
    }
    public function Update(Request $request){
        $id = $request->id;
        $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);
        Category::findOrFail($id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-', $request->category_name)),
        ]);
        return redirect()->route('categories')->with('message','Category Update Successfully');        
    }
    public function Delete($id){
        Category::findOrFail($id)->delete();
        return redirect()->route('categories')->with('message','Category Deleted Successfully');        
    }
}
