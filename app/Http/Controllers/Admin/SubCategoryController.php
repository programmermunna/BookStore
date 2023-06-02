<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        return view("admin.sub-categories");
    }
    public function Add(){
        return view("admin.add-sub-category");
    }
}
