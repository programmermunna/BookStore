<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Success(){
        return view("admin.success-orders");
    }
    public function Pending(){
        return view("admin.pending-orders");
    }
    public function Cancel(){
        return view("admin.cancel-orders");
    }
}
